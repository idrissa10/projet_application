<?php
include_once 'classeClient.php';
if(isset($_POST['nom']) && isset($_POST['prenom'])){
	$idclient = 0;
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$client = new Client($idclient,$nom,$prenom);
	$client->creer();
	
	header("Location:client.php");
}
?>