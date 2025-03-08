@extends('layout')

@section('title', 'Voter - Soft Voting System')

@section('content')
  
    <div class="login-container">
      <h2>You have already submitted a vote</h2>
      <p>Duplicate vote will not be counted</p>
      <button type="button" onclick="history.back()">Back</button>

    </div>   
   
@endsection
