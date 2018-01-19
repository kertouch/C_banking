<?php 
require_once("connexion.php");
/**verfication de connection**/
session_start();

$sql1="select  *  from compte ";	
$result1 = mysqli_query($conn, $sql1);
$sql1="select * from banque";
$sql="select * from banque b,compte c,paiement p,monetique m where b.id_banque=c.id_banque and b.id_banque=p.id_banque and b.id_banque=m.id_banque order by nom";
$data3=$conn->query($sql);
$data2=$conn->query($sql1);
$map_banks="select * from banque ";

$map_data=$conn->query($map_banks);


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
	
	<nav>
	<a href="index.php"><img src="image/logo.png" id="logo" ></a>
			<ul>
					  <li><a class="active" href="#home">Menu principal</a></li>
					  <li><a href="intro.php">Qui somme nous?</a></li>
					  <li><a href="comparatif.php" id="comparatif">Comparatif</a></li>
					 <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) echo "<li>
					                                                                                <a href='admin.php'>Administration</a>
																							  </li> 
																							        <form action='deconnexion.php' method='post'>
																									       <input type='hidden' name='decon'>
																										              <li>
																													       <button type='submit' name='save'>deconnexion</button>
																													  </li>
																					                </form>"?>
					  
					  <?php if(!isset($_SESSION['admin'])) echo "<li>
					                                                       <a href='login.php'>Login</a>
																	     </li>  "
			           ?>
			</ul>
	</nav>
	 
	<section>
	<!-- Slider -->

					<div id="slider">
						  <figure>
						  <img src="image/img3.jpg" >
						  <img src="image/img1.jpg" >
						  <img src="image/img4.jpg" >
						  </figure>
					</div>
			<br>
	
					

	<!--
	Contenu
	-->


	
			

<div id="contenu">
	
				

			<div class="comparatif">	
					<div class="trie">
					<h1 >Trie</h1>
					<select  class="select_pres" >
									<option	hidden>Choisir la prestation</option>
									
									<option value="1">Compte</option>
									<option value="2">Paiement</option>
									<option	value="3">Monetique</option>
									
							</select>
					 <select  id='select_compte' style="display:none" class="select_detail">
					 <!-- Compte <option selected hidden >Choisir </option>; -->
										
										<option value='delivrance'>Ouverture de compte et délivrance chéquier</option>
										<option value='courant'>Frais de tenue de compte courant</option>
										<option value='professionnel'>Frais de tenue de compte professionnel</option>
										<option value='cheque'>Frais de tenue de compte chèque</option>
										<option value='livret'>Frais de tenue de compte sur livre</option>
										<option value='devise'>Tenue de compte en devise</option>
										<option value='fermCourant'>Fermeture compte courant</option>
										<option value='fermCheque'>Fermeture compte chèque</option>
										<option value='fermLivret'>Fermeture compte sur livret</option>
										<option value='fermDevise'>Fermeture compte devise</option>
										
						</select>
										<!-- Paiment 	<option selected hidden >Choisir </option>-->
					 <select  id='select_paiement' style="display:none" class='select_detail'>			
										
										<option value='vers_cli'>Versement espèces (Client agence)</option>
										<option value='vers_tie'>Versement espèces (Tiers)</option>
										<option value='vers_dep'>Frais de tenue de compte professionnel</option>
										<option value='vir_mem'>
Versement espèces déplacé (Client autre agence)</option>
										<option value='vir_aut'>Virement reçu d'un compte de la même agence</option>
										<option value='vir_dev'>Virement reçu d'un compte d'une autre agence de la même banque</option>
										<option value='ret_esp'>
