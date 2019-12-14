@extends('email_layout')

@section('content')
    <h1>Witaj w aplikacji naszego Cinemavant</h1>
    <p>
        Szanowny/a {{ $user->firstname }},
    </p>
    <p>
        Własnie założyłeś/aś konto w naszym serwisie.
    </p>

@endsection
