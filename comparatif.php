<?php 
require_once("connexion.php");


/**verfication de connection**/
session_start();

$sql1="select  *  from compte ";
$result1 = mysqli_query($conn, $sql1);

$sql="select * from banque ";
$data=$conn->query($sql);
$data2=$conn->query($sql);
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
					  <li><a  href="index.php">Menu principal</a></li>
					  <li><a href="intro.php">Qui somme nous?</a></li>
					  <li><a class="active" href="#comparatif" id="comparatif">Comparatif</a></li>
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
				<div id="slider">
						  <figure>
						  <img src="image/img3.jpg" >
						  <img src="image/img1.jpg" >
						  <img src="image/img4.jpg" >
						  </figure>
				</div>
					
					
				<div class="comparatif">	
				
					<div class="trie">
							<select id="display_banks_comp1" class="select">
							<option selected hidden>Choisir la banque</option>
							<?php	
							
								 while ($row=$data->fetch_assoc())
								{   
								   echo "<option value='$row[id_banque]' > $row[nom]</option>";
								}
									?>
							</select>
							<select id="display_banks_comp2" class="select">
									<option selected hidden>Choisir la banque</option>
									<?php	
									
										 while ($row=$data2->fetch_assoc())
										{   
										   echo "<option value='$row[id_banque]' > $row[nom]</option>";
										}
											?>
									</select>
									
									<button type="submit" id="btn_cmp"> comparer</button>
					</div>
					
					
			</div>
			<div class="info_banque">
			</div>
	</section>
	
	
<footer>
<br>
		<div class="lien">
		           <a href="#"> Principal</a> &nbsp;&nbsp;|
                   <a href="#"> Compartif </a>&nbsp;&nbsp;|
                   <a href="#"> Qui somme nous </a>
		</div>


   
</footer>

</body>
<script>
$(document).ready(function(){
	
	$('#btn_cmp').click(function(){
		var bankId1=$('#display_banks_comp1').val();
		var bankId2=$('#display_banks_comp2').val();
		
		$.get('compaire_banks.php',{bankId1:bankId1,bankId2:bankId2},function(response){
		$(".info_banque").html(response); 
              //console.log(response);
			  
			 });
	
	});
		
	});
	
	
	
	
		
	
	
	


	
</script>
</html>