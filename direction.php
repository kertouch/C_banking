<?php 
require_once("connexion.php");
$sql="";

$sql1="select * from banque b,agence mr where mr.id_banque=b.id_banque" ;
$data1=$conn->query($sql1);
$sql2="select * from banque b,agence mr where mr.id_banque=b.id_banque" ;
$data2=$conn->query($sql2);
?>




    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 600px;
        width: 850px;
      }
      /* Optional: Makes the sample page fill the window. */
     
       #floating-panel {
      
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  
    <div id="floating-panel">
    <b>Emplacement</b>
	<input id="start" type="text" >
   <br>
    <b>Agence:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
    <select id="end">
	
     <?php  while ($row1=$data1->fetch_assoc()) { ?>
      <option value="<?php echo $row1['adresse'];?>"><?php echo $row1['nom']." Siege Social : ".$row1['adresse'];?> </option>
      <?php 
	  $sql6="select * from agence  where id_banque='".$row1['id_banque']."'";
			$data6=$conn->query($sql6); ?>
	  <?php   while ($row6=$data6->fetch_assoc()) {?> 
   <option value="<?php echo $row6['adresse'];?>"><?php echo $row1['nom']." Siege Social : ".$row6['adresse'];?> </option>
   
  <?php }} ?>
  
  
    </select>
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 36.753768, lng: 3.058756}
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('direction non trouvé ' + status);
          }
        });
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2g9QJ5HmTuASHOVATW4dlvY-N9KuiZ7c&callback=initMap">
    </script>