<?php 
require_once("connexion.php");

/**verfication de connection**/
session_start();

$sql1="select  *  from compte ";
$result1 = mysqli_query($conn, $sql1);

$sql="select * from banque b,compte c,paiement p,monetique m where b.id_banque=c.id_banque and b.id_banque=p.id_banque and b.id_banque=m.id_banque order by nom";
$data=$conn->query($sql);
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
					  <li><a class="active" href="#Qui somme nous?">Qui somme nous?</a></li>
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
					  
					  <?php if (!isset($_SESSION['admin'])) echo "<li>
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
	</section>
	<div id="pres">
			<h1>Qui somme nous?</h1>
			<p>
			 Nous somme une startup fondee en 2016 par NASRI Karim
			</p>
			<div>
	
	
<footer>
<br>
		<div class="lien">
		           <a href="#"> Principal</a> &nbsp;&nbsp;|
                   <a href="#"> Compartif </a>&nbsp;&nbsp;|
                   <a href="#"> Qui somme nous </a>
		</div>


   
</footer>

</body>
</html>