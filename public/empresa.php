<?php
include("efetualogin.php");
include ("connection.php");

if(!isset($_SESSION["user"])){
    header("Location: empresa.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
 
        #tabelaEventos tr td{
            padding-left:5px;
            text-align: left;
            
            cursor: pointer; 
            }

        #tabelaEventos tr{
            background-color: #fff;
        }
        #tabelaEventos tr.selecionado td{
            background-color: #FFF4B2;
            text-color:#000;
        }
        #tabelaEventos tr td:last-child{
            text-align: right;
        }

        #tabelaLegenda th.legenda-oculta {
            opacity: 0.2;
        }
        
    </style> 
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=2IPDqxqRwe2tRFsBIUFegZOrJCzeK6me"></script>
    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=2IPDqxqRwe2tRFsBIUFegZOrJCzeK6me"></script>
    
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
                
                <!-- Mobile Navbar Icon -->
                <div class="nav-mobile nav-bar-icon">
                    <span></span>
                </div>
                
            </div>
        </header>
        <!-- End Header -->
        <!-- CONTENT --------------------------------------------------------------------------------->
        <!-- Intro Section -->
        <section class="inner-intro dark-bg overlay-dark">
            <div class="container">
                <div class="row title">
                    <h2 class="h2"> Bem-vindo, <?php echo $_SESSION['user']; ?> </h2>

					<p>Área de Gestão</p>
                    <a style="color: white; font-size:20px" type="logout" name="logout" href="logout.php" >Logout</a>
				</div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="ptb-60 ptb-sm-30">
            <div class="container">
                <div class="row">
                <h6>LISTA DE EVENTOS</h6>  
                    <table id="tabelaEventos" style="width:100%;">
                            <tr style="background-color:#F2F2F2;">
                                <th style="padding: 10px;">Nome</th>
                                <th style="padding: 10px;">Email</th>
                                <th style="padding: 10px;">Tipo de Evento</th>
                                <th style="padding: 10px;">Data</th>
                                <th style="padding: 10px;">Latitude</th>
                                <th style="padding: 10px;">Longitude</th>
                            </tr>   
                <?php

                        $sql = "SELECT eventos.nome, email, tipo_evento, data_evento, eventos.latitude, eventos.longitude, empresa.lat_empresa, empresa.long_empresa 
                        FROM eventos, empresa WHERE eventos.Empresa = empresa.id_Empresa AND empresa.user = '{$_SESSION[ "user" ]}' ORDER BY data_evento";
                        $result = $ligacao->query($sql);
                        $results = array();
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            array_push($results, $row);
                            echo " 
                            <tr>
                                <td style='padding-left: 10px;'>" . $row["nome"]." </td>
                                <td style='padding-left: 10px;'>". $row["email"]." </td>
                                <td style='padding-left: 10px;'>". $row["tipo_evento"]." </td>
                                <td style='padding-left: 10px;'>" . $row["data_evento"]." </td>
                                <td style='padding-left: 10px;'>" . $row["latitude"]." </td>
                                <td style='padding-left: 10px;'>" . $row["longitude"]." </td>
                            </tr> ";
                        }
                        } else {
                        echo "A empresa não tem eventos registados";
                        }
                        $ligacao->close();                   
            
                ?>  
                </table>
                <br>
                <h6>LOCALIZAÇÃO DOS EVENTOS</h6> 
            <div id="legenda-mapa"></div>

                <div id="map-empresa" style="width: 1200px; height: 500px;"></div>
                <br>
                <h9>Legenda</h9>
                <table id="tabelaLegenda" style="width:100%;">
                    <th id="casamento" style="padding: 10px;"> <img src="img/casamento.png" style="width:20px"><br>Casamento</th>
                    <th id="batizado" style="padding: 10px;"> <img src="img/batizado.png" style="width:20px"><br>Batizado</th>
                    <th id="aniversário" style="padding: 10px;"> <img src="img/aniversario.png" style="width:20px"><br>Aniversário</th>
                    <th id="showcase" style="padding: 10px;"> <img src="img/show.png" style="width:20px"><br>Showcase</th>
                    <th id="música ao vivo" style="padding: 10px;"> <img src="img/mvivo.png" style="width:20px"><br>Música ao Vivo</th>
                    <th id="festa particular" style="padding: 10px;"> <img src="img/fparticular.png" style="width:20px"><br>Festa Particular</th>
                    <th id="festa popular" style="padding: 10px;"> <img src="img/fpopular.png" style="width:20px"><br>Festa Popular</th>
                    <th id="festa universitária" style="padding: 10px;"> <img src="img/universidade.png" style="width:20px"><br>Festa Universitária</th>
                    <th id="concerto" style="padding: 10px;"> <img src="img/concerto.png" style="width:20px"><br>Concerto</th>
                    <th id="feira" style="padding: 10px;"> <img src="img/feira.png" style="width:20px"><br>Feira</th>
                    <th id="outro" style="padding: 10px;"> <img src="img/outro.png" style="width:20px"><br>Outro</th>
                    
                    <th id="empresa" style="padding: 10px;"> <img src="img/marker-company.png" style="width:20px"><br><?php echo $_SESSION['user']; ?></th>

                </table>
               
            </div>
        </div> 
        <section>
        <!-- Contact Section -->
        
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
    <script src="js/contact-form.js" type="text/javascript"></script>
