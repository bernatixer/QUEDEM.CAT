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
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datetimepicker/css/datetimepicker.css" />
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

if(isset($_POST['accio'])){
	if($_POST['accio']=="Unir-se"){
		$id_U = $_SESSION['id'];
		$id_G = $_POST['id'];
	$dn = mysql_num_rows(mysql_query("SELECT * from TDR_participacions WHERE id_U='$id_U' AND id_G='$id_G'"));
	if($dn == 0){
		if(mysql_query('INSERT INTO `TDR_participacions`(`id_G`, `id_U`) VALUES ("'.$id_G.'","'.$id_U.'")')){
			echo "<script type=\"text/javascript\">window.location='perfil.php';</script>";
		}else{
			$a = true;
			$m = 'Error SQL';
		}
	}
	}
}
if(isset($_POST['nom'], $_POST['data'], $_POST['lloc'], $_POST['descripcio'])){
	$nom = stripslashes($_POST['nom']);
	$data = stripslashes($_POST['data']);
	$lloc = stripslashes($_POST['lloc']);
	$descripcio = stripslashes($_POST['descripcio']);

	$rep = 0;
	if($_POST['rep'] == "rep"){
		$rep = 1;
	}else{
		$rep = 0;
	}
	
	$nums = explode(' ', $data);
	$data0 = str_replace(":", " ", $nums[1]);
	$nums0 = explode(' ', $data0);
	$data = strtotime($nums[0]) + ($nums0[0]*3600 + $nums0[1]*60);
	
	if($_POST['foto'] != null){
		$foto = stripslashes($_POST['foto']);
	}else{
		$foto = "http://bernatixer.com/TDR/img/group.png";
	}
	$id = $_SESSION['id'];
	$dn2 = mysql_num_rows(mysql_query('SELECT id from TDR_grups'));
	$id2 = $dn2+1;
	if(mysql_query('INSERT INTO `TDR_grups`(`id`, `organitzador`, `nom`, `descripcio`, `data`, `repetitiu`, `lloc`, `imatge`) VALUES ("'.$id2.'","'.$id.'","'.$nom.'","'.$descripcio.'","'.$data.'","'.$rep.'","'.$lloc.'","'.$foto.'")')){
		echo "<script type=\"text/javascript\">window.location='grups.php';</script>";
	}else{
		$a = true;
		$m = 'Error SQL';
	}
}
?>
      <!--header start-->
		<?php
		include('header.php');
		?>
      <!--header end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
					<button type="button" class="btn btn-shadow btn-success" data-toggle="modal" href="#myModal"><i class="icon-plus"></i>  Crear el teu grup</button>
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th><center>GRUPS</center></th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							  $dn1 = mysql_query('SELECT * from TDR_grups ORDER BY data DESC');
							  while($dn = mysql_fetch_assoc($dn1)){
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
                              <tr class="">
                                  <td>
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
										<div align="right">
											<form id="unirse" method="POST" action="#">
												<button class="btn btn-success" type="submit" <?php if($timestamp >= $dn['data'] && $dn['repetitiu'] == 0){ echo "disabled";} ?>>Unir-se</button>
												<input type="hidden" name="accio" value="Unir-se">
												<input type="hidden" name="id" value="<?php echo $dn['id']; ?>">
											</form>
										</div>
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
								  </td>
                              </tr>
							  <?php
							  }
							  ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Crear un grup</h4>
				</div>
			<div class="modal-body">
				<form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="#">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-4">Nom del grup</label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="cname" name="nom" minlength="3" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-4">Data i hora</label>
                                          <div class="col-lg-8">
										      <input size="16" type="text" name="data" readonly class="form_datetime form-control">
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-lg-4">Lloc</label>
                                          <div class="col-lg-8">
                                              <input class="form-control " id="curl" type="text" name="lloc" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Descripció</label>
                                          <div class="col-lg-10">
                                              <textarea class="form-control " id="ccomment" name="descripcio" required></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-4">Il·lustració</label>
                                          <div class="col-lg-8">
                                              <input class=" form-control" id="cname" name="foto" minlength="5" type="text" />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-8 col-lg-4">
										  <input type="checkbox" id="checkbox-01" name="rep" value="rep"> Repetitiu<br/>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-10 col-lg-2">
                                              <button class="btn btn-success" type="submit">Crear</button>
                                          </div>
                                      </div>
				</form>

			</div>
			</div>
		</div>
	</div>
	<!-- modal -->
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
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script src="js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
	<!--custom checkbox & radio-->
	<script type="text/javascript" src="js/ga.js"></script>
	<!--script for this page-->
	<script src="js/form-component.js"></script>
  
      <!--script for this page only-->
      <script src="js/editable-table.js"></script>
	  <script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	  <script src="js/advanced-form-components.js"></script>
      <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script>


  </body>
</html>