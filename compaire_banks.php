<?php
require_once("connexion.php");
		
		$bankId1=$_GET['bankId1'];
		$bankId2=$_GET['bankId2'];
	
		
	
	$sql1="select * from banque b,compte c,paiement p,monetique m where b.id_banque = $bankId1 and c.id_banque = $bankId1 and p.id_banque = $bankId1 and m.id_banque = $bankId1 ;";
	$sql2="select * from banque b,compte c,paiement p,monetique m where b.id_banque = $bankId2 and c.id_banque = $bankId2 and p.id_banque = $bankId2 and m.id_banque = $bankId2 ;";
	
	$data1=$conn->query($sql1)or die($conn->error);
	$data2=$conn->query($sql2)or die($conn->error);
	
	while($row1=$data1->fetch_assoc() and $row2=$data2->fetch_assoc() )
	{
	?>
		
	<h1>1- Gestion et tenue de compte</h1>
 
<table id="compte" class="tableData">
  <tr class="none">
    <th>GESTION ET TENUE DE COMPTE</th>
    <th>COMMISSION / FRAIS HT</th> 
  </tr>
  <tr>
    <td>Ouverture de compte et délivrance chéquier</td>
	
    <td><?php echo $row1['delivrance'];?></td>
	<td><?php echo $row2['delivrance'];?></td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte courant</td>
    <td><?php echo $row1['courant'];?></td>
	<td><?php echo $row2['courant'];?></td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte professionnel</td>
    <td><?php echo $row1['professionnel'];?></td>
	<td><?php echo $row2['professionnel'];?></td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte chèque</td>
    <td><?php echo $row1['cheque'];?></td>
	<td><?php echo $row2['cheque'];?></td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte sur livret</td>
    <td><?php echo $row1['livret'];?></td>
	<td><?php echo $row2['livret'];?></td>
    
  </tr>
  <tr>
    <td>Tenue de compte en devise</td>
    <td><?php echo $row1['devise'];?></td>
	<td><?php echo $row2['devise'];?></td>
    
  </tr>
  <tr>
    <td>Fermeture compte courant</td>
    <td><?php echo $row1['fermCourant'];?></td>
	<td><?php echo $row2['fermCourant'];?></td>
    
  </tr>
  <tr>
    <td>Fermeture compte chèque</td>
    <td><?php echo $row1['fermCheque'];?></td>
	<td><?php echo $row2['fermCheque'];?></td>
    
  </tr>
  <tr>
    <td>Fermeture compte sur livret</td>
    <td><?php echo $row1['fermLivret'];?></td>
	<td><?php echo $row2['fermLivret'];?></td>
    
  </tr>
  <tr>
    <td>Fermeture compte devise</td>
    <td><?php echo $row1['fermDevise'];?></td>
	<td><?php echo $row2['fermDevise'];?></td>
    
  </tr>
</table>

<h1>2- Opération de paiement</h1>
 
<table id="paiement" class="tableData">
  <tr class="none">
    <th>OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES</th>
    <th>COMMISSION / FRAIS HT</th> 
  </tr>
  <tr>
    <td>Versement espèces (Client agence)</td>
    <td><?php echo $row1['vers_cli'];?></td>
	<td><?php echo $row2['vers_cli'];?></td>
    
  </tr>
  <tr>
    <td>Versement espèces (Tiers)</td>
    <td><?php echo $row1['vers_tie'];?></td>
	<td><?php echo $row2['vers_tie'];?></td>
    
  </tr>
  <tr>
    <td>Frais de tenue de compte professionnel</td>
    <td><?php echo $row1['vers_dep'];?></td>
	<td><?php echo $row2['vers_dep'];?></td>
    
  </tr>
  <tr>
    <td>Versement espèces déplacé (Client autre agence)</td>
    <td><?php echo $row1['vir_mem'];?></td>
	<td><?php echo $row2['vir_mem'];?></td>
    
  </tr>
  <tr>
    <td>Virement reçu d'un compte de la même agence</td>
    
	 <td><?php echo $row1['vir_aut'];?></td>
	 <td><?php echo $row2['vir_aut'];?></td>
    
  </tr>
  <tr>
    <td>Virement reçu d'un compte d'une autre agence de la même banque</td>
    <td><?php echo $row1['vir_dev'];?></td>
	<td><?php echo $row2['vir_dev'];?></td>
    
  </tr>
  <tr>
    <td>Virement reçu d'un compte d'une autre agence de la même banque</td>
    <td><?php echo $row1['ret_esp'];?></td>
	<td><?php echo $row2['ret_esp'];?></td>
    
  </tr>
  <tr>
    <td>Retait espéces</td>
    <td><?php echo $row1['ret_gui'];?></td>
	<td><?php echo $row2['ret_gui'];?></td>
    
  </tr>
  <tr>
    <td>Retrait espéces aux guichets d'une autre agence</td>
    <td><?php echo $row1['emmi_ch'];?></td>
    <td><?php echo $row2['emmi_ch'];?></td>
  </tr>
  <tr>
    <td>Emission de chèque de banque</td>
    <td><?php echo $row1['emmi_dep'];?></td>
	<td><?php echo $row2['emmi_dep'];?></td>
    
  </tr>
  <tr>
    <td>Emission Chèque de banque déplacé</td>
    <td><?php echo $row1['annu_ban'];?></td>
	<td><?php echo $row2['annu_ban'];?></td>
    
  </tr>
  <tr>
    <td>Annulation de chèque de banque (Client)</td>
    <td><?php echo $row1['vir_com'];?></td>
	<td><?php echo $row2['vir_com'];?></td>
    
  </tr>
  <tr>
    <td>Virement de compte à compte (même agence)</td>
    <td><?php echo $row1['vir_ord'];?></td>
	<td><?php echo $row2['vir_ord'];?></td>
    
  </tr>
  
</table>

<h1>3- Monétique</h1>
 
<table id="monetique" class="tableData">
  <tr class="none">
    <th>DESIGNATION</th>
    <th>COMMISSION / FRAIS</th> 
  </tr>
   <tr class="none">
    <td><h5>CARTE C.I.B</h5></td>
     </tr>
    

  <tr>
    <td>Emission de la première carte</td>
    <td><?php echo $row1['emi_car'];?></td>
	<td><?php echo $row2['emi_car'];?></td>
    
  </tr>
  <tr>
    <td>Renouvelement</td>
    <td><?php echo $row1['ren'];?></td>
	<td><?php echo $row2['ren'];?></td>
    
  </tr>
  <tr>
    <td>Reconfection</td>
    <td><?php echo $row1['rec'];?></td>
	<td><?php echo $row2['rec'];?></td>
    
  </tr>
  <tr>
    <td>Réédition du code secret</td>
    <td><?php echo $row1['ree'];?></td>
	<td><?php echo $row2['ree'];?></td>
    
  </tr>
  <tr>
    <td>Comission de retrait Sur DAB de la banque</td>
    <td><?php echo $row1['com_dab'];?></td>
	<td><?php echo $row2['com_dab'];?></td>
    
  </tr>
  <tr>
    <td>Comission de retrait Sur DAB confrère</td>
   
	<td><?php echo $row1['com_dab_co'];?></td>
	<td><?php echo $row2['com_dab_co'];?></td>
    
  </tr>
  <tr>
    <td>Commission de paiement sur TPE/Client</td>
    <td><?php echo $row1['com_tpe_cl'];?></td>
	<td><?php echo $row2['com_tpe_cl'];?></td>
    
  </tr>
  <tr>
    <td>Commission de paiement sur TPE/Commerçant</td>
    <td><?php echo $row1['com_tpe_comm'];?></td>
	<td><?php echo $row2['com_tpe_comm'];?></td>
    
  </tr>
  
    <tr class="none"><td><h5>CARTE INTERNATIONALE</h5></td></tr>
   
 
  <tr>
    <td>Emission de la carte</td>
    <td> <?php echo $row1['em_cart_inter']?></td>
	<td> <?php echo $row2['em_cart_inter']?></td>
    
  </tr>
  <tr>
    <td>Octroi</td>
    <td><?php echo $row1['octr'];?></td>
	<td><?php echo $row2['octr'];?></td>
    
  </tr>
  <tr>
    <td>Mise en opposition</td>
    <td><?php echo $row1['mise'];?></td>
	 <td><?php echo $row2['mise'];?></td>
    
  </tr>
  <tr>
    <td>Re-confection</td>
    <td><?php echo $row1['recon'];?></td>
	<td><?php echo $row2['recon'];?></td>
	
    
  </tr>
  <tr>
    <td>Réédition du code secret</td>
    <td><?php echo $row1['ree_sec'];?></td>
	<td><?php echo $row2['ree_sec'];?></td>
    
  </tr>
  <tr>
    <td>Changement de code PIN</td>
    <td><?php echo $row1['chan_pin'];?></td>
	<td><?php echo $row2['chan_pin'];?></td>
    
  </tr>
</table>
						

	<?php } ;
?>
<script>
$(document).ready(function(){
	var td1;
	var td2;
$('.tableData tr:not(.none)').each(function() {
	
		
		 td1 = $(this).find("td:eq(1)").html();
		 td2 = $(this).find("td:eq(2)").html();
		
		if (td1 < td2){
			$(this).find("td:eq(1)").css("background-color", "#38c538b3");
			$(this).find("td:eq(2)").css("background-color", "#f006");
			
		}else{
			if(td1 > td2){
			
			$(this).find("td:eq(1)").css("background-color", "#f006");
			$(this).find("td:eq(2)").css("background-color", "#38c538b3");
			}
		}
			
		
	
		
});


});
</script>