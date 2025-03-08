<?php

use App\Models\Voter;
use App\Models\Polling;
use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Middleware\Webguard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/voter', function () {
    return view('voter');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/add-voter', function () {
    return view('create-voter');
});

Route::get('/add-candidate', function () {
    return view('create-candidate');
});
Route::get('/create-election', function () {
    return view('create-election');
});

Route::get('/voter-home', function () {
    return view('voter-home');
});
Route::post('/admin',function(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $envEmail = env('ADMIN_EMAIL');
    $envPassword = env('ADMIN_PASSWORD');

    if ($request->email === $envEmail && $request->password === $envPassword) {
        Session::put('isAdminLoggedIn', true);
        session(['admin' => 'logined']);
        return redirect('dashboard');
    }

    return back()->withErrors(['Invalid email or password.']);
});

Route::post('/candidate-store', function (Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'cnic' => 'required|unique:candidates',
        'email' => 'required|email|unique:candidates',
        'mobile' => 'required',
        'gender' => 'required',
        'address' => 'required',
        'city' => 'required',
    ]);

    Candidate::create($validatedData);

    return redirect("/dashboard")->with('success', 'Registration successful!');
});

Route::post('/voter-store', function(Request $request)
{
    $validatedData = $request->validate([
        'full_name' => 'required',
        'mother_name' => 'required',
        'cnic' => 'required|unique:voters',
        'phone_no' => 'required',
        'dob' => 'required|date',
        'constituency' => 'required',
    ]);

    Voter::create($validatedData);

    return redirect("/dashboard")->with('success', 'Registration successful!');
});


Route::post('/election-store', function (Request $request)
{
    $validatedData = $request->validate([
        'election_name' => 'required|string',
        'candidates.*' => 'required|string',
        'start_time' => 'required|date',
        'constituency' => 'required|string',
    ]);

    $election = new Election();
    $election->election_name = $validatedData['election_name'];
    $election->candidates = json_encode($request->candidates);
    $election->start_time = $validatedData['start_time'];
    $election->constituency = $validatedData['constituency'];
    $election->save();

    return redirect('dashboard')->with('success', 'Election created successfully!');
});

Route::post('/voter-login',  function (Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'motherName' => 'required|string',
        'cnic' => 'required|string',
        'phoneNumber' => 'required|string',
    ]);

    // Search for voter in database by CNIC
    $voter = Voter::where('cnic', $validatedData['cnic'])->first();

    if ($voter) {
        if ($voter->full_name !== $validatedData['name'] ||
            $voter->mother_name !== $validatedData['motherName'] ||
            $voter->phone_no !== $validatedData['phoneNumber']) {
            return redirect()->back()->with('error', 'Invalid credentials.');
        }
         $constituency=$voter->constituency;
        session(['voter' => $voter]);
           // Retrieve constituency from the voter and search for the election
           $constituency = $voter->constituency;
           $election = Election::where('constituency', $constituency)->first();
   
           if (!$election) {
               return redirect()->back()->with('error', 'No election found for this constituency.');
           }
   
           // Save election data to session
           session(['election' => $election]);
        return redirect("voter-home");
    } else {
        return redirect()->back()->with('error', 'Voter not found.');
    }
});

Route::post('/submit-vote', function (Request $request) {
    $validatedData = $request->validate([
        'election_name' => 'required|string',
        'candidate' => 'required|string',
        'constituency' => 'required|string',
        'cnic' => 'required|string',
    ]);

    // Check if the voter already exists in polling table
    $existingVote = Polling::where('voter', $validatedData['cnic'])->first();

    if ($existingVote) {
        return redirect('already-found')->with('error', 'You have already voted.');
    }

    // Save the vote
    $polling = new Polling();
    $polling->election_name = $validatedData['election_name'];
    $polling->votes = $validatedData['candidate'];
    $polling->voter = $validatedData['cnic'];
    $polling->save();

    return redirect('successfully-submitted')->with('success', 'Your vote has been successfully submitted.');
});

Route::get('/already-found', function () {
    return view('already-found');
});

Route::get('/successfully-submitted', function () {
    return view('successfully-submitted');
});

Route::post('/logout', function () {
    session(['voter' =>null]);
    session(['election' =>null]);
    return redirect('voter');
});

Route::post('/admin-logout', function () {
    session(['admin' =>null]);
    return redirect('admin');
});

Route::post('/results', function () {
   
    return view('results');
});

Route::post('/get-results',function (Request $request)
{
    $elections = Election::all();
    $electionName = $request->input('election_name');
    $results = Polling::where('election_name', $electionName)->get();
    return view('results', compact('elections', 'results', 'electionName'));
});