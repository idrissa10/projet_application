<?php
include_once 'configuration.php';
session_start();
if(isset($_SESSION['login']) AND isset($_SESSION['prenom'])){
	unset ($_SESSION['login']);
	unset ($_SESSION['prenom']);
	header("Location:ConnexionInscription.php");
}else{
	header("Location:ConnexionInscription.php");
}
?>