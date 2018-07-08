<?php
//require_once('login.php');
session_start();
if(isset($_SESSION['login']) AND isset($_SESSION['prenom'])){
	?>
    <html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>

<style type="text/css">

</style>
</head>

<body>
	<?php
	require_once("entete.php");
	//require_once("securite.php");?>
	<div class="container spacer col-md-6 col-xs-12 col-md-offset-3">
	<div class="panel panel-default">
	<div class="panel-heading">Saisie des clients</div>
	<div class="panel-body">
		<form method="post" action="traitementClient.php">
			<div class="form-group">
				<label class="control-label">Identifiant:</label>
				<input name="idclient" type="hidden" id="idclient" class="form-control"/>
			</div>
			<div class="form-group">
				<label class="control-label">Nom:</label>
				<input name="nom" type="text"  class="form-control"/>
			</div>
			<div class="form-group">
				<label class="control-label">Prenom:</label>
				<input name="prenom" type="text"  class="form-control"/>
			</div>
			<div>
				<button type="submit">
					Enregistrer</button> </div>
					</form>
					</body>
	</html>
	<?php
}else{
	header("Location:ConnexionInscription.php");
}