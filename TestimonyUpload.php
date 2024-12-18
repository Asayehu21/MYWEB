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
if(isset($_POST['upload'])) {
    
	$title=$_POST["t_title"];
    $file_name = $_FILES['t_file']['name'];
    $file_tmp = $_FILES['t_file']['tmp_name'];
    $file_type = $_FILES['t_file']['type'];
    
    $upload_directory = "PORTS/";
    $file_path = $upload_directory . generateUniqueFilename($file_name);
    
    if(move_uploaded_file($file_tmp, $file_path)) {
        $sql = "INSERT INTO testimony (T_title,T_file, type, path) VALUES ('$title','$file_name', '$file_type', '$file_path')";
        if($conn->query($sql) === TRUE) {
            
            header("location:TestimonyView.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }
}

$conn->close();
?>