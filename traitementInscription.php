<?php
include_once 'classeUtilisateur.php';
if($_POST['nom']!=null AND $_POST['prenom']!=null AND $_POST['login']!=null AND 
$_POST['ddn']!=null AND $_POST['sex']!=null AND $_POST['mdp']!=null){
	//include_once 'configuration.php';
	$idU = 0;
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$login = $_POST['login'];
	$ddn = $_POST['ddn'];
	$sex = $_POST['sex'];
	$mdp = hash('sha256',$_POST['mdp']);
	$user = new Utilisateur($idU,$nom,$prenom,$login,$ddn,$sex,$mdp);
	$user->creer();
	header("Location:ConnexionInscription.php?info=Compte créer avec succés");
}else{
	header("Location:ConnexionInscription.php?info=Champ(s) vide(s)");
}
?>