<?php
session_start();
if(isset($_GET["deconnect"]) && $_GET["deconnect"]){
	unset($_SESSION["connect"]);
} 
if (isset($_SESSION["connect"])) {
	$connect = $_SESSION["connect"];
}else{
	$connect = false;
}
if (empty($connect)){ 
	header("location: /site-biere/compte.php");	
}
if (isset($_SESSION["useremail"])) {
	$useremail = $_SESSION["useremail"];
}else{
	$useremail = "";
}
