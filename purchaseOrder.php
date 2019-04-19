<?php 
require_once "listeCUT.php";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Achetez nos bières</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Votre commande</h1>
	<ul>
		<li><a  class="pasbeau" href="index.php">Accueil</a></li>
		<li><a href="inscription.php">Inscription</a></li>
		<li><a href="connexion.php">Connexion</a></li>
	</ul>
	<div class="titre">
		<h3>Formulaire d'achat</h3>
	</div>
	<div class="container">	
		<form class="form" action="validationPurchase.php" method="post">
			<div class="formu">
				<label for="prenom">Votre prénom :</label>
					<input type="text" name="prenom" required>
					<br></br>
				<label for="nom">Votre Nom :</label>
					<input type="text" name="nom" required>
					<br></br>
				<label for="adresse">Votre Adresse :</label>
					<input type="text" name="adresse" required>
					<br></br>
				<label for="cp">Votre Code Postal :</label>	
					<input type="text" name="cp" required>
					<br></br>
				<label for="ville">Votre Ville :</label>	
					<input type="text" name="ville" required>
					<br></br>
				<label for="pays">Votre Pays :</label>
					<input type="text" name="pays" required>
					<br></br>
				<label for="telephone">Votre Telephone :</label>	
					<input type="text" name="telephone" placeholder="+33" required>
					<br></br>
				<label for="mail">Votre Mail :</label>	
					<input type="text" name="mail" required>
				<br></br>
			</div>		
		<br><br>
			<section>
				<h2>Bon de commande</h2>
						<table>
						<tr class="minititre">
							<td>Nom de bières</td>
							<td>Prix HT</td>
							<td>Prix TTC</td>
						</tr>			
				<?php
				$compteur = 0;
				foreach ($beerArray as $element) { 

				?>
					<tr class="quantite">
						<td><h3><?php echo strtoupper($element[0]); ?></h3></td>
						<td>
							<h5>
								<span id="horstaxe<?= $compteur ?>"><?php echo ($element[1]);?></span>€
							</h5>
						</td>
						<td>						
							<h5>
								<span id="toutestaxe<?= $compteur ?>"><?php echo round($element[1]*1.2,2); ?></span>€
							</h5>
						</td>
						<td>
							<input type="number" id="quantite<?= $compteur ?>" name="quantite<?= $compteur ?>" placeholder="Quantité" min='0' value="0" onchange="changePrice(<?php echo $compteur . ",". $element[1] .",". round($element[1]*1.2,2); ?>)">
						</td>	
					</tr>
				<?php
					$compteur++;
				} 

				?>
				</table>
				<button type="submit">Envoyer</button>
			</section>
		</form>
	</div>
	<script src="script.js"></script>
</body>
</html>

