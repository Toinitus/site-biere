<?php 
require_once "listeCUT.php";
?>
<?php
 		
		if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['adresse']) && isset($_GET['cp']) && isset($_GET['ville']) && isset($_GET['pays']) && isset($_GET['telephone']) && isset($_GET['mail'])){

 		echo 'Bonjour '.$_GET['nom'].' '.$_GET['prenom'].' vous habitez a '.$_GET['ville']. ' ' .$_GET['cp']. ' en ' .$_GET['pays']. ' au '.$_GET['adresse']. ' votre numéro est le '.$_GET['telephone'].' et votre mail '.$_GET['mail']. '. Nous validons votre commande  ';
 		
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Achetez nos bières</title>
	<script src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<h1>Votre commande</h1>
			<ul>
				<li><a  class="pasbeau" href="index.php">Accueil</a></li>
			</ul>
	<div class="titre">
		<h3>Formulaire d'achat</h3>
	</div>
	<div class="container">	
		<form class="form">
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
		</form>
	<section>
		<h2>Bon de commande</h2>
				<table>
				<tr class="minititre">
					<td>Nom de bières</td>
					<td>Prix HT</td>
					<td>Prix TTC</td>
				</tr>			
		<?php foreach ($beerArray as $element) { ?>
				<tr class="quantite">
					<td><h3><?php echo strtoupper($element[0]); ?></h3></td>
					<td>
						<h5>
							<?php
							echo ($element[1]);?>€
						</h5>
					</td>
					<td>						
						<h5> 
							<?php 
							echo round($element[1]*1.2,2);?>€
						</h5>
					</td>
					<td><input type="number" name="quantite" placeholder="Quantité"></td>	
				</tr>
			<?php } ?>
		</table>
		<button type="submit">Envoyer</button>
	</section>
</body>
</html>