@extends('layout')

@section('content')

    <div class="body_bg">

        <!-- banner part start-->
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h1>Aby dokonac rezerwacji zarejestruj się</h1>
                                <p>
                                    Załóż konto! </p>
                                <button class="btn_1 d-none d-sm-block" onclick='window.location.href="/register"'>Zarejestruj</button>
                                <!--<button class="btn_1 d-none d-sm-block" onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'">Zarejestruj</button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner part start-->
    </div>


@endsection
