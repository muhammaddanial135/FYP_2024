@extends('layout')

@section('title', 'Voter - Soft Voting System')

@section('content')
  
    <div class="login-container">
        <form action="{{ url('/') }}/voter-login"  method="POST" > 
            @csrf
            <h2>LOGIN</h2>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="motherName" placeholder="Mother's Name" required>
            <input type="text" name="cnic" placeholder="CNIC" required>
            <input type="text" name="phoneNumber" placeholder="Phone Number" required>
          
            <div class="options">
                
                <a href="#">Don't have an account?contact Support</a>
            </div>
            <button type="submit">LOGIN</button>
        </form>
    </div>   
   
@endsection
