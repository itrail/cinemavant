@extends('layout_auth')

@section('content')
    <?php
    use Illuminate\Support\Facades\DB;
    $id = $_SERVER['REQUEST_URI'];
    $id = substr($id, 1);
    echo $id


    ?>
    <div class="body_bg">

        <!-- banner part start-->
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h2>Zarezerwuj bilet na film:</h2>
                                <form method="POST" action="/reservation/{{$id}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="seance_id">Tytuł filmu: </label>
                                            <select name="seance_id" id="seance_id">
                                                <?php
                                                $seances = DB::table('seanses_times')->where('seance_id', $id)->get();
                                                foreach($seances as $seance) {
                                                    $free_seats = $seance->amount_of_free;
                                                    $seance_id = $seance->seance_id;
                                                    $movies = DB::table('movies')->where('movie_id', $seance->movie_id)->get();
                                                    $halls = DB::table('halls')->where('hall_id', $seance->hall_id)->get();
                                                }
                                                ?>
                                                    <option value="{{$seance_id}}">
                                                        @foreach($movies as $movie)
                                                             {{$movie->title}}
                                                        @endforeach
                                                    </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="email">Email: </label>
                                            <input type="text" class="form-control" value="{{$user}}" id="email" name="email" required="required" placeholder="Wpisz email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="amount_of_tickets">Ilośc biletów do zarezerwowania: </label>
                                            <select id="amount_of_tickets" name="amount_of_tickets">
                                                @for($i = 1; $i <=$free_seats;$i++)
                                                    <option value="{{$i}}">{{$i}}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Zarezerwuj</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner part start-->
    </div>
@foreach($halls as $hall)
    {{$hall->amount_of_seats}}
@endforeach

@endsection
