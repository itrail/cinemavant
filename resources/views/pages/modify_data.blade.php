@extends('layout_auth')

@section('content')

    <div class="body_bg">

        <!-- banner part start-->
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                @if($errors->any())
                                    <h5 style="color:red;font-family:verdana;">{{$errors->first()}}</h5>
                                @endif
                                <h2>Modyfikacja danych</h2>
                                @foreach ($users as $user)
                                    <form method="POST" action="/modify_data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="email">Email: {{ $user->email }}</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Wpisz nowy adres e-mail">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="firstname">Imię: {{ $user->firstname }}</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Wpisz imię do aktualizacji">
                                        </div>

                                        <div class="form-group">
                                            <label for="surname">Nazwisko: {{ $user->surname }}</label>
                                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Wpisz nazwisko do aktualizacji">
                                        </div>

                                        <div class="form-group">
                                            <button style="cursor:pointer" type="submit" class="btn btn-primary">Zaaktualizuj dane</button>
                                        </div>

                                    </form>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner part start-->
    </div>


@endsection
