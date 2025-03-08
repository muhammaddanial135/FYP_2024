<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Soft Voting System')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('logo2.png') }}" alt="Logo">
        </div>
        <nav>
            <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/admin') }}" class="{{ Request::is('admin') ? 'active' : '' }}">Admin</a>
            <a href="{{ url('/voter') }}" class="{{ Request::is('voter') ? 'active' : '' }}">Voter</a>
            <button>Contact Us</button>
        </nav>
    </header>
    <main>
        <div class="scroll-container" >
            @yield('content')
        </div>
     
    </main>
</body>
</html>
