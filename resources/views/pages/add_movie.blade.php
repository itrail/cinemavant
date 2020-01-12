@extends('../admin_layout')

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
                                <form method="POST" action="/admin/remove_movie">
                                    {{ csrf_field() }}
                                    @foreach ($movies as $movie)
                                        <section>Id filmu: {{ $movie->movie_id }}   Tytuł: {{ $movie->title }}
                                            <input name="checked[]" type="checkbox"  value="{{ $movie->movie_id }}"></section>
                                    @endforeach
                                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Usuń zaznaczone</button>
                                </form>
                                    <br>
                                <h2>Dodaj nowy film:</h2>
                                <form method="POST" action="/add_movie">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="titlee">Tytuł: </label>
                                            <input type="text" class="form-control" id="titlee" name="titlee" placeholder="Wpisz ilość miejsc">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="poster">Plakat: </label>
                                            <input type="text" class="form-control" id="poster" name="poster" placeholder="Wpisz plakat">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="description">Opis: </label>
                                            <input type="text" class="form-control" id="description" name="description" placeholder="Wpisz opis">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="age_category">Kategoria wiekowa: </label>
                                            <input type="text" class="form-control" id="age_category" name="age_category" placeholder="Wpisz kategorię wiekową">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="genre">Gatunek: </label>
                                            <input type="text" class="form-control" id="genre" name="genre" placeholder="Wpisz gatunek">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="release_date">Data premiery: </label>
                                            <input type="datetime-local" class="form-control" id="release_date" name="release_date" >
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
