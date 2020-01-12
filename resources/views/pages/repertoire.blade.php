@extends($flag ? 'layout_auth' : 'layout')

@section('content')

<!-- breadcrumb start-->
<section class="gallery_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <?php
                use Illuminate\Support\Facades\DB;
                    $halls = DB::table('halls')->get();
                    $movies = DB::table('movies')->get();
                ?>
                    <h2>Wybierz film, na który chcesz się wybrać:</h2>



                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Dodaj film</button>
                    </div>
                    </form>

                Auta 19:30 <input type="text" > <button>Rezerwuj</button>
                <div class="section_tittle text-center">
                    </br></br></br></br></br>
                    Auta 19:30 <input type="text" > <button>Rezerwuj</button>
                    <h2>Nadchodzące premiery</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="gallery_part_item">
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        <a href="img/gallery/gallery_item_1.png"
                           class="grid-item bg_img img-gal grid-item--height-1"
                           style="background-image: url('img/gallery/gallery_item_1.png')">
                            <div class="single_gallery_item">
                                <div class="single_gallery_item_iner">
                                    <div class="gallery_item_text">
                                        <i class="ti-zoom-in"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="img/gallery/gallery_item_2.png" class="grid-item bg_img img-gal"
                           style="background-image: url('img/gallery/gallery_item_2.png')">
                            <div class="single_gallery_item">
                                <div class="single_gallery_item_iner">
                                    <div class="gallery_item_text">
                                        <i class="ti-zoom-in"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="img/gallery/gallery_item_3.png" class="grid-item bg_img img-gal"
                           style="background-image: url('img/gallery/gallery_item_3.png')">
                            <div class="single_gallery_item">
                                <div class="single_gallery_item_iner">
                                    <div class="gallery_item_text">
                                        <i class="ti-zoom-in"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="img/gallery/gallery_item_5.png"
                           class="grid-item bg_img img-gal grid-item--height-2"
                           style="background-image: url('img/gallery/gallery_item_5.png')">
                            <div class="single_gallery_item">
                                <div class="single_gallery_item_iner">
                                    <div class="gallery_item_text">
                                        <i class="ti-zoom-in"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="img/gallery/gallery_item_7.png"
                           class="grid-item bg_img img-gal grid-item--height-2"
                           style="background-image: url('img/gallery/gallery_item_7.png')">
                            <div class="single_gallery_item">
                                <div class="single_gallery_item_iner">
                                    <div class="gallery_item_text">
                                        <i class="ti-zoom-in"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="img/gallery/gallery_item_6.png"
                           class="grid-item bg_img img-gal grid-item--width-1"
                           style="background-image: url('img/gallery/gallery_item_6.png')">
                            <div class="single_gallery_item">
                                <div class="single_gallery_item_iner">
                                    <div class="gallery_item_text">
                                        <i class="ti-zoom-in"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="img/gallery/gallery_item_4.png"
                           class="grid-item bg_img img-gal sm_weight  grid-item--height-1"
                           style="background-image: url('img/gallery/gallery_item_4.png')">
                            <div class="single_gallery_item">
                                <div class="single_gallery_item_iner">
                                    <div class="gallery_item_text">
                                        <i class="ti-zoom-in"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--::client logo part end::-->
<section class="client_logo">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="client_logo_slider owl-carousel d-flex justify-content-between">
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_1.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_2.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_3.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_4.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_5.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_1.png" alt="">
                    </div>
                    <div class="single_client_logo">
                        <img src="img/client_logo/client_logo_2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::client logo part end::-->



<!--::about_us part start::-->
<section class="live_stareams padding_bottom">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-3 offset-lg-1 offset-sm-1">
                <div class="live_stareams_text">
                    <h2> Aktualny <br> repertuar</h2>
                </div>
            </div>
            <div class="col-md-7 offset-sm-1">
                <div class="live_stareams_slide owl-carousel">
                    <div class="live_stareams_slide_img">
                        <img src="img/live_streams_1.png" alt="">
                        <div class="extends_video">
                            <a id="play-video_1" class="video-play-button popup-youtube"
                               href="https://www.youtube.com/watch?v=BC4cyYRxjFk">
                                <span class="fas fa-play"></span>
                            </a>
                        </div>
                    </div>
                    <div class="live_stareams_slide_img">
                        <img src="img/live_streams_2.png" alt="">
                        <div class="extends_video">
                            <a id="play-video_1" class="video-play-button popup-youtube"
                               href="https://www.youtube.com/watch?v=BC4cyYRxjFk">
                                <span class="fas fa-play"></span>
                            </a>
                        </div>
                    </div><div class="live_stareams_slide_img">
                        <img src="img/live_streams_3.png" alt="">
                        <div class="extends_video">
                            <a id="play-video_1" class="video-play-button popup-youtube"
                               href="https://www.youtube.com/watch?v=BC4cyYRxjFk">
                                <span class="fas fa-play"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!--::about_us part end::-->


</div>

<!-- jquery plugins here-->
<script src="js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="js/swiper.min.js"></script>
<!-- swiper js -->
<script src="js/masonry.pkgd.js"></script>
<!-- particles js -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<!-- slick js -->
<script src="js/slick.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
@endsection
