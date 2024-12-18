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
    $sql = "SELECT * FROM portifolio WHERE id=$id";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_path = $row['path'];
        
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
        readfile($file_path);
    }
    
else {
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
  <title> portifolio download </title>

  <style type="text/css">
    button{
  background-color: #0fc263;
  text-decoration: dashed;
  font-size: 25px;
}
#downAbout{
  color: black;
  font-size: 25px;
  margin-left: 40px;
  margin-top: 50px;
  width: auto;
  height: auto;
 
}
li{
    list-style-type: none;
}

  </style>
</head>
<body>
<div  id="downAbout">
	<h4>Download My Projects</h4>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myweb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $sql = "SELECT * FROM portifolio";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>".$row['P_title']."<br>".$row['P_file']."<a href='?id=".$row['id']."'><button>DOWNLOAD </button></a><pre>".$row['P_description']."</li>";
           
        }
    } else {
        echo "No files uploaded.";
    }
    ?>
    </ul>
</body>
</html>
