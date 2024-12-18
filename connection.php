<?php 


$severern="localhost";
$username="root";
$password="";
$database="myweb";


$conn=mysqli_connect($severern,$username,$password,$database);

if(!$conn){

die("not connected");  

}


else{

	echo "";
}


?>