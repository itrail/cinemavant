@extends('../admin_layout')

@section('content')
    <div class="body_bg" onload="hide_button()">
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-8">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <button><a href="/admin/add_hall">Dodaj sale</a></button>
                                <button><a href="/admin/add_movie">Dodaj film</a></button>
                                <button><a href="/admin/add_seance">Dodaj seans</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
