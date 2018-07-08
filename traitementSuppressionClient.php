<?php
require_once 'classeClient.php';
session_start();
if(isset($_SESSION['login']) AND isset($_SESSION['prenom'])){
$idclient=$_GET['idclient'];
$client = new Client($idclient,"","");
$client->delete();
header("Location:client.php");
}else{
	header("Location:ConnexionInscription.php?");
}
?>