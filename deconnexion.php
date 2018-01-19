<?php
session_start();
if(isset($_SESSION['admin'])&& isset($_POST['decon'])){
	unset($_SESSION['admin']);
	header('location:index.php');
}

?>