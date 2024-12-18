<?php
session_start();

include_once 'connection.php';

if($_SESSION['uname']==''){
	header("location: Login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
  ul{
  	list-style: none;
  	margin-left: 200px;
  	
  	padding: 30px;
  	background: light;
  	color: blue;

  }

ul li a{
	
	text-decoration: none;
	width: 200px;
	height: 400px;
	font-size: 40px;

    }
    ul li a:hover{

	color: green;
	text-decoration: none;
	
	font-size: 40px;

    }
	</style>
</head>

<body>
	<ul>
<li><a href="portifolioUpload.html">Portifolio</li><br>

<li><a href="testimonyUpload.html">Testimony</li><br>
<li><a href="aboutUpload.html">About</li><br>
	<li><a href="ContactView.php">Contact</li><br>
	<li><a href="logout.php">Logout</li><br>

</ul>
</body>
</html>