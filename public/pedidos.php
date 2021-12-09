<?php 
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>SoundLevel - Sonorização de eventos</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Vrinda Maru Kansal">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

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
	
    <link href="plugin/rs-plugin/css/settings.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

</head>
<body>
    <!-- Preloader -->
    <section id="preloader">
        <div class="loader" id="loader">
            <div class="loader-img"></div>
        </div>
    </section>
    </div>

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

                <!-- Mobile Navbar Icon -->
                <div class="nav-mobile nav-bar-icon">
                    <span></span>
                </div>

                <!-- Menu -->
                <div class="nav-menu">
                    <ul class="nav-menu-inner">
                        <li>
                            <a class="" href="index.php">Início</a>
                        </li>
                        <li>
                            <a class="btn btn-md btn-black join-btn" href="pedidos.php">Criar pedidos</a>
                        </li>
                        <li>
                            <a class="" href="contact-us.html">Contactos</a>
                        </li>
                        <li>
                            <a class="" style="background-color:grey" href="login.php">Conta</a>
                        </li>
                    </ul>
                </div>

            </div>
        </header>

        <!-- CONTENT --------------------------------------------------------------------------------->
        <section class="inner-intro dark-bg overlay-dark">
            <div class="container">
                <div class="row title">
                    <h2 class="h2">CRIAR UM PEDIDO</h2>
          <p>Introduza os dados do seu evento</p>
                </div>
            </div>
        </section>

        <!-- Formulário de Pedido -->
        <section class="ptb-60 ptb-sm-30">
            <div class="container">
                <div class="row">
				    <div class="col-md-6 pb-60">
                        <form class="contact-form"  method="POST" action="inserir-pedidos.php">
                        <?php 
                               if(isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset ($_SESSION['msg']);
                                }
                               ?>
                            <h6>INFORMAÇÕES DO EVENTO</h6>
                                <!-- Pedido enviado com sucesso -->
                            <h6 class="successContent">
                                <i class="fa fa-check left" style="color: #5cb45d;"></i>O seu pedido foi enviado com sucesso.
                            </h6>
                            <!-- Pedido não foi enviado com sucesso -->
                            <h6 class="errorContent">
                                <i class="fa fa-exclamation-circle left" style="color: #e1534f;"></i>Por favor preencha os campos corretamente.
                            </h6>

                            <!-- Formulário pedidos -->
                            <div class="form-field-wrapper">
                                <input class="input-sm form-full" type="text" name="nome" placeholder="Nome do Organizador" required>
                            </div>

                            <div class="form-field-wrapper">
                                <input class="input-sm form-full" type="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="form-field-wrapper">
                                <input class="input-sm form-full" type="text" name="telefone" placeholder="Telefone" required>
                            </div>

                            <div class="form-field-wrapper">
                                <select class="input-sm form-full" placeholder="Tipo de Evento" name="tipo_evento" style="height:40px" required>
                                    <option>Tipo de Evento</option>
                                    <option value="Casamento">Casamento</option>
                                    <option value="Batizado">Batizado</option>
                                    <option value="Aniversário">Aniversário</option>
                                    <option value="Showcase">Showcase</option>
                                    <option value="Música ao vivo">Música ao Vivo</option>
                                    <option value="Festa particular">Festa Particular</option>
                                    <option value="Festa universitária">Festa Universitária</option>
                                    <option value="Discoteca">Discoteca</option>
                                    <option value="Concerto">Concerto</option>
                                    <option value="Feira">Feira</option>
                                    <option value="Festa Popular">Festa Popular</option>
                                    <option value="Outro">Outro</option>

                                </select>
                            </div>
                            <div class="form-field-wrapper">
                                <input class="input-sm form-full" type="date" name="data_evento" required>
                            </div>
                            <div class="form-field-wrapper">
                                <textarea class="form-full" rows="9" name="pedido" placeholder="Descrever pedido" required></textarea>
                            </div>
                            
                            <div class="form-field-wrapper">
                                <select class="input-sm form-full" placeholder="Empresa" name="empresa" style="height:40px" required>
                                    <option>Empresa</option>
                                    <option value="0">Music For All</option>
                                    <option value="1">Just Music</option>
                                    <option value="2">Music Word</option>
                                </select>
                            </div>




                        </div>
                    <div class="col-md-5 col-md-offset-1 contact">
                        <div class="contact-box-left mb-45">
                            <h6>Localização do Evento</h6>
                            <p>Inserir Coordenadas</p>
                            <div class="form-field-wrapper">
                                <input class="input-sm form-nfull" id="lat" type="text" name="latitude" placeholder="Latitude" style=" width: 200px" required>
                                <input class="input-sm form-nfull" id="long" type="text" name="longitude" placeholder="Longitude" style="width: 200px" required> 
                                <div class="btn" name="botaomapa" action="" style="margin: 3px; background-color: grey; color: white; width: 150px; text-align:center" onclick="coordinatechange()" > Ver no mapa</div><br>
                                <p style="margin-top: 20px">Inserir marcador no mapa</p>           
                                <div id="map" style="width: 600px; height: 400px;"></div>

                            <br>
                            <button class="btn btn-md btn-black" type="submit" id="form-submit" name="submit">Enviar Pedido</button>
                                </div>
                            </form>
                        </div>
                </div>
    </section>

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
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script>
    //criar mapa
    var map = L.map('map').setView([39.89943634860599, -4.001464247703553], 6);
    // laywer osm
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    osm.addTo(map)

    //google view
    googleSet = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    });

    googleSet.addTo(map);

    //Editar o icone
    var myIcone = L.icon({
        iconUrl: 'img/concerto.png',
        iconSize: [30,40],
    });
    
    var marcador;
    //var pp = L.popup();
    function onMapClick(e) {
        
        if(marcador) 
            map.removeLayer(marcador);

        //adicionar marcador
        marcador = L.marker(e.latlng, { icon: myIcone, draggable:true });
        marcador.on('dragend',function (f){
             //passar a Lat e Long para a caixa de texto
            document.getElementById("lat").value =e.latlng.lat;
            document.getElementById("long").value =e.latlng.lng;
         }) 
        
        console.log(marcador.toGeoJSON());
        map.addLayer(marcador);

        //passar a Lat e Long para a caixa de texto
        document.getElementById("lat").value =e.latlng.lat;
        document.getElementById("long").value =e.latlng.lng;
    }
    
    map.on('click', onMapClick);


function coordinatechange()  {
    if(marcador) 
        map.removeLayer(marcador);

        //adicionar marcador
        var coordenadas = [document.getElementById("lat").value,document.getElementById("long").value];
        //console.log(coordenadas);
        marcador = L.marker(coordenadas, { icon: myIcone, draggable:true });
        console.log(marcador);
        marcador.on('dragend',function (f){
             //passar a Lat e Long para a caixa de texto
            document.getElementById("lat").value =map.latlng.lat;
            document.getElementById("long").value =map.latlng.lng;
         }) 

        console.log(marcador.toGeoJSON());
        map.addLayer(marcador);

}
</script>