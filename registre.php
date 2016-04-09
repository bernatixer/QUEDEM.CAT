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

  <body class="login-body">

    <div class="container">
<?php
$a = false;
if(isset($_POST['nom'], $_POST['contrasenya'], $_POST['correu'])){
	if(strlen($_POST['contrasenya'])>=4){
		if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['correu'])){
			$nom = stripslashes($_POST['nom']);
			$correu = stripslashes($_POST['correu']);
			$contrasenya = md5(stripslashes($_POST['contrasenya']));
			$tipus = "";
			if(isset($_POST['estudiant'])){
				$tipus = "Estudiant";
			}
			if(isset($_POST['professor'])){
				$tipus = "Professor";
			}
			if(isset($_POST['estudiant']) && isset($_POST['professor'])){
				$tipus = "Estudiant/Professor";
			}
			$dn1 = mysql_num_rows(mysql_query('SELECT id from TDR_usuaris where correu="'.$correu.'"'));
			if($dn1==0){
				$dn2 = mysql_num_rows(mysql_query('SELECT id from TDR_usuaris'));
				$id = $dn2+1;
				if(mysql_query('INSERT into TDR_usuaris(`id`, `nom`, `correu`, `contrasenya`, `tipus`) values ('.$id.',"'.$nom.'","'.$correu.'","'.$contrasenya.'","'.$tipus.'")')){
					$_SESSION['nom'] = $nom;
					$_SESSION['id'] = $id;
					echo "<script type=\"text/javascript\">window.location='index.php';</script>";
				}else{
					$a = true;
					$m = 'Error SQL';
				}					
			}else{
				$a = true;
				$m = 'Aquest correu ja existeix';
			}
		}else{
			$a = true;
			$m = 'Format del correu incorrecte';
		}
	}else{
		$a = true;
		$m = 'Per seguretat la teva contrasenya necesita tenir un mínim de 4 caracters';
	}
}
?>
      <form class="form-signin" action="#" method="POST" >
        <h2 class="form-signin-heading">REGISTRA'T</h2>
        <div class="login-wrap">
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
            <p>Tota la informació és necessària</p>
            <input type="text" name="nom" class="form-control" placeholder="Nom i cognoms" autofocus>
            <input type="text" name="correu" class="form-control" placeholder="Correu">
            <input type="password" name="contrasenya" class="form-control" placeholder="Contrasenya">
            <div class="radios">
                <label class="label_radio col-lg-6 col-sm-6" for="radio-01">
                    <input name="estudiant" id="radio-01" value="1" type="checkbox" /> Estudiant
                </label>
                <label class="label_radio col-lg-6 col-sm-6" for="radio-02">
                    <input name="professor" id="radio-02" value="1" type="checkbox" /> Professor
                </label>
            </div><hr/>
            <button class="btn btn-lg btn-login btn-block" type="submit">REGISTRAR-SE</button>

            <div class="registration">
                Ja tens un compte?
                <a class="" href="entrar.php">
                    Entrar
                </a>
            </div>
        </div>
      </form>
    </div>
  </body>
</html>
