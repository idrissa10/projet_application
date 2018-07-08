<?php
//require_once('login.php');
session_start();
if(isset($_SESSION['login']) AND isset($_SESSION['prenom'])){
	require_once 'classeClient.php';
	?>
		<html>
		<head>
			<head>
  <title></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
		</head>
		<body>
		<header>
		</header>
			<?php
  require_once("entete.php");?>
  <div class="col-md-12 col-xs-12 spacer mytable">
  <div class="panel panel-info spacer"> 
  <div class="panel-heading">Liste des Clients</div>  
  <div class="panel-body">
    <table class="table table-striped">
  <thead>    
  <tr>
  <th>Nom</th><th>  Prenom</th><th>Action</th><th></th>
  </tr>
  </thead>
					<?php
					//echo "<tr><td>Identifiant</td><td>Nom</td><a><td>Prenom</td></a><td colspan='2'>Action</td></tr>";
						if(isset($_GET['idclient'])){
							$idclient = $_GET['idclient'];
							$client = Client::findBykey($idclient);
							if($client->nom!=null or $client->prenom!=null){
								echo "<tr><td>".$client->nom."</td><td>".
								$client->prenom.
								"</td><td colspan='2'><a href='modificationClient.php?idclient=$idclient'><button>Modifier</button></a>
								<a href='traitementSuppressionClient.php?idclient=$idclient'><button>Supprimer</button></a></td></tr>";
							}
							}elseif(isset($_GET['nom']) or isset($_GET['prenom'])){
							$nom = $_GET['nom'];
							$prenom = $_GET['prenom'];
							$client = new Client('',$nom,$prenom);
							$clients = $client->findByValue();
							foreach($clients as $client){
								$idclient = $client->idclient;
								$nom = $client->nom;
								$prenom = $client->prenom;
							echo "<tr><td>".$nom."</td><td>".
							$prenom.
							"</td><td colspan='2'><a href='modificationClient.php?idclient=$idclient'><button>Modifier</button></a>
							<a href='traitementSuppressionClient.php?idclient=$idclient'><button>Supprimer</button></a></td></tr>";
						}
						}else{
							$clients = Client::findAll();
							foreach($clients as $client){
								$idclient = $client->idclient;
								$nom = $client->nom;
								$prenom = $client->prenom;
							echo "<tr><td>".$nom."</td><td>".
							$prenom.
							"</td><td colspan='2'><a href='modificationClient.php?idclient=$idclient'><button>Modifier</button></a>
							<a href='traitementSuppressionClient.php?idclient=$idclient'><button>Supprimer</button></a></td></tr>";
						}
						}
						
						
					?>
			</table>
			</div>
			<div id="d2">
				<div class="container spacer col-md-6 col-xs-12 col-md-offset-3">
	<div class="panel panel-default">
	<div class="panel-heading">Rechercher</div>
	<div class="panel-body">
				<form method="post" action="traitementRechercheClient.php">
					<div class="form-group">
				<label class="control-label">NOm:</label>
				<input name="nom" type="text"  class="form-control"/>
			</div>
			<div class="form-group">
				<label class="control-label">Prenom:</label>
				<input name="prenom" type="text"  class="form-control"/>
			</div>
			<div class="form-group">
				<label class="control-label">Identifiant:</label>
				<input name="idclient" type="text"  class="form-control"/>
			</div>
			
			<div>
				<button type="submit">
					Chercher</button> </div>
				</form>
			</div>
		</body>
	</html>
		<?php
}else{
	header("Location:ConnexionInscription.php?");
}

?>