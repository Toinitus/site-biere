<?php
session_start();
if (isset($_SESSION["connect"])) {
	$connect = $_SESSION["connect"];
}else{
	$connect = false;
}
if($connect){
	header("Location: compte.php");
	//fin du traitement
}
$erruseremail="";
$errpassword="";

if(!empty($_POST)){
	$email = $_POST["email"];
	$password = $_POST["password"];
	if (!empty($email) && !empty($password)){
		//recuperation users
		require_once 'db.php';
		$sql = "SELECT * FROM utilisateurs WHERE email = :email";
		$statement = $pdo->prepare($sql);
		$statement->execute([':email' => $email]);
		$useremail = $statement->fetch();
		
		/* verifier couple user / mdp */
		if($email){
			if (password_verify($password, $useremail["password"])){
					
					$_SESSION["connect"] = true;
					$_SESSION["id"] = $useremail["id"];
					$_SESSION["email"] = $useremail["email"];
					header("Location: http://localhost/site-biere/compte.php");
			}else{
				header("HTTP/1.0 403 Forbidden");
				echo "Email ou Mot de passe INVALIDE";
				/*  USERNAME ou MDP pas bon */
			}
		}else{
			header("HTTP/1.0 403 Forbidden");
			echo "Email ou Mot de passe INVALIDE";
			/* USERNAME ou MDP pas bon */
		}
	}else{
		if(empty($useremail)){
			$erruseremail= "class=\"danger\"";
		}
		if(empty($password)){
			$errpassword="class=\"danger\"";
		}
		
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulaire de connexion</title>
	<link rel="stylesheet" type="text/css" href="assets/css/form.css">
</head>
<body>
	<div class="wrapper">
		<section class="login-container">
			<div>
				<header>
					<h2>Connexion</h2>
				</header>
				<form action="connexion.php" method="Post">
					<input type="email" name="email" placeholder="Email"  />
					<input type="password" name="password" placeholder="Mot de passe"  />
					<button type="submit">Se connecter</button>
				</form>
			</div>
		</section>
	</div>
</body>
</html>