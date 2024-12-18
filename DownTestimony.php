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
  <title>testmony download </title>

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
	<h4>Download My Certificate</h4>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myweb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $sql = "SELECT * FROM testimony";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_path = $row['path'];
        
        if (isset($_GET['view']) && $_GET['view'] == 1) {
            // View file in browser
            header('Content-Type: ' . mime_content_type($file_path));
            readfile($file_path);
        } 
    }
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li><h3>".$row['T_title']."</h3>".$row['T_file']." <a href='?id=".$row['Id']."'><button>DOWNLOAD </button></a> <br><br> </li>";
           
        }
    } else {
        echo "No files uploaded.";
    }
    ?>
    </ul>
</body>
</html>
