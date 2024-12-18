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

// Upload file to server
if(isset($_POST['proj_Upload'])) {
    
	$title=$_POST["proj_title"];
    $file_name = $_FILES['proj_file']['name'];
    $file_tmp = $_FILES['proj_file']['tmp_name'];
    $file_type = $_FILES['proj_file']['type'];
	$file_descrpt=$_POST["description"];
    
    $upload_directory = "PORTS/";
    $file_path = $upload_directory . generateUniqueFilename($file_name);
    
    if(move_uploaded_file($file_tmp, $file_path)) {
        $sql = "INSERT INTO portifolio (P_title,P_file, type, path,P_description) VALUES ('$title','$file_name', '$file_type', '$file_path','$file_descrpt')";
        if($conn->query($sql) === TRUE) {
            
            header("location:PortifolioView.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }
}

$conn->close();
?>