<?php

include_once "connection.php";


  if(isset($_POST['C_submit'])){

    $fn=$_POST['C_name'];
  	$en=$_POST['C_email'];
  	
  	$cm=$_POST['C_message'];
  	
  	$sql="insert into  contact(Name,Email,Message) values('$fn','$en','$cm')";
  	$result=mysqli_query($conn,$sql);
  	if($result){

  	echo "message is sent";

  	}

  	else{

  		die(mysqli_error($conn));
  	}
  	

  }
?>