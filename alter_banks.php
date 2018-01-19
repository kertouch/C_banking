<?php 
require_once("connexion.php");


	$bankId=$_GET['bankId2'];
	
	$alter =$_GET['alter'];
	
	if($alter <> 0){
		$bank_detail_val=$_GET['bank_detail_val'];
		$bank_info=$_GET['bank_info'];
		
		$sql_alter="        UPDATE banque
							SET $bank_info = '$bank_detail_val'
							WHERE id_banque = $bankId;";
			
	    $conn->query($sql_alter)or die($conn->error);
		
	}
	$sql="SELECT * FROM banque WHERE id_banque =$bankId";
	$data=$conn->query($sql)or die($conn->error);
	while($row=$data->fetch_assoc())
	{
?>
	<div>
					  

						 
							   <img src="<?php echo "logo/".$row['logo']; ?>" width="150"style="float: right">
								<B>Nom : </B><?php echo $row['nom'];?> <br>
								<B>Siège Social : </B><?php echo $row['adresse'];?> <br>
								<B>Téléphone :</B><?php echo $row['tel'];?><br>
								<B> Fax :</B> <?php echo $row['fax'];?><br>
						<br><br>
						
 </div>

	<label>Choisir l'information a modifier</label>
	<select id="select_alter_banks">
			<option value="nom">Nom </option>
			<option value="adresse">Siège Social  </option>
			<option value="tel">Tel </option>
			<option value="fax">Fax </option>
	</select>
	<div style="margin: 20 px; padding:20px">
	<label>Entrez la nouvelle valeur</label>
	<input type='text' name='choix' id='bank_detail_val'  
						 <button  type='button' id="alter_bank_select">Modifier</button>
						 
						 	<?php }?>
							
	</div>
<script>						 
$("#alter_bank_select").click(function(){
	
		var bankId2 = $('#alter_form_select').val();
		var bank_info=$('#select_alter_banks').val();
		var bank_detail_val=$('#bank_detail_val').val();
		
		var alter =1;
		$.get("alter_banks.php", {bankId2:bankId2,bank_info:bank_info,bank_detail_val:bank_detail_val,alter:alter}, function(response){                    
            $("#alter_banks_container").html(response); 
              
			  
			  
			  
			  
			  
        });
		
	});
</script>
	
	
	