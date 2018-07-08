<?php
include_once 'classeProduit.php';
if(isset($_POST['libelle']) && isset($_POST['prix']) && $_POST['quantite']){
	$idproduit = 0;
	$libelle = $_POST['libelle'];
	$prix = $_POST['prix'];
	$quantite = $_POST['quantite'];
	$produit = new Produit($idproduit,$libelle,$prix,$quantite);
	$produit->creer();
	
	header("Location:produit.php");
}
?>