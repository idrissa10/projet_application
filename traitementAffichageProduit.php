<?php
include_once 'configuration.php';
$sql = "SELECT idproduit, libelle, prix, quantite FROM produit";
$resultat = mysqli_query($link, $sql);
?>