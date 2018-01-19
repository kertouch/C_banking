<?php 
require_once("connexion.php");

$result_bank=mysqli_query($conn,'select * from banque');
	 
	  echo " <option selected hidden>Choisir la banque</option>";
 while ($row=$result_bank->fetch_assoc())
{   
   echo "<option value='$row[id_banque]' > $row[nom]</option>";
}
?>