Virement reçu d'un compte d'une autre agence de la même banque</option>
										<option value='ret_gui'>Retait espéces</option>
										<option value='emmi_ch'>Retrait espéces aux guichets d'une autre agence</option>
										<option value='emmi_dep'>Emission de chèque de banque	</option>
										<option value='annu_ban'>Emission de chèque de banque deplace	</option>
										<option value='vir_com'>Annulation de chèque de banque (Client)</option>
										<option value='vir_ord'>Virement de compte à compte (même agence)</option>
										
			</select>
										<!-- Monetique <option selected hidden >Choisir </option> -->
									 <select  id='select_monetique' style="display:none" class="select_detail">
										
										<option value='emi_car'>CARTE C.I.B: Emission de la première carte</option>
										<option value='ren'>CARTE C.I.B: Renouvelement</option>
										<option value='rec'>CARTE C.I.B: Reconfection</option>
										<option value='ree'>CARTE C.I.B: Réédition du code secret</option>
										<option value='com_dab'>CARTE C.I.B: Comission de retrait Sur DAB de la banque</option>
										<option value='com_dab_co'>CARTE C.I.B: Comission de retrait Sur DAB confrère</option>
										<option value='com_tpe_cl'>CARTE C.I.B: Commission de paiement sur TPE/Client</option>
										<option value='com_tpe_comm'>CARTE C.I.B: Commission de paiement sur TPE/Commerçant</option>
										<option value='em_cart_inter'>Carte Internationale: Emission de la première carte</option>
										<option value='octr'>Carte Internationale: Octroi </option>
										<option value='mise'>Carte Internationale: Mise en opposition</option>
										<option value='recon'>Carte Internationale: Re-confection</option>
										<option value='ree_sec'>Carte Internationale: Réédition du code secret</option>
										<option value='chan_pin'>Carte Internationale: Changement de code PIN</option>
							</select>
					
					
					
					</div>
					<div class="filtre">
					
								<h1>Filtre</h1>
								
								<select  class="select_pres1" >
									<option	hidden>Choisir la prestation</option>
									
									<option value="1">Compte</option>
									<option value="2">Paiement</option>
									<option	value="3">Monetique</option>
									
							</select>
								<select  id='select_compte1' style="display:none" class="select_detail1">
					 <!-- Compte -->
										<option selected hidden >Choisir </option>;
										<option value='delivrance'>Ouverture de compte et délivrance chéquier</option>
										<option value='courant'>Frais de tenue de compte courant</option>
										<option value='professionnel'>Frais de tenue de compte professionnel</option>
										<option value='cheque'>Frais de tenue de compte chèque</option>
										<option value='livret'>Frais de tenue de compte sur livre</option>
										<option value='devise'>Tenue de compte en devise</option>
										<option value='fermCourant'>Fermeture compte courant</option>
										<option value='fermCheque'>Fermeture compte chèque</option>
										<option value='fermLivret'>Fermeture compte sur livret</option>
										<option value='fermDevise'>Fermeture compte devise</option>
										
						</select>
										<!-- Paiment  -->
					 <select  id='select_paiement1' style="display:none" class='select_detail1'>			
										<option selected hidden >Choisir </option>;
										<option value='vers_cli'>Versement espèces (Client agence)</option>
										<option value='vers_tie'>Versement espèces (Tiers)</option>
										<option value='vers_dep'>Frais de tenue de compte professionnel</option>
										<option value='vir_mem'>
Versement espèces déplacé (Client autre agence)</option>
										<option value='vir_aut'>Virement reçu d'un compte de la même agence</option>
										<option value='vir_dev'>Virement reçu d'un compte d'une autre agence de la même banque</option>
										<option value='ret_esp'>
