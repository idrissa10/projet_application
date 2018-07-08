<?php
//require_once('login.php');
session_start();
if(isset($_SESSION['login']) AND isset($_SESSION['prenom'])){
	include_once 'traitementAffichageProduit.php';
	include_once 'classeProduit.php';
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
  <div class="panel-heading">Liste des Produits</div>  
  <div class="panel-body">
    <table class="table table-striped">
  <thead>    
  <tr>
  <th>Libelle</th><th>  Prix</th><th>Quantite</th><th></th>
  </tr>
  </thead>
					<?php
					//echo "<tr><td>Libelle</td><td>Prix</td><td>Quantite</td><td colspan='2'>Action</td></tr>";
						if(isset($_GET['idproduit'])){
							$idproduit = $_GET['idproduit'];
							$produit = Produit::findBykey($idproduit);
							if($produit->libelle!=null or $produit->prix!=null){
								echo "<tr><td>".$produit->libelle."</td><td>".$produit->prix."</td><td>".
								$produit->quantite.
								"</td><td colspan='2'><a href='modificationProduit.php?idproduit=$idproduit'><button>Modifier</button></a>
								<a href='traitementSuppressionProduit.php?idproduit=$idproduit'><button>Supprimer</button></a></td></tr>";
							}
							}elseif(isset($_GET['libelle']) or isset($_GET['prix']) or isset($_GET['quantite'])){
							$libelle = $_GET['libelle'];
							$prix = $_GET['prix'];
							$quantite = $_GET['quantite'];
							$produit = new Produit('',$libelle,$prix,$quantite);
							$produits = $produit->findByValue();
							foreach($produits as $produit){
								$idproduit = $produit->idproduit;
								$libelle = $produit->libelle;
								$prix = $produit->prix;
								$quantite = $produit->quantite;
							echo "<tr><td>".$produit->libelle."</td><td>".$produit->prix."</td><td>".
								$produit->quantite.
								"</td><td colspan='2'><a href='modificationProduit.php?idproduit=$idproduit'><button>Modifier</button></a>
								<a href='traitementSuppressionProduit.php?idproduit=$idproduit'><button>Supprimer</button></a></td></tr>";
						}
						}else{
							$produits = Produit::findAll();
							foreach($produits as $produit){
								$idproduit = $produit->idproduit;
								$libelle = $produit->libelle;
								$prix = $produit->prix;
							echo "<tr><td>".$produit->libelle."</td><td>".$produit->prix."</td><td>".
								$produit->quantite.
								"</td><td colspan='2'><a href='modificationProduit.php?idproduit=$idproduit'><button>Modifier</button></a>
								<a href='traitementSuppressionProduit.php?idproduit=$idproduit'><button>Supprimer</button></a></td></tr>";
						}
						}
					?>
			</table>
			</div>
			<div id="d2">
				<div class="container spacer col-md-6 col-xs-12 col-md-offset-3">
	<div class="panel panel-default">
	<div class="panel-heading">Rechercher</div>
	<div class="panel-body"
				<form method="post" action="traitementRechercheProduit.php">
				<div class="form-group">
				<label class="control-label">Libelle:</label>
				<input name="libelle" type="text"  class="form-control"/>
			</div>
			<div class="form-group">
				<label class="control-label">Prix:</label>
				<input name="prix" type="text"  class="form-control"/>
			</div>
			<div class="form-group">
				<label class="control-label">Quantite:</label>
				<input name="quantite" type="text"  class="form-control"/>
			</div>
			<div class="form-group">
				<label class="control-label">Identifiant:</label>
				<input name="idproduit" type="text"  class="form-control"/>
			</div>
			
			<div>
				<button type="submit">
					Chercher</button> </div>
				</form>
				</form>
			</div>
		</body>
	</html>
		<?php
}else{
	header("Location:ConnexionInscription.php?");
}

?>