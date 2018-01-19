<?php

require_once("connexion.php");

 session_start();
 if(isset($_POST['send']))
			{
				$_POST['pwd']= sha1($_POST['pwd']);
				
				$sql = "SELECT * from users where nom ='".$_POST['uname']."' and password ='".$_POST['pwd']."'"; 
			
				$result = mysqli_query($conn,$sql);
				
				if (mysqli_num_rows($result)>0){
					
					$_SESSION['admin'] = true;
					
					header('location:admin.php');
					
					
				}
				
				
				
			}
?>
<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<a href="index.php"><img src="image/logo.png" id="logo" ></a>
<h2 style="text-align:center;">Login Form</h2>

<form action="login.php" method="POST">
  <div class="imgcontainer">
   
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
	</br>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>
        </br>
    <input type="submit" name="send"></button>
  
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    
  </div>
</form>

</body>
</html>