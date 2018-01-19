<?php
require_once("connexion.php");


		$ville=$_GET['ville'];
		
		
	
	$sql1="select DISTINCT(id_agence),a.lat,a.lon from banque, agence a where ville = '$ville' ";
	
	$map_data=$conn->query($sql1)or die($conn->error);
	

	?>
		 <div class="bank_grid">
					  
					<style>
					#recherche_map{
						width:700px;
						height:300px;
					}
					</style>
					
						
						
						<div id="recherche_map" >
					
						</div>
		</div>
		
		
		<script>
		
		function initMap(){
			
			var recherch = {lat: 36.5  , lng: 3.09 };
			var recherch_mape = new google.maps.Map(document.getElementById("recherche_map"),
			{
			  zoom: 5,
			  center: recherch
			}
		);
			  <?php  while ($row_map=$map_data->fetch_assoc()) {?> 
			 
			
			 var <?php echo "position".$row_map['id_agence']; ?> = {lat: <?php echo $row_map['lat'];  ?>, lng: <?php echo $row_map['lon'];  ?>};
			 var <?php echo "position_mark".$row_map['id_agence']; ?> = new google.maps.Marker(
			 {
			  position: <?php echo "position".$row_map['id_agence']; ?>,
			  map: recherch_mape
			  });
			
			
			 <?php } 
			 
			
			 ?>
			 
			  
		  }
			
		</script>
		<h1> Recherche sur  la ville <?php echo  $ville ?> Effectuer avec success  </h1>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2g9QJ5HmTuASHOVATW4dlvY-N9KuiZ7c&callback=initMap">
    </script>