<?php
//require_once('login.php');
session_start();
if(isset($_SESSION['login']) AND isset($_SESSION['prenom'])){
	require_once 'classeClient.php';
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
		<php require_once("entete .php");?>
	<div class="container spacer col-md-6 col-xs-12 col-md-offset-3">
	<div class="panel panel-default"
	<div class="panel-heading">Saisie des clients</div>
	<div class="panel-body">
	<?php 
	$idclient = $_GET['idclient'];
	$client = new Client($idclient,'','');
	$client = $client->findBykey($idclient);
	//print_r($client);
	?>
		<form method="post" action="traitementModificationClient.php">
	
				<legend align="center">Modification du Client</legend>
						<div class="form-group">
						<label class="control-label">Nom:</label>
						<input type="text" name="nom" value="<?php echo $client->nom ?>"/></div>
						<div class="form-group">
						<label class="control-label">Prenom:</label><input type="text" name="prenom" value="<?php echo $client->prenom ?>"/></div>
						<div class="form-group">
						<input type="hidden" name="idclient" value="<?php echo $client->idclient ?>"/></div>
						<div>
				<button type="submit">
					Modifier</button> </div>
		
		</form>
	</body>
</html>
		<?php
}else{
	header("Location:ConnexionInscription.php?");
}
?>