<?php
require 'leconnecte.php';
echo "Bonjour {$useremail['email']} vous etes bien connecté";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Connecté</title>
</head>
<body>
	<br/><a href="purchaseOrder.php">Commande chez nous !</a><br/>
	<a href="produit.php">Les Produit</a><br/>
	<a href="?deconnect=true">déconnexion</a>
</body>
</html>