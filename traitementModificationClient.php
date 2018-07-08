<?php
require_once 'classeClient.php';
session_start();
echo $_SESSION['login'];
if(isset($_SESSION['login']) AND isset($_SESSION['prenom'])){
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$idclient = $_POST['idclient'];
$client = new Client($idclient,$nom,$prenom);
$client->update();
header("Location:client.php");
}else{
	header("Location:ConnexionInscription.php?");
}
?>