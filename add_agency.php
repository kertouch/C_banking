<?php
require_once("connexion.php");

if(isset($_POST['save']))
			{ 
			$bankId=$_POST['bank'];
			$adresse=$_POST['adresse'];
			$lat=$_POST['lat'];
			$lon=$_POST['lon'];
			$ville=$_POST['ville'];
	
			$sql = "INSERT INTO agence (id_agence, id_banque, lat, lon, adresse, DirectionGen,Ville)
			VALUES (NULL,$bankId,$lat,$lon,'$adresse',false,'$ville')";
				echo $sql;
				$result = mysqli_query($conn,$sql)or die($conn->error);
				
				
				if ($result) {
				echo 'Data entered successfully.';

				} 	 	
			}
			header('location:admin.php');
			
?>