Virement reçu d'un compte d'une autre agence de la même banque</option>
										<option value='ret_gui'>Retait espéces</option>
										<option value='emmi_ch'>Retrait espéces aux guichets d'une autre agence</option>
										<option value='emmi_dep'>Emission de chèque de banque	</option>
										<option value='annu_ban'>Emission de chèque de banque deplace	</option>
										<option value='vir_com'>Annulation de chèque de banque (Client)</option>
										<option value='vir_ord'>Virement de compte à compte (même agence)</option>
										
			</select>
										<!-- Monetique -->
									 <select  id='select_monetique1' style="display:none" class="select_detail1">
										<option selected hidden >Choisir </option>;
										<option value='emi_car'>CARTE C.I.B: Emission de la première carte</option>
										<option value='ren'>CARTE C.I.B: Renouvelement</option>
										<option value='rec'>CARTE C.I.B: Reconfection</option>
										<option value='ree'>CARTE C.I.B: Réédition du code secret</option>
										<option value='com_dab'>CARTE C.I.B: Comission de retrait Sur DAB de la banque</option>
										<option value='com_dab_co'>CARTE C.I.B: Comission de retrait Sur DAB confrère</option>
										<option value='com_tpe_cl'>CARTE C.I.B: Commission de paiement sur TPE/Client</option>
										<option value='com_tpe_comm'>CARTE C.I.B: Commission de paiement sur TPE/Commerçant</option>
										<option value='em_cart_inter'>Carte Internationale: Emission de la première carte</option>
										<option value='octr'>Carte Internationale: Octroi </option>
										<option value='mise'>Carte Internationale: Mise en opposition</option>
										<option value='recon'>Carte Internationale: Re-confection</option>
										<option value='ree_sec'>Carte Internationale: Réédition du code secret</option>
										<option value='chan_pin'>Carte Internationale: Changement de code PIN</option>
							</select>
							<div>
								<label>Valeur 1 </label>
								<input type="text" id="val1">
							</div>	
							<div>
								<label>Valeur 2 </label>
								<input type="text"id="val2">
								<div>
								<button id="btn_filtre">Filtrer</button>
								</div>
							</div>
					</div >
					<div class="filtre">
					<div id="recherch_ville">
						
									<label>Ville</label>
											<input type="text" id="ville">
									<button id="btn_recherch">Recherch</button>
							
					</div>
					</div>
					
					<div class="filtre">
					<button id="btn_direction">Itineraire</button>
					</div>
					
			</div>

			<div class="info_banque">
			
			<div>
			<?php  while ($row=$data3->fetch_assoc()) {?>       
					   <div class="bank_grid">
					  

						  <div >
							   <img src="<?php echo "logo/".$row['logo']; ?>" width="150"style="float: right">
								<B>Nom : </B><?php echo $row['nom'];?> <br>
								<B>Siège Social : </B><?php echo $row['adresse'];?> <br>
								<B>Téléphone :</B><?php echo $row['tel'];?><br>
								<B> Fax :</B> <?php echo $row['fax'];?><br>
						<br><br>
						
						<style>
	#<?php echo "bank_map".$row['id_banque']; ?>{
	 height: 300px;
        width: 750px;	
		
		
	}
	</style>
	<div id="<?php echo "bank_map".$row['id_banque']; ?>" ></div>
	
	
    <details>
	<!--
	Detaills caches
	-->

	<summary> Détails </summary>

<h1>1- Gestion et tenue de compte</h1>
 
<table id="compte">
  <tr>
    <th>GESTION ET TENUE DE COMPTE</th>
    <th>COMMISSION / FRAIS HT</th> 
  </tr>
  <tr>
    <td>Ouverture de compte et délivrance chéquier</td>
    <td><?php echo $row['delivrance'];?></td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte courant</td>
    <td><?php echo $row['courant'];?></td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte professionnel</td>
    <td><?php echo $row['professionnel'];?></td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte chèque</td>
    <td><?php echo $row['cheque'];?></td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte sur livret</td>
    <td><?php echo $row['livret'];?></td>
    
  </tr>
  <tr>
    <td>Tenue de compte en devise</td>
    <td><?php echo $row['devise'];?></td>
    
  </tr>
  <tr>
    <td>Fermeture compte courant</td>
    <td><?php echo $row['fermCourant'];?></td>
    
  </tr>
  <tr>
    <td>Fermeture compte chèque</td>
    <td><?php echo $row['fermCheque'];?></td>
    
  </tr>
  <tr>
    <td>Fermeture compte sur livret</td>
    <td><?php echo $row['fermLivret'];?></td>
    
  </tr>
  <tr>
    <td>Fermeture compte devise</td>
    <td><?php echo $row['fermDevise'];?></td>
    
  </tr>
</table>

<h1>2- Opération de paiement</h1>
 
