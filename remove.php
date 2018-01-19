<?php
require_once("connexion.php");
if (isset($_POST['bank'])){
	
			$id= $_POST['bank'];
			$logo="logo.jpg";
			$sql= "DELETE From banque where id_banque = $id;";
			$result = mysqli_query($conn,$sql);
			if (mysqli_query($conn, $sql)) {
				echo "Data entered successfully.";
				mysqli_close();
			}
			header('location:admin.php');
		   
}
?>