<?php
require_once("connexion.php");
		
		
		$pres=$_GET['pres'];
		$pres_detail=$_GET['pres_detail'];
		$val2=$_GET['val2'];
		$val1=$_GET['val1'];
		
		
	
	$sql1="select * from banque b,compte c,paiement p,monetique m where
	b.id_banque=c.id_banque and b.id_banque=p.id_banque and b.id_banque=m.id_banque and $pres_detail BETWEEN $val1 and $val2
	order by $pres_detail;";
	
	$data1=$conn->query($sql1)or die($conn->error);
	
	while($row=$data1->fetch_assoc() )
	{
	?>
		 <div class="bank_grid">
					  

						  <div >
							   <img src="<?php echo "logo/".$row['logo']; ?>" width="150"style="float: right">
								<B>Nom : </B><?php echo $row['nom'];?> <br>
								<B>Siège Social : </B><?php echo $row['adresse'];?> <br>
								<B>Téléphone :</B><?php echo $row['tel'];?><br>
								<B> Fax :</B> <?php echo $row['fax'];?><br>
						<br><br>
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

        </div>
	
						

	<?php } ;
?>
<script>

</script>