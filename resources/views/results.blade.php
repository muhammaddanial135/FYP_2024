

{{-- @extends('layout')

@section('title', 'Election Results')

@section('content')
<div class="form-container">
    @php
        use App\Models\Election;
        use App\Models\Polling;
        
        // Fetch all elections
        $elections = Election::all();
        
        // Initialize results and electionName
        $results = [];
        $electionName = '';
        
        // Check if the form was submitted
        if (request()->isMethod('post')) {
            $electionName = request('election_name');
            $results = Polling::where('election_name', $electionName)->get();
        }
    @endphp

    <h2>Results</h2>
    <form action="{{ url()->current() }}" method="POST">
        @csrf
        <label for="election_name">Select constituency</label>
        <select name="election_name" id="election_name" required>
            @foreach($elections as $election)
                <option value="{{ $election->election_name }}" {{ old('election_name', $electionName) == $election->election_name ? 'selected' : '' }}>
                    {{ $election->election_name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Show Results</button>
    </form>

    @if(!empty($results))
    <h2>Results for {{ $electionName }}</h2>
    <table>
        <thead>
            <tr>
                <th>S No.</th>
                <th>Candidate</th>
                <th>Votes</th>
                <th>Constituency</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $index => $result)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $result->votes }}</td>
                    <td>{{ $result->election_name }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<style>
    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f5f5f5;
    }
</style>
@endsection --}}








{{-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}

@extends('layout')

@section('title', 'Election Results')

@section('content')

<div class="form-container">
    @php
        use App\Models\Election;
        use App\Models\Polling;
        
        // Fetch all elections
        $elections = Election::all();
        
        // Initialize results, electionName, and constituency
        $results = [];
        $electionName = '';
        $constituency = '';
        
        // Check if the form was submitted
        if (request()->isMethod('post')) {
            $electionName = request('election_name');
            $selectedElection = Election::where('election_name', $electionName)->first();
            if ($selectedElection) {
                $constituency = $selectedElection->constituency;
            }
            $results = Polling::where('election_name', $electionName)->get();
        }
    @endphp

    <h2>Results</h2>
    <form action="{{ url()->current() }}" method="POST">
        @csrf
        <label for="election_name" class="hd">Select Election</label>
        <select name="election_name" id="election_name" required>
            @foreach($elections as $election)
                <option value="{{ $election->election_name }}" {{ old('election_name', $electionName) == $election->election_name ? 'selected' : '' }}>
                    {{ $election->election_name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Show Results</button>
    </form>

    @if(!empty($results))
    <h2>Results for {{ $electionName }}</h2>
    <table>
        <thead>
            <tr>
                <th>S No.</th>
                <th>Candidate</th>
              
               
                <th>Constituency</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $index => $result)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $result->votes }}</td>
                    {{-- <td><!-- Add logic to retrieve and display the party of the candidate here --></td> --}}
                    <td>{{ $constituency }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<style>
    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f5f5f5;
        color: #4CAF50
    }
    button{
        background-color: #4CAF50;
        color: #f5f5f5;
        padding :10px;
        border: none
    }
.hd{
    padding: 100px
}
</style>
@endsection
