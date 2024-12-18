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
    
	$title=$_POST["a_title"];
    $file_name = $_FILES['a_file']['name'];
    $file_tmp = $_FILES['a_file']['tmp_name'];
    $file_type = $_FILES['a_file']['type'];
    
    $upload_directory = "PORTS/";
    $file_path = $upload_directory . generateUniqueFilename($file_name);
    
    if(move_uploaded_file($file_tmp, $file_path)) {
        $sql = "INSERT INTO about (cv_title,cv_file, type, path) VALUES ('$title','$file_name', '$file_type', '$file_path')";
        if($conn->query($sql) === TRUE) {
            
            header("location:AboutView.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }
}

$conn->close();
?>