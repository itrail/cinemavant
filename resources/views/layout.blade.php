<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Główna</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- modal CSS -->
    <link rel="stylesheet" href="css/modal.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", rel="stylesheet", integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN", crossorigin="anonymous">
</head>

<body>
        <div class="container">
            <!--::header part start::-->
            <header class="main_menu single_page_menu">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <a class="navbar-brand" href="/index"> <img src="img/logo.png" alt="logo"> </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="menu_icon"><i class="fas fa-bars"></i></span>
                                </button>
                                <!-- pasek menu -->
                                <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/index">Strona główna</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/price_list">Cennik</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/repertoire">Repertuar</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="promocje.html" id="navbarDropdown"
                                               role="button" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">
                                                Promocje
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="promocje.html">Tanie wtorki</a>
                                                <a class="dropdown-item" href="maraton.html">Maratony filmowe</a>
                                            </div>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="/contact">Kontakt</a>
                                        </li>
                                    </ul>
                                </div>
                                <button class="btn_1 d-none d-sm-block" id="login_button" onclick="document.getElementById('id01').style.display='block';document.getElementById('id02').style.display='none'">Zaloguj</button>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header part end-->

            @yield('content')

            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <h2>Logowanie</h2>

                <form method="POST" action="/login">
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
                        <button style="cursor:pointer" type="submit" class="btn btn-primary" required="required">Zaloguj</button>
                    </div>
                </form>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById('id01');
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
        </div>

        <div id="id02" class="modal">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2>Rejestracja</h2>
            <form method="POST" action="/register">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="firstname">Imię:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required="required">
                </div>

                <div class="form-group">
                    <label for="surname">Nazwisko:</label>
                    <input type="text" class="form-control" id="surname" name="surname" required="required">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required="required">
                </div>

                <div class="form-group">
                    <label for="password">Hasło:</label>
                    <input type="password" class="form-control" id="password" name="password" required="required">
                </div>

                <div class="form-group">
                    <label for="password">Powtórz hasło:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required="required">
                </div>

                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Załóż konto</button>
                </div>

            </form>

        </div>



        <script>
            // Get the modal
            var modal = document.getElementById('id02');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        </div>


        <script>
            function hide_button() {
                document.getElementById("login_button").style.display = "none";
            }
        </script>
</body>

</html>