<table id="paiement">
  <tr>
    <th>OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES</th>
    <th>COMMISSION / FRAIS HT</th> 
  </tr>
  <tr>
    <td>Versement espèces (Client agence)</td>
    <td><?php echo $row['vers_cli'];?></td>
    
  </tr>
  <tr>
    <td>Versement espèces (Tiers)</td>
    <td><?php echo $row['vers_tie'];?></td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte professionnel</td>
    <td><?php echo $row['vers_dep'];?></td>
    
  </tr>
  <tr>
    <td>Versement espèces déplacé (Client autre agence)</td>
    <td><?php echo $row['vir_mem'];?></td>
    
  </tr>
  <tr>
    <td>Virement reçu d'un compte de la même agence</td>
    <td><?php echo $row['vir_aut'];?></td>
    
  </tr>
  <tr>
    <td>Virement reçu d'un compte d'une autre agence de la même banque</td>
    <td><?php echo $row['vir_dev'];?></td>
    
  </tr>
  <tr>
    <td>Virement reçu d'un compte d'une autre agence de la même banque</td>
    <td><?php echo $row['ret_esp'];?></td>
    
  </tr>
  <tr>
    <td>Retait espéces</td>
    <td><?php echo $row['ret_gui'];?></td>
    
  </tr>
  <tr>
    <td>Retrait espéces aux guichets d'une autre agence</td>
    <td><?php echo $row['emmi_ch'];?></td>
    
  </tr>
  <tr>
    <td>Emission de chèque de banque</td>
    <td><?php echo $row['emmi_dep'];?></td>
    
  </tr>
  <tr>
    <td>Emission Chèque de banque déplacé</td>
    <td><?php echo $row['annu_ban'];?></td>
    
  </tr>
  <tr>
    <td>Annulation de chèque de banque (Client)</td>
    <td><?php echo $row['vir_com'];?></td>
    
  </tr>
  <tr>
    <td>Virement de compte à compte (même agence)</td>
    <td><?php echo $row['vir_ord'];?></td>
    
  </tr>
  
</table>

<h1>3- Monétique</h1>
 
<table id="monetique">
  <tr>
    <th>DESIGNATION</th>
    <th>COMMISSION / FRAIS</th> 
  </tr>
  <tr>
    <td><h5>CARTE C.I.B</h5></td>
    
    
  </tr>
  <tr>
    <td>Emission de la première carte</td>
    <td><?php echo $row['emi_car'];?></td>
    
  </tr>
  <tr>
    <td>Renouvelement</td>
    <td><?php echo $row['ren'];?></td>
    
  </tr>
  <tr>
    <td>Reconfection</td>
    <td><?php echo $row['rec'];?></td>
    
  </tr>
  <tr>
    <td>Réédition du code secret</td>
    <td><?php echo $row['ree'];?></td>
    
  </tr>
  <tr>
    <td>Comission de retrait Sur DAB de la banque</td>
    <td><?php echo $row['com_dab'];?></td>
    
  </tr>
  <tr>
    <td>Comission de retrait Sur DAB confrère</td>
    <td><?php echo $row['com_dab_co'];?></td>
    
  </tr>
  <tr>
    <td>Commission de paiement sur TPE/Client</td>
    <td><?php echo $row['com_tpe_cl'];?></td>
    
  </tr>
  <tr>
    <td>Commission de paiement sur TPE/Commerçant</td>
    <td><?php echo $row['com_tpe_comm'];?></td>
    
  </tr>
  <tr>
    <td><h5>CARTE INTERNATIONALE</h5></td>
    
  </tr>
  <tr>
    <td>Emission de la carte</td>
    <td> <?php echo $row['em_cart_inter']?></td>
    
  </tr>
  <tr>
    <td>Octroi</td>
    <td><?php echo $row['octr'];?></td>
    
  </tr>
  <tr>
    <td>Mise en opposition</td>
    <td><?php echo $row['mise'];?></td>
    
  </tr>
  <tr>
    <td>Re-confection</td>
    <td><?php echo $row['recon'];?></td>
    
  </tr>
  <tr>
    <td>Réédition du code secret</td>
    <td><?php echo $row['ree_sec'];?></td>
    
  </tr>
  <tr>
    <td>Changement de code PIN</td>
    <td><?php echo $row['chan_pin'];?></td>
    
  </tr>
</table>
	</details>

            
            
          </div>

        </div><?php } ?>
      </div>
    </div>
  </div>
  </div>
			
	        </div>

	

	
	</section>
	
	
	
	
	
  
<br>
		<div class="lien">
		           <a href="#"> Principal</a> &nbsp;&nbsp;|
                   <a href="#"> Compartif </a>&nbsp;&nbsp;|
                   <a href="#"> Qui somme nous </a>
		</div>


   
</footer>

</body>

