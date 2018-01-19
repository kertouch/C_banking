<?php 
require_once("connexion.php");
/**verfication de connection**/
session_start();
/** Insertion   **/
	if(isset($_POST['save']))
			{ 
		
		$logo="logo.jpg";
			$sql = "INSERT INTO banque (nom,adresse,logo,tel,fax)
				VALUES ('".$_POST["nom"]."','".$_POST["siege"]."','".$logo."','".$_POST["tel"]."','".$_POST["fax"]."')";
				
				$result = mysqli_query($conn,$sql);
				
				
				if ($result) {
				echo "Data entered successfully.";

				} 	 	
			}
			
			/** Supression   **/
			
		$sql_remove= "SELECT * FROM banque ";
		$result_bank = mysqli_query($conn,$sql_remove);
		$result_bank2= mysqli_query($conn,$sql_remove);
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
  <meta name="description" content="C_banking">
  <meta name="keywords" content="Comparaison banque">
  <meta name="author" content="NASRI kARIM">
  <link href="style.css" rel="stylesheet" type="text/css"/>
  <script src="script.js" ></script>
  <script src="jquery.min.js" ></script>

</script>
  
  <title> C_banking </title>
</head>
<body>
	<!--
	navigation principal 
	-->
	<nav>
	<a href="index.php"><img src="image/logo.png" id="logo" ></a>
			<ul>
					  <li><a href="index.php">Menu principal</a></li>
					  <li><a href="intro.php">Qui somme nous?</a></li>
					  <li><a href="comparatif.php" id="comparatif">Comparatif</a></li>
					  <li><a  class="active" href="#administration">Administration</a></li>
					  <form action='deconnexion.php' method='post'>
																									       <input type='hidden' name='decon'>
																										              <li>
																													       <button type='submit' name='save'>deconnexion</button>
																													  </li>
					    </form>"
			</ul>
	</nav>
	
	<section id="contenu">
	<div class="comparatif">
			<ul>
				  <li><a  id="add_bank_btn">Ajouter/supprime Banque</a></li>
				  <li><a id="add_pres_btn">Ajouter /modifier Agence</a></li>
				  <li><a id="alter_btn">Modifier banque/prestation</a></li>
				  
			</ul>
	
</div>

			<div class="info_banque">
			<!-- Formulaire d'ajout de banque-->
				<div id="add_form_div">
				<!-- 	<form   id="add_form" method="post" name="formulaire" >
					<h1> Ajouter une banque</h1>
						<label > Nom de la banque </label><br/>
						<input type="text" name="nom"><br/>

						<label >Adresse</label><br/>
						<input type="text" name="siege"><br/>

						<label >Tel</label><br/>
						<input type="text" name="tel"><br/>
						
						<label >Fax</label><br/>
						<input type="text" name="fax"><br/>
						
						<label >Latitude</label><br/>
						<input type="text" name="lat"><br/>
						
						<label >Longitude</label><br/>
						<input type="text" name="lon"><br/>
						
						
				
						<button type="submit" value="insert">Ajouter</button>
					</form>
					
					-->
					<h1> Ajouter une banque</h1>
					<div class="input_forms">
					<form action="upload_img.php" method="post" enctype="multipart/form-data">
							
						<label > Nom de la banque </label><br/>
						<input type="text" name="nom"><br/>

						<label >Adresse</label><br/>
						<input type="text" name="siege"><br/>

						<label >Tel</label><br/>
						<input type="text" name="tel"><br/>
						
						<label >Fax</label><br/>
						<input type="text" name="fax"><br/>
						
						<label >Latitude</label><br/>
						<input type="text" name="lat"><br/>
						
						<label >Longitude</label><br/>
						<input type="text" name="lon"><br/>
					
							Choisir un logo:
							<input type="file" name="fileToUpload" id="fileToUpload">
							<input type="submit" value="Envoyer" name="submit">
					</form>
					</div>
				<h1> Supprimer une banque</h1>
				<div class="input_forms">
					<form method="post" id="remove_form" action="remove.php">
					
						<select value="bank" name="bank">
						<Label>Choisir la banque </label>
						
						<?php  while ($row=$result_bank->fetch_assoc()) {?>  
							<option value="<?php echo $row['id_banque']?>" name="<?php echo $row['id_banque']?>"> <?php echo $row['nom']?> </option>
							<?php }?>
				
						</select>
				  <button type="submit" name="save">Supprimer</button>
					</form>
				</div>
				</div>
					
