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
	require_once("entete.php");?>
	<div class="container spacer col-md-6 col-xs-12 col-md-offset-3">
	<div class="panel panel-default">
	<div class="panel-heading">Inscription</div>
	<div class="panel-body">
		
		<div id="divP">
			<form method="post" action="traitementInscription.php">
				<div class="form-group">
				<label class="control-label">Nom:</label>
				<input name="nom" type="text"  class="form-control"/>
			</div>
					<div class="form-group">
				<label class="control-label">Prenom:</label>
				<input name="prenom" type="text"  class="form-control"/>
			</div>
			<div class="form-group">
				<label class="control-label">Login:</label>
				<input name="login" type="text"  class="form-control"/>
			</div>
			<div class="form-group">
				<label class="control-label">Date de Naissance:</label>
				<input name="ddn" type="text"  class="form-control"/>
			</div>
			<div class="form-group">
				<label class="control-label">Sexe:</label><br/>
				<b>Homme</b><input name="sex" type="radio"  class="form-control" value="H"/>
				<b>FEMME</b><input name="sex" type="radio"  class="form-control" value="F"/>
			</div>
			<div class="form-group">
				<label class="control-label">Mot de Passe:</label>
				<input name="mdp" type="password"  class="form-control"/>
			</div>
				<div>
				<button type="submit">
					Enregistrer</button> </div>
					</form>
	</div>
	</div>
	</div>
		</div>
		<div id="divC">
			
			<?php
			if(isset($_GET['info'])){
				$info = $_GET['info'];
				echo $info;
			}
			?>
		</div>
	</body>
</html>