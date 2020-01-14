@extends('layout_auth')

@section('content')
    <div class="body_bg">
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <p>{{$user }}</p>
                                <p><    <a href="/modify_data">Modyfikuj informacje o sobie</a></p>
                                <p><    <a href="/change_password">Zmień hasło</a></p>
                                <p><    <a href="/reservations">Moje rezerwacje</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
