<?php
//require_once('login.php');
session_start();
if(isset($_SESSION['login']) AND isset($_SESSION['prenom'])){
	include_once 'traitementAffichageProduit.php';
	?>
		<html>
		<head>
			<title>Accueil</title>
		</head>
		<body>
		<h2>Bonjour <?php echo $_SESSION['prenom']?></h2>
		</body>
	</html>
		<?php
}else{
	header("Location:ConnexionInscription.php?");
}

?>