<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "myweb";
 
 $conn = new mysqli($servername, $username, $password, $database);
 
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

if(isset($_GET['id']))
  {
      $aa=$_GET['id'];

$deletsql="Delete from portifolio WHERE id='$aa'";
$result=mysqli_query($conn,$deletsql);
if($result)
    {
 
  	header("location:PortifolioView.php");
}

  	else{

  		die(mysqli_error($conn));
  	}

  }

?>