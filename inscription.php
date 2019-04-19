<?php
if(!empty($_POST)){
	$prenom = ($_POST["prenom"]);
	$nom = ($_POST["nom"]);
	$adresse = ($_POST["adresse"]);
	$codePostal = $_POST["codePostal"];
	$ville = ($_POST["ville"]);
	$pays = ($_POST["pays"]);
	$email = $_POST["email"];
	$password = $_POST["password"];
	$passwordVerif = $_POST["password_verif"];
	$phone = $_POST["phone"];
	if (!empty($prenom) && !empty($nom) && !empty($adresse) && !empty($codePostal) && !empty($ville) && !empty($pays)&& !empty($email)&& !empty($password) && !empty($passwordVerif) && !empty($phone)){
		require_once 'db.php';
		$sql = "SELECT * FROM utilisateurs WHERE email = :email";
		$statement = $pdo->prepare($sql);
		$statement->execute([":email" => $email]);
		$usermail = $statement->fetch();                
		if(!$usermail){
			if(strlen($password) <= 10 && strlen($password) >= 5){
				if($password === $passwordVerif){
					$password = password_hash($password, PASSWORD_BCRYPT);
					require_once 'db.php';
					$sql = "INSERT INTO utilisateurs (prenom, nom, adresse, codePostal, ville, pays, email, password, phone) VALUES (:prenom, :nom, :adresse, :codePostal, :ville, :pays, :email, :password, :phone)";
                $statement = $pdo->prepare($sql);
                $result = $statement->execute([
                    ":prenom" => $prenom,
                    ":nom" => $nom,
                    ":adresse" => $adresse,
                    ":codePostal" => $codePostal,
                    ":ville" => $ville,
                    ":pays" => $pays,
                    ":email" => $email,
                    ":password" => $password,
                    ":phone" => $phone
                ]);
					/*if($result){
						$_SESSION["connect"] = true;
						$_SESSION["username"] = $username;
						header("Location: http://localhost/site-biere/inscription.php");
					}else{
						die("erreur enregistrement en bdd");
						// TODO : signaler erreur
					}*/
				}else{
					die("mdp différents");
					// TODO : signaler que mdp non identiques
				}
			}else{
				// TODO : signaler que mdp est pas d'un bon format
				die("mdp pas bon format");
			}
		}else{
			die("utilisateur existe");
			// TODO : signaler que username existe
		}
	
	}else{
		// TODO : signaler les champs vides
	}
}








?>




<!DOCTYPE html>
<html>
<head>
	<title>Formulaire d'inscription</title>
</head>
<body>
<section class="form">
    <form method="POST" action="">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" required>

        <label for="nom">Nom de famille</label>
        <input type="text" name="nom" required>

        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" required>

        <label for="codePostal">Code Postal</label>
        <input type="text" name="codePostal" required>

        <label for="ville">Ville</label>
        <input type="text" name="ville" required>

        <label for="pays">Pays</label>
        <input type="text" name="pays" required>

        <label for="email">Adresse email</label>
        <input type="email" name="email" required>

        <label for="phone">Telephone</label>
        <input type="text" name="phone" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>

        <label for="password">Verification mot de passe</label>
        <input type="password" name="password_verif" required>

        <input class="button" type="submit" name="submit_c" value="S'inscrire">
    </form>
</body>
</html>