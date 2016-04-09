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
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<?php
$a = false;
$b = false;
if(!isset($_SESSION['nom'])){
	if(isset($_POST['correu'], $_POST['contrasenya'])){
	
		$rep = 0;
		if($_POST['rep'] == "rep"){
			$rep = 1;
		}else{
			$rep = 0;
		}
	
		$correu = stripslashes($_POST['correu']);
		$contrasenya = md5(stripslashes($_POST['contrasenya']));
		$req = mysql_query('select id,nom,contrasenya from TDR_usuaris where correu="'.$correu.'"');
		$dn = mysql_fetch_array($req);
		if($rep == 1){
		if(($dn['contrasenya'] == $contrasenya) && (mysql_num_rows($req) > 0)){
			$_SESSION['nom'] = $dn['nom'];
			$_SESSION['id'] = $dn['id'];
			echo "<script type=\"text/javascript\">window.location='index.php';</script>";
		}else{
			$a = true;
		}
		}else{
			$b = true;
		}
	}
}else{
	echo "<script type=\"text/javascript\">window.location='index.php';</script>";
}
?>
  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="#" method="POST">
        <h2 class="form-signin-heading">ENTRAR</h2>
        <div class="login-wrap">
		<?php
		if($a){
		?>
		<div class="alert alert-block alert-danger fade in">
			<button data-dismiss="alert" class="close close-sm" type="button">
				<i class="icon-remove"></i>
			</button>
			L'usuari o la contrasenya son incorrectes
		</div>
		<?php
		}
		if($b){
		?>
		<div class="alert alert-block alert-danger fade in">
			<button data-dismiss="alert" class="close close-sm" type="button">
				<i class="icon-remove"></i>
			</button>
			Has d'acceptar la política de privacitat de dades
		</div>
		<?php
		}
		?>
            <input type="text" name="correu" class="form-control" placeholder="Correu" autofocus>
            <input type="password" name="contrasenya" class="form-control" placeholder="Contrasenya">
            <label class="checkbox" name="rep" value="rep">
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> He perdut la contrasenya</a>
                </span>
            </label>
            <label class="checkbox">
                <span class="pull-right">
                    <input type="checkbox" id="checkbox-01" name="rep" value="rep"> Accepto la <a data-toggle="modal" href="#pvo">política de privacitat</a>
                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Entrar</button>
            <div class="registration">
                No tens un compte?
				<span class="pull-right">
					<a class="" href="registre.php">
						Registrar-se
					</a>
                </span>
            </div>

        </div>
          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">CONTRASENYA PERDUDA</h4>
                      </div>
                      <div class="modal-body">
                          <p>Escriu el teu correu per canviar la teva contrasenya</p>
                          <input type="text" name="email" placeholder="Correu" autocomplete="off" class="form-control placeholder-no-fix">
                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                          <button class="btn btn-success" type="button">Seguir</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->
          <!-- Modal 2 PVO -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="pvo" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Política de privacitat de QUEDEM.CAT</h4>
                      </div>
                      <div class="modal-body">
                          <p><div align="left" color="black"><h3>
<b>Acceptació dels termes d’ús</b><br/>
La utilització d’aquest lloc web és absolutament voluntària i suposa l'acceptació plena per qui accedeix al mateix, d'ara endavant l'Usuari, de la POLITICA DE PRIVACITAT. 
<br/><br/>
<b>1. Ús del servei i responsabilitats</b><br/>
Les condicions d'accés i ús de la present pàgina web es regeixen pel principi de bona fe comprometent-se l'Usuari a realitzar un bon ús de la web i dels serveis que s'ofereixen.
<br/><br/>
<b>2. Política de protecció de dades</b><br/>
Per mitjà del formulari de registre, es recopila una sèrie de dades personals de l’Usuari necessàries per donar el servei per al qual ha estat desenvolupada aquesta web. L'Usuari haurà prèviament de donar-se d'alta com a tal, havent d'acceptar el tractament de les seves dades personals.
<br/><br/>
<b>3. Exclusió de responsabilitat</b><br/>
Es declina tota responsabilitat en cas que l'accés o les visites a la web es veiessin impossibilitades o dificultades a causa d'una interrupció o defectuosa prestació del subministrament elèctric, telefònic o d'altres proveïdors de telecomunicacions aliens.
<br/><br/>
Aquesta web proporciona enllaços a altres pàgines declinant tota responsabilitat que pogués sorgir en accedir a les pàgines de tercers.
<br/><br/>
Aquesta web no realitza cap activitat comercial.
						  
						  <h3></div></p>
                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Tancar</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->
      </form>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