<!-- Formulaire de modification -->
				
				<div id="pres_form" style="display:none;" class="input_forms">
				
				<h1>Ajouter agence</h1>
					<form  action="add_agency" method="post" name="formulaire"  >
							
							<Label>Choisir la banque: </label>
				<select value="bank" name="bank" >
							
							
							<?php  while ($row=$result_bank2->fetch_assoc()) {?>  
								<option value="<?php echo $row['id_banque']?>" name="<?php echo $row['id_banque']?>"> <?php echo $row['nom']?> </option>
								<?php }?>
				
				</select>
				
						</br>
						
						<label > Ville </label><br/>
						<input type="text" name="ville"><br/>
						</br>
						<label > Adresse de l'agence </label><br/>
						<input type="text" name="adresse"><br/>

						</br>

						<label >Tel</label><br/>
						<input type="text" name="tel"><br/>
						</br>
						<label >Fax</label><br/>
						<input type="text" name="fax"><br/>

						<label >Latitude</label><br/>
						<input type="text" name="lat"><br/>
						<label >Longitude</label><br/>
						<input type="text" name="lon"><br/>
						<button type="submit" value="insert" name="save" id="save_agency">save</button>
					</form>
				</div>
			<!-- Formulaire d'ajout de prestation-->
			<div id="alter_form" style="display:none;" class="input_forms">
			<h1>Modifier banque/prestation</h1>
			<!--<form   method="GET" name="formulaire" >-->
							<select id="alter_form_select"  class="select">
								
							</select>
							<!-- le block pour la modification des banque-->
							<div id="alter_banks_container">
							
							</div>
							<!-- Selection de type de prestation-->
							<div>
							<select id="alter_form_select_pres" class="select" >
									<option	hidden>Choisir la prestation</option>
									
									<option value="1">Compte</option>
									<option value="2">Paiement</option>
									<option	value="3">Monetique</option>
									
							</select>
							<div>
							
							<div id="display_prestation_banks">

							</div>
							<!--</form> Selection de type frais par prestation-->
							
				
			</div>
	
	</section>
	 
	
	<!--
	<form  method="post" name="formulaire" action="" >

			<label > Nom de la banque </label><br/>
			<input type="text" name="nom"><br/>

			<label >Adresse</label><br/>
			<input type="text" name="siege"><br/>

			<label >Tel</label><br/>
			<input type="text" name="tel"><br/>
			<label >Fax</label><br/>
			<input type="text" name="fax"><br/>

			<button type="submit" name="save">save</button>

			</form>
   
	
	-->
<footer>
<br>
		<div class="lien">
		           <a href="#"> Principal</a> &nbsp;&nbsp;|
                   <a href="#"> Compartif </a>&nbsp;&nbsp;|
                   <a href="#"> Qui somme nous </a>
		</div>
		<button id="x"></button>


		
</footer>

<script>
 jQuery(document).ready(function ($) {

    $("#add_form").submit(function (event) {
                event.preventDefault();
              
       var formData = new FormData($(this)[0]);
            $.ajax({
                url: 'add.php',
                type: 'POST',
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
               success: function (returndata) 
                {
                    //show return answer
                    alert("Banque ajouter avec succes");
                },
                error: function(){
                alert("error in ajax form submission");
                                    }
        });
        return false;
    });
	/*
	
	$("#remove_form").submit(function (event) {
               event.preventDefault();
              
       var formData2 = new FormData($(this)[0]);
            $.ajax({
                url: 'remove.php',
                type: 'POST',
                data: formData2,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
               success: function (returndata) 
                {
                    //show return answer
                    alert("Banque supprime avec succes");
                },
                error: function(){
                alert("error in ajax form submission");
                                    }
        });
        return false;
    });*/
	
	
});

$(document).ready(function(){
    $("#add_bank_btn").click(function(){
        $("#pres_form").hide();
		$("#alter_form").hide();
		$("#add_form_div").show();
		
    });
	 $("#add_pres_btn").click(function(){
        $("#pres_form").show();
		$("#alter_form").hide();
		$("#add_form_div").hide();
		
    });
	 $("#alter_btn").click(function(){
        $("#pres_form").hide();
		$("#alter_form").show();
		$("#add_form_div").hide();
		
		
		
		 $.ajax({    //create an ajax request to display_banks.php
        type: "GET",
        url: "display_banks.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#alter_form_select").html(response); 
            //alert(response);
        }

    });
		
    });
	
	$('#alter_form_select_pres').on('change', function() {
		/* $.ajax({    //create an ajax request to display_prestation_banks.php
		 
        type: "GET",
        url: "display_prestation_banks.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#display_prestation_banks").html(response); 
            //alert(response);
        }
		
		
	});*/
	
	// Envoi de la requete pour reception des prestation
	     var prestation = $('#alter_form_select_pres').val();
		var bankId = $('#alter_form_select').val();
		var pres_val = "0";
		var pres_select="0";
	
		$.get("display_prestation_banks.php", {bankId : bankId ,prestation:prestation,pres_val:pres_val,pres_select:pres_select}, function(response){                    
            $("#display_prestation_banks").html(response); 
              //console.log(response);
			  
			  
			  
			  
        })
	});
	
	
	$('#alter_form_select').on('change', function() {
		//recevoire les information de banque
		var bankId2 = $('#alter_form_select').val();
		var alter=0;
		$.get("alter_banks.php", {bankId2 : bankId2,alter:alter}, function(response){                    
            $("#alter_banks_container").html(response); 
              //console.log(response);
			  
			  
			  
			  
        });
		
		
		
		
	 
	// Envoi de la requete pour reception des prestation
	if( $('#alter_form_select_pres:selected')){
	    var prestation = $('#alter_form_select_pres').val();
		var bankId = $('#alter_form_select').val();
		pres_val = "0";
		pres_select="0";
		
		$.get("display_prestation_banks.php", {bankId : bankId ,prestation:prestation,pres_val:pres_val,pres_select:pres_select}, function(response){                    
            $("#display_prestation_banks").html(response); 
              //console.log(response);
			  
			  
			  
			  
        });
	}
		
	});
	
	//modifier la valeur du propriete dans une prestation
	
	
	
    
});
</script>

</body>
</html>