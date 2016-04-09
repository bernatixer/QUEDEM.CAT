<?php
include('config.php');
if(isset($_SESSION['nom'])){
	unset($_SESSION['nom'], $_SESSION['id']);
}
echo "<script type=\"text/javascript\">window.location='index.html';</script>";
?>