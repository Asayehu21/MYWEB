<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "myweb";
 
 $conn = new mysqli($servername, $username, $password, $database);
 
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

if(isset($_GET['Id']))
  {
      $aa=$_GET['Id'];

$deletsql="Delete from about WHERE Id='$aa'";
$result=mysqli_query($conn,$deletsql);
if($result)
    {
 
  	header("location:AboutView.php");
}

  	
  	else{

  		die(mysqli_error($conn));
  	}

  }

?>