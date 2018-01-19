<?php
require_once("connexion.php");


		$pres =$_GET['prestation'];
		$bankId=$_GET['bankId'];
		$pres_val=$_GET['pres_val'];
        $pres_select=$_GET['pres_select'];
		if($pres_val <> 0){
			if ($pres ==1){
				$sql_alter="UPDATE compte
							SET $pres_select= $pres_val
							WHERE id_banque = $bankId;";
				
			}else{
				if($pres==2){
					$sql_alter="UPDATE paiement
							SET $pres_select= $pres_val
							WHERE id_banque = $bankId;";
					
				}else if($pres==3){
					
					$sql_alter="UPDATE monetique
							SET $pres_select= $pres_val
							WHERE id_banque = $bankId;";
					
				}
				
			}
			$conn->query($sql_alter)or die($conn->error);
		};
	
	$sql="select * from banque b,compte c,paiement p,monetique m where b.id_banque = $bankId and c.id_banque = $bankId and p.id_banque = $bankId and m.id_banque = $bankId ;";
	$data=$conn->query($sql)or die($conn->error);
	while($row=$data->fetch_assoc())
	{
	if( $pres == 1){
		echo "
	<h1>1- Gestion et tenue de compte</h1>
 
<table id='compte'>
  <tr>
    <th>GESTION ET TENUE DE COMPTE</th>
    <th>COMMISSION / FRAIS HT</th> 
  </tr>
  <tr>
    <td>Ouverture de compte et délivrance chéquier</td>
    <td> $row[delivrance]</td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte courant</td>
    <td> $row[courant]</td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte professionnel</td>
    <td> $row[professionnel]</td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte chèque</td>
    <td> $row[cheque]</td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte sur livret</td>
    <td>  $row[livret]</td>
    
  </tr>
  <tr>
    <td>Tenue de compte en devise</td>
    <td> $row[devise]</td>
    
  </tr>
  <tr>
    <td>Fermeture compte courant</td>
    <td> $row[fermCourant]</td>
    
  </tr>
  <tr>
    <td>Fermeture compte chèque</td>
    <td> $row[fermCheque]</td>
    
  </tr>
  <tr>
    <td>Fermeture compte sur livret</td>
    <td> $row[fermLivret]</td>
    
  </tr>
  <tr>
    <td>Fermeture compte devise</td>
    <td>$row[fermDevise]</td>
    
  </tr>
</table>
 <!-- Compte-->
 <div class='prestation_div'>
                          <select class='alter_form_select_pres_details' class='select'>
										<option selected hidden>Choisir </option>;
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
							<div>
							Entre la nouvelle valeur<br/>
							<input type='text' name='choix' class='pres_detail_val'> 
						     <button type='button' class='alter_pres_select_save' >Modifier</button>
							 </div>
							</div>
	";}else{
		if( $pres == 2){
		echo"
<h1>2- Opération de paiement</h1>
 
<table id='paiement'>
  <tr>
    <th>OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES</th>
    <th>COMMISSION / FRAIS HT</th> 
  </tr>
  <tr>
    <td>Versement espèces (Client agence)</td>
    <td> $row[vers_cli]</td>
    
  </tr>
  <tr>
    <td>Versement espèces (Tiers)</td>
    <td> $row[vers_tie]</td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte professionnel</td>
    <td>$row[vers_dep]</td>
    
  </tr>
  <tr>
    <td>Versement espèces déplacé (Client autre agence)</td>
    <td>$row[vir_mem]</td>
    
  </tr>
  <tr>
    <td>Virement reçu d un compte de la même agence</td>
    <td> $row[vir_aut]</td>
    
  </tr>
  <tr>
    <td>Virement reçu d un compte d une autre agence de la même banque</td>
    <td> $row[vir_dev]</td>
    
  </tr>
  <tr>
    <td>Virement reçu d un compte d une autre agence de la même banque</td>
    <td>  $row[ret_esp] </td>
    
  </tr>
  <tr>
    <td>Retait espéces</td>
    <td> $row[ret_gui]</td>
    
  </tr>
  <tr>
    <td>Retrait espéces aux guichets d une autre agence</td>
    <td> $row[emmi_ch]</td>
    
  </tr>
  <tr>
    <td>Emission de chèque de banque</td>
    <td>$row[emmi_dep]</td>
    
  </tr>
  <tr>
    <td>Emission Chèque de banque déplacé</td>
    <td>  $row[annu_ban]</td>
    
  </tr>
  <tr>
    <td>Annulation de chèque de banque (Client)</td>
    <td> $row[vir_com]</td>
    
  </tr>
  <tr>
    <td>Virement de compte à compte (même agence)</td>
    <td> $row[vir_ord]</td>
    
  </tr>
  
</table>

	<!-- Paiement-->
	<div class='prestation_div'>
		<select class='alter_form_select_pres_details' class='select'>
										<option selected hidden>Choisir </option>
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
							<div>
							Entre la nouvelle valeur<br/>
								<input type='text' name='choix' class='pres_detail_val'> 
						     <button type='button' class='alter_pres_select_save'>Modifier</button>
							 </div>
							 </div>
	";}else if ($pres==3){
		
		echo"
<h1>3- Monétique</h1>
 
<table id='monetique'>
  <tr>
    <th>DESIGNATION</th>
    <th>COMMISSION / FRAIS</th> 
  </tr>
  <tr>
    <td><h5>CARTE C.I.B</h5></td>
    
    
  </tr>
  <tr>
    <td>Emission de la première carte</td>
    <td>$row[emi_car]</td>
    
  </tr>
  <tr>
    <td>Renouvelement</td>
    <td>$row[ren]</td>
    
  </tr>
  <tr>
    <td>Reconfection</td>
    <td>$row[rec]</td>
    
  </tr>
  <tr>
    <td>Réédition du code secret</td>
    <td>  $row[ree]</td>
    
  </tr>
  <tr>
    <td>Comission de retrait Sur DAB de la banque</td>
    <td>  $row[com_dab]</td>
    
  </tr>
  <tr>
    <td>Comission de retrait Sur DAB confrère</td>
    <td>  $row[com_dab_co]</td>
    
  </tr>
  <tr>
    <td>Commission de paiement sur TPE/Client</td>
    <td>  $row[com_tpe_cl]</td>
    
  </tr>
  <tr>
    <td>Commission de paiement sur TPE/Commerçant</td>
    <td>  $row[com_tpe_comm]</td>
    
  </tr>
  <tr>
    <td><h5>CARTE INTERNATIONALE</h5></td>
    
  </tr>
  <tr>
    <td>Emission de la carte</td>
    <td>  $row[em_cart_inter]</td>
    
  </tr>
  <tr>
    <td>Octroi</td>
    <td>  $row[octr]</td>
    
  </tr>
  <tr>
    <td>Mise en opposition</td>
    <td>  $row[mise]</td>
    
  </tr>
  <tr>
    <td>Re-confection</td>
    <td>  $row[recon]</td>
    
  </tr>
  <tr>
    <td>Réédition du code secret</td>
    <td>  $row[ree_sec]</td>
    
  </tr>
  <tr>
    <td>Changement de code PIN</td>
    <td>  $row[chan_pin]</td>
    
  </tr>
</table>


<!-- Monetique -->
	<div class='prestation_div'>
							<select class='alter_form_select_pres_details' class='select'>
									 <option selected hidden>Choisir </option>
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
								Entre la nouvelle valeur<br/>
								<input type='text' name='choix' class='pres_detail_val'> 
						        <button type='button' class='alter_pres_select_save'>Modifier</button>
								</div>
							</div>
	";}
	}
	}
?>
<script>
$(".alter_pres_select_save").click(function(){
	
		var prestation = $('#alter_form_select_pres').val();
		var bankId = $('#alter_form_select').val();
		var pres_val = $('.pres_detail_val').val();
		var pres_select=$('.alter_form_select_pres_details').val();
		
		
		
		$.get("display_prestation_banks.php", {bankId : bankId ,prestation:prestation ,pres_val:pres_val,pres_select}, function(response){                    
            $("#display_prestation_banks").html(response); 
              //console.log(response);
			  
			  
			  
			  
			  
        });
		
	});
</script>