<?php include('constants.php');

  if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
  	header('location:http://localhost/SideHustle/Authentication_System/login.php');
  }

 

 ?>