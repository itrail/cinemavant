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
                                @foreach ($halls as $hall)
                                    <p>Sala nr: {{ $hall->hall_id }}   Ilośc miejsc: {{ $hall->amount_of_seats }}</p>
                                @endforeach
                                    <h2>Dodaj nową salę:</h2>
                                    <form method="POST" action="/admin/add_hall">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="seats">Ilość miejsc: </label>
                                                <input type="text" class="form-control" id="seats" name="seats" placeholder="Wpisz ilość miejsc">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button style="cursor:pointer" type="submit" class="btn btn-primary">Zaaktualizuj dane</button>
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
