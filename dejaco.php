<?php
	/* deja connecter  */
	if (isset($_SESSION['email'])) {
		header("Location: connexion.php");
		exit;
	}