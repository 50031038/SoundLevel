<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>SoundLevel - Sonorização de eventos</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Vrinda Maru Kansal">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Favicone Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="apple-touch-icon" href="img/favicon.png">

    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.css" rel="stylesheet" type="text/css" />
    <link href="css/plugin/sidebar-menu.css" rel="stylesheet" type="text/css" />
    <link href="css/plugin/animate.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />

    
</head>

<body>

    <!-- Preloader -->
    <section id="preloader">
        <div class="loader" id="loader">
            <div class="loader-img"></div>
        </div>
    </section>
    <!-- End Preloader -->

    <!-- Search Overlay Menu  -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><i class="ion ion-ios-close-empty"></i></span>
        <form role="search" id="searchform" action="/search" method="get">
            <input value="" name="q" type="search" placeholder="Search..." />
            <button type="submit"><i class="ion ion-ios-search"></i></button>
      </form>
    </div>
    <!-- End Search Overlay Menu -->

        <!-- Site Wraper -->
    <div class="wrapper">

        <!-- Header -->
        <header id="header" class="header shadow">
            <div class="header-inner">

              <!-- Logo -->
              <div class="logo">
                  <a href="index.php">
                    <h1><font color="white">SOUND<font color="grey">LEVEL</h1>
                  </a>
              </div>
              <!-- End Logo -->

                <!-- Rightside Menu (Search icon) -->
                <div class="side-menu-btn">
                    <ul>
                        <!-- Search Icon
                        <li class="">
                            <a class="search-overlay-menu-btn header-icon"><i class="fa fa-search"></i></a>
                        </li>-->
                        <!-- End Search Icon -->
                    </ul>
                </div>
                <!-- End Rightside Menu -->

                <!-- Mobile Navbar Icon -->
                <div class="nav-mobile nav-bar-icon">
                    <span></span>
                </div>
                <!-- End Mobile Navbar Icon -->

                <!-- Navbar Navigation -->
                <div class="nav-menu">
                    <ul class="nav-menu-inner">
                        <li>
                            <a class="" href="index.php">Início</a>
                        </li>
                        <li>
                            <a class="" href="pedidos.php">Criar pedidos</a>
                        </li>
                        <li>
                            <a class="btn btn-md btn-black join-btn" href="contact-us.html">Contactos</a>
                        </li>
                        <li>
                            <a class="btn btn-md btn-black join-btn" style="background-color:grey" href="login.php">Conta</a>
                        </li>
                    </ul>
                </div>
                <!-- End Navbar Navigation -->

            </div>
        </header>
        <!-- End Header -->

        <!-- CONTENT --------------------------------------------------------------------------------->
        <!-- Intro Section -->
        <section class="inner-intro dark-bg overlay-dark">
            <div class="container">
                <div class="row title">
                    <h2 class="h2">Login</h2>
					<p>Área de Gestão</p>
				</div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="ptb-60 ptb-sm-30">
            <div class="container">
                <div class="row">
				<div class="col-md-6 pb-60" style="margin-left:270px">
                        <!-- Contact FORM -->
                        <form class="contact-form" action="efetualogin.php" method="POST">
                            
                            <!-- IF MAIL SENT SUCCESSFULLY -->
                            <h6 class="successContent">
                            <i class="fa fa-check left" style="color: #5cb45d;"></i>Your message has been sent successfully.
                            </h6>
                            <!-- MAIL SENDING UNSUCCESSFULL -->
                            <h6 class="errorContent">
                                <i class="fa fa-exclamation-circle left" style="color: #e1534f;"></i>There was a problem validating the form please check!
                            </h6>
                            <!-- Login -->
                            <div class="form-field-wrapper"  >
                                <input class="input-sm form-full" id="user" type="text" name="user" placeholder="Utilizador" required>
                            </div>
                            <div class="form-field-wrapper">
                                <input class="input-sm form-full" id="password" type="password" name="password" placeholder="Password" required>
                            </div>
                            <button style="margin-left:200px" class="btn btn-md btn-black" type="submit" id="form-submit" name="login">Efetuar Login</button>
                        </form>
                        <!-- END Contact FORM -->
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section -->

        <!-- End CONTENT ------------------------------------------------------------------------------>

           <!-- FOOTER -->
        <footer class="footer pt-60">
            <div class="container">
                <!--Footer Info -->
                <div class="row footer-info mb-30">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-sm-30 text-sm-left">
                        <ul class="link-small">
                            <li><a href="mailto:yourname@domain.com"><i class="fa fa-envelope-o left"></i>soudlevel@gmail.com</a></li>
                            <li><a><i class="fa fa-phone left"></i>+351 211 000 123</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Footer Info -->
            </div>

            <hr />

            <!-- Copyright Bar -->
            <section class="copyright ptb-15">
                <div class="container">
					<div class="row">
						<div class="col-sm-6 text-left text-sm-left">© 2021 <a href="index.html"><b>SoundLevel</b></a>. All Rights Reserved.</div>
					</div>
                </div>
            </section>
            <!-- End Copyright Bar -->

        </footer>
        <!-- END FOOTER -->

        <!-- Scroll Top -->
        <a class="scroll-top">
            <i class="fa fa-angle-double-up"></i>
        </a>
        <!-- End Scroll Top -->
    </div>
    <!-- Site Wraper End -->


    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.easing.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.flexslider.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.fitvids.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.viewportchecker.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.stellar.min.js" type="text/javascript"></script>
    <script src="js/plugin/wow.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.colorbox-min.js" type="text/javascript"></script>
    <script src="js/plugin/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/plugin/isotope.pkgd.min.js" type="text/javascript"></script>
    <script src="js/plugin/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="js/plugin/imagesloaded.pkgd.min.js" type="text/javascript"></script>
    <script src="js/plugin/jquery.fs.tipper.min.js" type="text/javascript"></script>
    <script src="js/plugin/mediaelement-and-player.min.js"></script>
    <script src="js/plugin/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/plugin/sidebar-menu.js" type="text/javascript"></script>
    <script src="js/theme.js" type="text/javascript"></script>
    <script src="js/navigation.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/map.js"></script>
    <script src="js/contact-form.js" type="text/javascript"></script>
</body>
</html>