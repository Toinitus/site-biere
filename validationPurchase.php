<?php
 		
	require_once "listeCUT.php";

	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville']) && isset($_POST['pays']) && isset($_POST['telephone']) && isset($_POST['mail'])){

		echo 'Bonjour '.$_POST['nom'].' '.$_POST['prenom'].' vous habitez a '.$_POST['ville']. ' ' .$_POST['cp']. ' en ' .$_POST['pays']. ' au '.$_POST['adresse']. ' votre numéro est le '.$_POST['telephone'].' et votre mail '.$_POST['mail']. '. Nous validons votre commande  ';
 	
		echo "<br>";
		echo "<br>";

		$i = 0; $total = 0;
		while ($i < count($beerArray)){
			$fields = 'quantite'.$i;
			if ($_POST[$fields] > 0) {			
				echo "<br>";
				$total += $_POST[$fields] * $beerArray[$i][1] * 1.20;
				echo " x".$_POST[$fields]." -- ".$beerArray[$i][0]. " -> ".($_POST[$fields] * $beerArray[$i][1] * 1.20)."€";
			}
			++$i;
		}

		echo "<br>";
		echo "<br>";

		echo "<h4>Total TTC : ".($total)."€</h4>";
 	}

?>