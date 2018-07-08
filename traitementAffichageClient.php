<?php
include_once 'configuration.php';
$sql = "SELECT idclient, nom, prenom FROM client";
$resultat = mysqli_query($link, $sql);
?>