</body>
</html>

<script>
    //Array Tipo de evento
    var imagens = {
        "Casamento": "img/casamento.png", //laranja
        "Batizado": "img/batizado.png",  //amarelo
        "Aniversário": "img/aniversario.png",
        "Showcase": "img/show.png",
        "Música ao Vivo": "img/mvivo.png",
        "Festa particular": "img/fparticular.png",
        "Festa Popular": "img/fpopular.png",
        "Festa Universitária": "img/universidade.png",
        "Discoteca": "img/disco.png",
        "Concerto": "img/concerto.png",
        "Feira": "img/feira.png",
        "Outro": "img/outro.png",

        "Empresa": "img/marker-company.png"  
    };

    //criar mapa
    var mapEmpresa = L.map('map-empresa', {
        layers: MQ.mapLayer(),
        center: [38.670230390453604, -9.14600031799764],
        zoom: 5
    });
    
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    osm.addTo(mapEmpresa);

    googleSet = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    });

    googleSet.addTo(mapEmpresa);


    var tabela = document.getElementById("tabelaEventos");
    var linhas = tabela.getElementsByTagName("tr");

    for(var i = 0; i < linhas.length; i++){
        var linha = linhas[i];
        linha.addEventListener("click", function(){
        //Adicionar ao atual
            selLinha(this); //Selecione apenas um
        });
    }

    function selLinha(linha){
        var linhas = linha.parentElement.getElementsByTagName("tr");
            for(var i = 0; i < linhas.length; i++){
                var linha_ = linhas[i];
                linha_.classList.remove("selecionado");    
            }
       
                linha.classList.toggle("selecionado");

        var latitude = linha.getElementsByTagName("td")[4].innerText;
        var longitude = linha.getElementsByTagName("td")[5].innerText;
        var tipo = linha.getElementsByTagName("td")[2].innerText;

        var eventos = <?php echo json_encode($results);?>;      

        runDirection(""+ eventos[0].lat_empresa + "," + eventos[0].long_empresa , ""+ latitude + "," + longitude, tipo);  
        
        var legenda = document.getElementById("tabelaLegenda");
        var headers = legenda.getElementsByTagName('th');
 
        console.log(legenda);
        for(var i  = 0; i < headers.length; i++){
                var l = headers[i];
                var tipo_evento = tipo.toLowerCase();
                console.log(tipo_evento);
        
                if(l.id!= tipo_evento && l.id!= "empresa") {
                    l.classList.add("legenda-oculta");
                } else l.classList.remove("legenda-oculta");
        }
    }
    
    var layerflag;

    //rota
    function runDirection(start, end, tipo) {
                 
        var dir = MQ.routing.directions();
        
        dir.route({
            locations: [
                start,
                end
            ]
        });

        if (layerflag) 
        mapEmpresa.removeLayer(layerflag);

        CustomRouteLayer = MQ.Routing.RouteLayer.extend({
            createStartMarker: (location) => {
                var custom_icon;
                var marker;
               
                custom_icon = L.icon({
                    iconUrl: imagens['Empresa'],
                    iconSize: [36, 36],
                    iconAnchor: [10, 29],
                    popupAnchor: [0, -29]
                });

                marker = L.marker(location.latLng, {icon: custom_icon}).addTo(mapEmpresa);
               // console.log(marker);
                return marker;
            },

            createEndMarker: (location) => {
                var custom_icon;
                var marker;

                custom_icon = L.icon({
                    iconUrl: imagens[tipo],
                    iconSize: [20, 29],
                    iconAnchor: [10, 29],
                    popupAnchor: [0, -29]
                });

                marker = L.marker(location.latLng, {icon: custom_icon}).addTo(mapEmpresa);

                return marker;
            }
        });
        layerflag = new CustomRouteLayer({
            directions: dir,
            fitBounds: true
        });

        mapEmpresa.addLayer(layerflag); 

}

</script>