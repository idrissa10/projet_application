<?php
if(isset($_POST['login']) AND isset($_POST['mdp'])){
if($_POST['login']!=null AND $_POST['mdp']!=null){
	include_once 'configuration.php';
	$login = $_POST['login'];
	$mdp = hash('sha1',$_POST['mdp']);
	$sql = "SELECT login, prenom, mdp from utilisateur where login='$login' and mdp='$mdp'";
	
	$resultat = mysqli_query($link, $sql);
	while($enregistrements = mysqli_fetch_assoc($resultat)){
		//if($login==$enregistrements['login'] AND $mdp==$enregistrements['mdp']){
			session_start();
			$_SESSION['login'] = $login;
			$_SESSION['prenom'] = $enregistrements['prenom'];
			mysqli_close($link);
			break;
		//}
	}
	if($_SESSION['login']){
		header("Location:accueil.php");
	}else{
		header("Location:ConnexionInscription.php?info=Login ou mot de passe incorrecte");
	}
}else{
	header("Location:ConnexionInscription.php?info=Un des champs est vide");
}
}else{
	header("Location:ConnexionInscription.php");
}
?>