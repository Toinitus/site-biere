<?php
require 'leconnecte.php';
require 'db.php';
echo "Bonjour ". $_SESSION['email']." vous etes bien connecté";

		//Debut changement premier formulaire coordonnée !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	$sql="SELECT `prenom`, `nom`, `adresse`, `codePostal`, `ville`, `pays`, `phone` FROM `utilisateurs` WHERE `id`= ?";
		$statement = $pdo->prepare($sql);
		$statement->execute([$_SESSION["id"]]);
		$result = $statement->fetch();
		
			// quand j'envoie le formulaire je récupere $_POST
		if (!empty($_POST["coordo1"])){
			$prenom = ($_POST["prenom"]);
			$nom = ($_POST["nom"]);
			$adresse = ($_POST["adresse"]);
			$codePostal = $_POST["codePostal"];
			$ville = ($_POST["ville"]);
			$pays = ($_POST["pays"]);
			$phone = $_POST["phone"];
			if (!empty($prenom && $nom && $adresse && $codePostal && $ville && $pays && $phone)) {
				require_once 'db.php';

			$sql ="UPDATE `utilisateurs` SET `prenom`= ?,`nom`= ?,`adresse`= ?,`codePostal`= ?,`ville`= ?,`pays`= ?,`phone`= ? WHERE id = ?";
				$statement = $pdo->prepare($sql);
                $result = $statement->execute([$prenom, $nom, $adresse, $codePostal, $ville, $pays, $phone, $_SESSION["id"]]); 
                echo " </br> Changement reussi";
			}else{
				echo " </br> Changement failed";
			}


		}
		// Fin changement premier formulaire coordonnée !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		// Debut second formulaire mot de passe !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			// quand j'envoie le formulaire je récupere $_POST
		if (!empty($_POST["passe2"])){
			$password = ($_POST["password"]);
			$passwordVerif = ($_POST["password_verif"]);
			if (!empty($password && $passwordVerif)) {
				if(strlen($password) <= 10 && strlen($password) >= 5){
					if($password === $passwordVerif){
						$passwordhash = password_hash($password, PASSWORD_BCRYPT);
						$sql1 ="UPDATE `utilisateurs` SET `password`= ? WHERE id = ?";
						$statement = $pdo->prepare($sql1);
		                $result1 = $statement->execute([$passwordhash, $_SESSION["id"]]);
					}	
				}	
 
                echo " </br> Changement reussi";
			}else{
				echo " </br> Changement failed";
			}


		}	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Connecté</title>
</head>
<body>
	<br/><a href="purchaseOrder.php">Commande chez nous !</a><br/>
	<a href="produit.php">Les Produit</a><br/>
	<a href="deconnexion.php">déconnexion</a>
		<h2>MODIFICATION Coordonées</h2>
	    <form method="POST" action="" name="coordo">
	        <label for="prenom">Prénom</label>
	        <input type="text" name="prenom" value=<?php echo $result["prenom"];?>>

	        <label for="nom">Nom de famille</label>
	        <input type="text" name="nom" value=<?php echo  $result ["nom"] ?>>

	        <label for="adresse">Adresse</label>
	        <input type="text" name="adresse" value="<?php echo  $result ["adresse"] ?>">

	        <label for="codePostal">Code Postal</label>
	        <input type="text" name="codePostal" value=<?php echo  $result ["codePostal"] ?>>

	        <label for="ville">Ville</label>
	        <input type="text" name="ville" value=<?php echo  $result ["ville"] ?>>

	        <label for="pays">Pays</label>
	        <input type="text" name="pays" value=<?php echo  $result ["pays"] ?>>

	        <label for="phone">Telephone</label>
	        <input type="text" name="phone" value=<?php echo  $result ["phone"] ?>>

	        <button type="submit" name="coordo1" value="coordo1" for="coordo">Change les coordonées</button>
        </form>
        <h2>MODIFICATION Mot De Passe</h2>
        <form method="POST" action="" name="passe">
		    <label for="password">Mot de passe</label>
		    <input type="password" name="password">

		    <label for="password">Verification mot de passe</label>
		    <input type="password" name="password_verif">

        <button type="submit" name="passe2" value="passe2" for="passe">Modification passe</button>
        </form>
    
</body>
</html>