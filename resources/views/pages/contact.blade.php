@extends('layout')

@section('content')
    <!-- gallery_part part start-->
    <section class="gallery_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        </br></br></br></br></br>

                        <section class="contact-section section_padding">
                            <div class="container">
                                <div class="d-none d-sm-block mb-5 pb-4">
                                    <div id="map" style="height: 600px;"></div>


                                    <script>
                                        function initMap() {
                                            var uluru = {
                                                lat: 30.363,
                                                lng: 131.044
                                            };
                                            var grayStyles = [{
                                                featureType: "all",
                                                stylers: [{
                                                    saturation: 100
                                                },
                                                    {
                                                        lightness: 50
                                                    }
                                                ]
                                            },
                                                {
                                                    elementType: 'labels.text.fill',
                                                    stylers: [{
                                                        color: '#000000'
                                                    }]
                                                }
                                            ];
                                            var map = new google.maps.Map(document.getElementById('map'), {
                                                center: {
                                                    lat: 54.51889,
                                                    lng: 18.53188
                                                },
                                                zoom: 9,
                                                styles: grayStyles,
                                                scrollwheel: true
                                            });
                                        }
                                    </script>
                                    <script
                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
                                    </script>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="contact-title">Napisz do nas</h2>
                                    </div>
                                    <div class="col-lg-8">
                                        <form class="form-contact contact_form" action="/php/contact_process.php" method="post" id="contactForm"
                                              novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">

                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'treść wiadomości'"
                                                  placeholder='Treść wiadomości'></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                                                               onblur="this.placeholder = 'Twoje imię'" placeholder='Twoje imię'>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                                                               onblur="this.placeholder = 'Podaj adres email'" placeholder='Podaj adres email'>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                                                               onblur="this.placeholder = 'Temat wiadomości'" placeholder='Temat wiadomości'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <button type="submit" class="button-contactForm btn_1">Wyślij</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="media contact-info">
                                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                                            <div class="media-body">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- ================ contact section end ================= -->


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
