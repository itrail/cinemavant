@extends('layout_auth')

@section('content')

    <div class="body_bg">
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                @if($errors->any())
                                    <h5 style="color:red;font-family:verdana;">{{$errors->first()}}</h5>
                                @endif
                                <h2>Zmiana hasła</h2>
                                <form method="POST" action="/change_password">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="old_password">Wprowadź stare hasło:</label>
                                        <input type="password" class="form-control" id="old_password" name="old_password">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Nowe hasło:</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Powtórz nowe hasło:</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    </div>

                                    <div class="form-group">
                                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Zmień hasło</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
