<?php
//require_once('login.php');
session_start();
if(isset($_SESSION['login']) AND isset($_SESSION['prenom'])){
	include_once 'configuration.php';
	?>
<html>
	<head>
		<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
<style type="text/css">

</style>
	</head>
	<body>
	<require_once("entete .php");?>
	<div class="container spacer col-md-6 col-xs-12 col-md-offset-3">
	<div class="panel panel-default"
	<div class="panel-heading">Modification du produit produits</div>
	<div class="panel-body">
	<?php 
	$idclient = $_GET['idproduit'];
	$client = new classeProduit($idclient,'','');
	$client = $client->findBykey($idclient);
	//print_r($client);
	?>
		<form method="post" action="traitementModificationProduit.php">
<fieldset>
				<legend align="center">Modification</legend>
					<pre>
						Libelle<input type="text" name="libelle" value="<?php echo $_GET['libelle'] ?>"/>
						Prix<input type="text" name="prix" value="<?php echo $_GET['prix'] ?>"/>
						Quantite<input type="text" name="quantite" value="<?php echo $_GET['quantite'] ?>"/>
						<input type="hidden" name="idproduit" value="<?php echo $_GET['idproduit'] ?>"/>
						<input type="submit" value="Modifier">
					</pre>
			</fieldset>
		
		</form>
	</body>
</html>
		<?php
}else{
	header("Location:ConnexionInscription.php?");
}
?>