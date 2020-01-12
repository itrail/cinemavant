@extends('../admin_layout')

@section('content')
    <?php
        $seances = DB::table('seanses_times')->get();
        $halls = DB::table('halls')->get();
        $movies = DB::table('movies')->get();
    ?>
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
                                <form method="POST" action="/remove_seance">
                                    {{ csrf_field() }}
                                    @foreach ($seances as $seance)
                                        <section>Id seansu: {{ $seance->seance_id }}   Tytuł: {{ $seance->seance_id }}
                                            <input name="checked[]" type="checkbox"  value="{{ $seance->seance_id }}"></section>
                                    @endforeach
                                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Usuń zaznaczone</button>
                                </form>
                                <br>
                                <h2>Dodaj nową godzinę seansu:</h2>
                                <form method="POST" action="/add_seance">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="seance_time">Wybierz date i godzinę: </label>
                                            <input type="datetime-local" class="form-control" id="seance_time" name="seance_time" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <select name="movie_id" id="movie_id">
                                                @foreach($movies as $movie)
                                                    <option value="{{$movie->movie_id }}">{{$movie->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <select name="hall_id" id="hall_id">
                                                @foreach($halls as $hall)
                                                    <option value="{{$hall->hall_id }}">Sala nr:{{$hall->hall_id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Dodaj film</button>
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