<script>
/*
.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
		var valSup;
		var valInf;
		if($('#val1').val() > $('val2').val()){
			valSup=$('#val1').val();
			valInf=$('val2').val();
		}else{
			valSup=$('#val2').val();
			valInf=$('val1').val();
		}
        var max = parseInt( valSup, 10 );
        var min = parseInt( valInf, 10 );
        var age = parseFloat( data[3] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    var table = $('#').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
} );
*/

function initMap() {
	
			  <?php  while ($row_map=$map_data->fetch_assoc()) {?> 
			 
			  var <?php echo "position".$row_map['id_banque']; ?> = {lat: <?php echo $row_map['lat'];  ?>, lng: <?php echo $row_map['lon'];  ?>};
			
			var <?php echo "bank_map".$row_map['id_banque']; ?> = new google.maps.Map(document.getElementById("<?php echo "bank_map".$row_map['id_banque']; ?>"), {
			  zoom: 16,
			  center: <?php echo "position".$row_map['id_banque'];			  ?>
			});
			<?php  $map_query="select * from agence a where id_banque= $row_map[id_banque]";
					$map=$conn->query($map_query);
			?>
			
			<?php  while ($row_map_agency=$map->fetch_assoc()) {?>
			
			 var <?php echo "position_mark".$row_map_agency['id_agence']; ?> = {lat: <?php echo $row_map_agency['lat'];  ?>, lng: <?php echo $row_map_agency['lon'];  ?>};
		 var <?php echo "position_mark".$row_map_agency['id_agence']; ?> = new google.maps.Marker({
			  position: <?php echo "position_mark".$row_map_agency['id_agence']; ?>,
			  map: <?php echo "bank_map".$row_map['id_banque']; ?>
			});
			
			
			 <?php } ?>
			  <?php } ?>
		  }


		  
		  
			

$(document).ready(function() {
	
	$(".select_pres").on('change',function(){
		if($(".select_pres").val() ==1){
        $("#select_monetique").hide();
		$("#select_paiement").hide();
		$("#select_compte").show();
		}else{
			if($(".select_pres").val() ==2){
				$("#select_monetique").hide();
			$("#select_compte").hide();
			$("#select_paiement").show();
				
			}else if($(".select_pres").val() ==3){
				$("#select_paiement").hide();
	        	$("#select_compte").hide();
		       $("#select_monetique").show();
				
			}
		}
		
    });
	$(".select_pres1").on('change',function(){
		if($(".select_pres1").val() ==1){
        $("#select_monetique1").hide();
		$("#select_paiement1").hide();
		$("#select_compte1").show();
		}else{
			if($(".select_pres1").val() ==2){
				$("#select_monetique1").hide();
			$("#select_compte1").hide();
			$("#select_paiement1").show();
				
			}else if($(".select_pres1").val() ==3){
				$("#select_paiement1").hide();
	        	$("#select_compte1").hide();
		       $("#select_monetique1").show();
				
			}
		}
		
    });
	
	
	$('.select_detail').on('change',function(){
		var pres=$('.select_pres').val();
		var pres_detail=$('.select_detail').val();
		
		$.get('tri.php',{pres:pres,pres_detail:pres_detail},function(response){
		$(".info_banque").html(response); 
              //console.log(response);
			  
			 });
	
	});
	
			
			$('#btn_filtre').click(function(){
		var pres=$('.select_pres1').val();
		var pres_detail=$('.select_detail1').val();
		var val1 =$('#val1').val();
		var val2 =$('#val2').val();
		
		$.get('filtre.php',{pres:pres,pres_detail:pres_detail,val2:val2,val1:val1},function(response){
		$(".info_banque").html(response); 
              //console.log(response);
			  
			 });
	
	});
	 
	 
	 $('#btn_recherch').click(function(){
		var ville=$('#ville').val();
		$(".info_banque div").remove();
		$.get('recherch_ville.php',{ville:ville},function(response){
		$(".info_banque").html(response); 
             // console.log(response);
			  
			 });
	
	});
	$('#btn_direction').click(function(){
		
		$.get('direction.php',function(response){
		$(".info_banque").html(response); 
            // console.log(response);
			  
			 });
	
	});
	
	
    
} );


</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2g9QJ5HmTuASHOVATW4dlvY-N9KuiZ7c&callback=initMap">
    </script>
</html>