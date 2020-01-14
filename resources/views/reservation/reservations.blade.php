@extends('layout_auth')

@section('content')
    <div class="body_bg">
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h2>Twoje rezerwacje:</h2>
                                <form method="POST" action="/reservations">
                                    {{ csrf_field() }}
                                <p>{{$user }}</p>
                                @foreach ($reservations as $resv)
                                    <section>
                                    <p>Rezerwacja ID: {{ $resv->reservation_id }}   Ilośc biletów: {{ $resv->amount_of_tickets }}
                                    <input name="checked[]" type="checkbox" value="{{ $resv->reservation_id  }}"></p></section>
                                @endforeach
                                <div class="form-group">
                                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Zrezygnuj z zaznaczonych</button>
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
