<?php 
require_once("connexion.php");
	 
	 
			$logo="logo.jpg";
			$sql_banque =  mysqli_query($conn,"
												INSERT INTO banque (nom,adresse,logo,tel,fax)
												VALUES ('".$_POST["nom"]."','".$_POST["siege"]."','".$logo."','".$_POST["tel"]."','".$_POST["fax"]."');
												");
			
				
			
?>
