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

// Function to generate unique filename
function generateUniqueFilename($originalFilename) {
    $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
    $basename = pathinfo($originalFilename, PATHINFO_FILENAME);
    return $basename . '_' . uniqid() . '.' . $extension;
}

// Download file from server
if(isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $sql = "SELECT * FROM about WHERE Id=$id";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_path = $row['path'];
        
        if (isset($_GET['view']) && $_GET['view'] == 1) {
            // View file in browser
            header('Content-Type: ' . mime_content_type($file_path));
            readfile($file_path);
        } else {
            // Download file
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
            readfile($file_path);
        }
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
    <title>View and Download CV File</title>
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
#Vbtn{
    background-color: #73f7f9;
}
  </style>
</head>
<body>
<div  id="downAbout">
	<h4>Download and View My CV File</h4>
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
            echo "<li>".$row['cv_title']."<br>".$row['cv_file']."<a href='?Id=".$row['Id']."'><button>DOWNLOAD </button></a></li>";
            ?>
            <a href="DownloadAbout.php?Id=Id&view=1" target="_blank"><button id="Vbtn">View</button></a>
            <?php
        }
    } else {
        echo "No files uploaded.";
    }
    ?>
    </ul>
</div>
</body>
</html>
