<?php
include_once 'classeClient.php';
if(isset($_POST['idclient']) or isset($_POST['nom']) or isset($_POST['prenom'])){
	if($_POST['idclient']!=null){
		$idclient = $_POST['idclient'];
		header("Location:client.php?idclient=$idclient");
	}else{
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		header("Location:client.php?nom=$nom&prenom=$prenom");
	}
}
?>