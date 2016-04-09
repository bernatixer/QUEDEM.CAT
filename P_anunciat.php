<?php
include('config.php');
if(!isset($_SESSION['nom'])){
	echo "<script type=\"text/javascript\">window.location='index.php';</script>";
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
<?php
$a = false;
if(isset($_POST['info'], $_POST['assignatura'], $_POST['correu'], $_POST['telefon'], $_POST['preu'])){
	if(strlen($_POST['telefon'])==9){
		if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['correu'])){
			$info = stripslashes($_POST['info']);
			$assignatura = stripslashes($_POST['assignatura']);
			$correu = stripslashes($_POST['correu']);
			$telefon = stripslashes($_POST['telefon']);
			$preu = stripslashes($_POST['preu']);
			$id = $_SESSION['id'];
			if(mysql_query('INSERT INTO `TDR_professors`(`id`, `info`, `asignatures`, `correu`, `telefon`, `preu`) VALUES ('.$id.',"'.$info.'","'.$assignatura.'","'.$correu.'","'.$telefon.'","'.$preu.'")')){
				echo "<script type=\"text/javascript\">window.location='P_buscar.php';</script>";
			}else{
				$a = true;
				$m = 'Error SQL';
			}
		}else{
			$a = true;
			$m = 'Format del correu incorrecte';
		}
	}else{
		$a = true;
		$m = 'Format del telefon incorrecte';
	}
}
?>
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
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      <section class="panel">
                          <div class="bio-graph-heading">
                              <h1>Anuncia't com a professor particular</h1>
                          </div>
                          <div class="panel-body bio-graph-info">
							<?php
							if($a){
							?>
							<div class="alert alert-block alert-danger fade in">
								<button data-dismiss="alert" class="close close-sm" type="button">
									<i class="icon-remove"></i>
								</button>
								<?php echo $m; ?>
							</div>
							<?php
							}		
							?>
                              <form class="form-horizontal" role="form" action="#" method="POST" >
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Escriu sobre tu</label>
                                      <div class="col-lg-10">
                                          <textarea name="info" id="" class="form-control" cols="30" rows="10"></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Assignatura(es)</label>
                                      <div class="col-lg-6">
                                          <input name="assignatura" type="text" class="form-control" id="c-name" placeholder="Física, Química... ">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Preu/Hora</label>
                                      <div class="col-lg-6">
                                          <input name="preu" type="text" class="form-control" id="c-name" placeholder=" ">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Correu de contacte (públic)</label>
                                      <div class="col-lg-6">
                                          <input name="correu" type="text" class="form-control" id="b-day" placeholder=" ">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Telefon de contacte (públic)</label>
                                      <div class="col-lg-6">
                                          <input name="telefon" type="text" class="form-control" id="occupation" placeholder=" ">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-success">Anunciar-te</button>
                                          <a href="perfil.php" class="btn btn-default">Cancelar</a>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
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
