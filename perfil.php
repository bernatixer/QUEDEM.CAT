<?php
include('config.php');
if(!isset($_SESSION['nom'])){
	echo "<script type=\"text/javascript\">window.location='index.php';</script>";
}
if(isset($_POST['accio'])){
	if($_POST['accio']=="Borrar-se"){
		$id_U = $_SESSION['id'];
		$id_G = $_POST['id'];
	$dn = mysql_query("DELETE FROM `TDR_participacions` WHERE id_U='$id_U' AND id_G='$id_G'");
	echo "<script type=\"text/javascript\">window.location='perfil.php';</script>";
	}
}
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
		$dn1 = mysql_fetch_array(mysql_query('SELECT correu,tipus from TDR_usuaris where id="'.$_SESSION['id'].'"'));
		?>
      <!--header end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="img/profile-avatar.jpg" alt="">
                              </a>
                              <h1><?php echo $_SESSION['nom'];?></h1>
                              <p><?php echo $dn1['correu'];?></p>
                              <p><h1><span class="label label-success"><?php echo $dn1['tipus']; ?></span></h1></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="perfil.php"> <i class="icon-user"></i> Perfil</a></li>
                              <li><a href="editar.php"> <i class="icon-edit"></i> Editar perfil</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
							  <?php
							$id_U = $_SESSION['id'];
							$dnn = mysql_query("SELECT * from TDR_participacions WHERE id_U='$id_U'");
							
							if(mysql_num_rows($dnn) > 0){
							while($row = mysql_fetch_assoc($dnn)){
							$id_G = $row['id_G'];
							  $dn = mysql_fetch_array(mysql_query("SELECT * from TDR_grups WHERE id='$id_G'"));
							  $dn2 = mysql_fetch_array(mysql_query('SELECT nom from TDR_usuaris where id="'.$dn['organitzador'].'"'));
							  $color = "green";
							  $data = date_create();
							  $dia = date('d', $dn['data']);
							  $hora = date('H', $dn['data']);
							  $minuts = date('i', $dn['data']);
							  $timestamp = date_timestamp_get($data);
							  if($timestamp >= $dn['data'] && $dn['repetitiu'] == 0){
								$color = "red";
							  }
							  ?>
                      <aside class="profile-nav alt <?php echo $color; ?>-border">
                          <section class="panel">
                              <div class="user-heading alt <?php echo $color; ?>-bg">
								<div class="row">
									<div class="col-lg-3">
									  <a href="#">
										  <img alt="" src="<?php echo $dn['imatge']; ?>">
									  </a>
									  <h1><?php echo $dn['nom']; ?></h1>
									  <p>per <?php echo $dn2['nom']; ?></p>
									</div>
									<div class="col-lg-7">
										<?php echo $dn['descripcio']; ?>
									</div>
									<div class="col-lg-2">
										<form id="borrarse" method="POST" action="#">
											<div align="right"><button class="btn btn-danger" type="submit" <?php if($timestamp >= $dn['data'] && $dn['repetitiu'] == 0){ echo "disabled";} ?>>Borrar-se</button></div>
											<input type="hidden" name="accio" value="Borrar-se">
											<input type="hidden" name="id" value="<?php echo $dn['id']; ?>">
										</form>
									</div>
								</div>
                              </div>

                              <ul class="nav nav-pills nav-stacked">
                                  <li><a href="javascript:;"> <i class="icon-calendar"></i> Dia <span class="label label-default pull-right r-activity"><?php echo $dia; ?></span></a></li>
                                  <li><a href="javascript:;"> <i class="icon-time"></i> Hora <span class="label label-primary pull-right r-activity"><?php echo $hora; ?>:<?php echo $minuts; ?></span></a></li>
                                  <li><a href="javascript:;"> <i class="icon-map-marker"></i> Lloc <span class="label label-warning pull-right r-activity"><?php echo $dn['lloc']; ?></span></a></li>
                                  <li><a href="javascript:;"> <i class="icon-group"></i> Participants <span class="label label-info pull-right r-activity">10</span></a></li>
                              </ul>

                          </section>
                      </aside>
							  <?php
							  }
							  }else{
								echo "No estàs inscrit a cap grup";
							  }
							  ?>
                  </aside>
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
