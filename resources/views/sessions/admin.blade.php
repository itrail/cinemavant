@extends('../layout')
@section('content')
    <div class="body_bg" onload="hide_button()">
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h2>Logowanie administratora</h2>
                                @if($errors->any())
                                    <h5 style="color:red;font-family:verdana;">{{$errors->first()}}</h5>
                                @endif
                                <form method="POST" action="/admin">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Hasło:</label>
                                        <input type="password" class="form-control" id="password" name="password" required="required">
                                    </div>

                                    <div class="form-group">
                                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Zaloguj</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function hide_button() {
            document.getElementById("login_button").style.display = "none";
        }
    </script>
@endsection
