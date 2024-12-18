<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "myweb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Download file from server
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM about WHERE id=$id";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_path = $row['path'];
        
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
        readfile($file_path);
    } else {
        echo "File not found.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>aboutDownload </title>

  <style type="text/css">

    button{
  background-color: #0fc263;
  text-decoration: dashed;
  font-size: 35px;
  
  
}
#downAbout{
  
  color: black;
  font-size: 45px;
  margin-left: 40px;
  margin-top: 50px;
 
}
ul{
    list-style-type: none;
}

  </style>
</head>
<body>
<div  id="downAbout">
	<h4>Download My CV</h4>

    <ul>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myweb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $sql = "SELECT * FROM about";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>".$row['cv_title']."<br>".$row['cv_file']." <a href='?id=".$row['Id']."'> <button>DOWNLOAD </button></a></li>";
        }
    } else {
        echo "No files uploaded.";
    }
    ?>
    </ul>
    <a href="DownAbout.php?id=id&view=1" target="_blank"><h1>View</h1></a>
</div>
</body>
</html>
