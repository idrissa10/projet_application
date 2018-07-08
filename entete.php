<!doctype html>
<html lang="fr">
<head>
	
	<meta charset="utf-8"/>
		<link rel="stylesheet" media="screen" type="text/css" href="css/bootstrap.min.css"/> 
<link rel="stylesheet" href="mystyle.css"/>

</head>
<body>


<nav>
<div class="navbar navbar-inverse navbar-fixed-top">
	<ul id="menu" class="nav navbar" >
		<li><a href="# ">Accueil</a></li>
		<li><a href="#">Clients</a>
		<ul>
			<li><a href="client.php">ListerClients</a></li>
		<li><a href="saisiclient.php">AjouterClient</a></li>
		</ul>
		</li> 
		<li><a href="#">Produits</a>
		<ul>
		<li><a href="produit.php">ListerProduits</a></li>
		<li><a href="saisiproduit.php">EnregistrerProduits</a></li>
		</ul>
		</li>  
		<li><a href="#">Commande</a>
		<ul>
		<li><a href="#">commander</a></li>
		</ul>
		</li>  
		<li><a href="#">Achat</a>
		<ul>
		<li><a href="#">nosventes</a></li>
		</ul>
		</li>  
		<li><a href="#">Statistique</a>
		<ul>
		<li><a href="#">noschiffres</a></li>
		</ul>
		</li>  
		<li><a href="#">Contact</a>
		<ul>
		<li><a href="#">77-054-01-01</a></li>
		</ul>
		</li> 
		<li><a href="logout.php">Logout[<?php 
		echo((isset($_SESSION['profil']))?($_SESSION['profil']['login']):"")?>]</a></li> 
	</ul> 
</div>
</nav> 
</body>
</html>
