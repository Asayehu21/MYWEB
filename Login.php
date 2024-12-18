<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "myweb";

$conn = new mysqli($servername, $username, $password, $database);

session_start();

if(isset($_POST['login']))
{
	$user=$_POST['uname'];
	$pwr=$_POST['pswd'];
	//check database
	$loging = "SELECT * FROM admin WHERE username='$user' AND password='$pwr'";
	$runq=mysqli_query($conn,$loging);
	$data=mysqli_num_rows($runq);
    if($data>0)	{
		$_SESSION['uname'] = $user;
		
	 header("location:Admin.php");
	}
	else{

		print("username or password is incorrect");
	}
}
?>