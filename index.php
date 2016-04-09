<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>QUEDEM.CAT</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!--<link href="css/navbar-fixed-top.css" rel="stylesheet">-->

      <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="full-width">

  <section id="container" class="">
      <!--header start-->
		<?php
		include('header.php');
		?>
      <!--header end-->
      <!--sidebar start-->

      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-6">
                      <div id="accordion" class="panel-group m-bot20">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
                                          Informació general
                                      </a>
                                  </h4>
                              </div>
                              <div class="panel-collapse collapse in" id="collapseOne">
                                  <div class="panel-body">
                                      <a href="http://ensenyament.gencat.cat/ca/index.html">Web d'Ensenyament GenCat</a><br/>
                                      <a href="http://www.acjoventut.cat/">Agència Catalana de la Joventut</a><br/>
									  <a href="http://socioeconomicaunillanos.blogspot.com.es/">Área Promoción Socioeconómica Bienestar Universitario Unillanos</a><br/>
									  <a href="http://selecat.cat/">Tots els exàmens de les PAU de totes les materies amb solucions</a><br/>
									  <a href="http://www.upf.edu/estudiants/simulador/#.Vl4LSHYveUk">Simulador de notes de tall</a><br/>
									  <a href="http://www.selectes.cat">Web de Selectes</a><br/>
								  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <section class="panel">
                          <header class="panel-heading">
                              Informació
                              <span class="tools pull-right">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                          </header>
                          <div class="panel-body">
                              <p>
								A la pàgina hi trobaràs links amb informació per a la selectivitat i altres cursos.
								 Per exemple, exercicis de matemàtiques amb el problema i la seva solució.
								 Els links són pàgines de tercers però tots tenen exercicis per a la selectivitat o la ESO.
								 En aquest apartat pots també accedir a portals d'universitats i a les notes de tall, com simular d'igual manera la teva futura nota de les PAU.
							  </p>
                          </div>
                      </section>

                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 &copy; QUEDEM.CAT per Bernat Torres
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>


  </body>
</html>
