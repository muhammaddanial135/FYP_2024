
@extends('layout')

@section('title', 'Admin - Soft Voting System')

@section('content')
    {{-- <div class="content">
        <h1>Admin Panel</h1>
        <p>Welcome to the admin panel.</p>
    </div> --}}
    <div class="login-container">
        <form method="POST" action="{{ url('/') }}/admin" >
            @csrf
            <h2>ADMIN LOGIN</h2>
            <input type="text" name="email" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            
            <button type="submit">LOGIN</button>
        </form>
        @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
@endsection
