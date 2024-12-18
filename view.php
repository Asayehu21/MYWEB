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
if(isset($_POST['submit'])) {
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    
    $upload_directory = "PORTS/";
    $file_path = $upload_directory . generateUniqueFilename($file_name);
    
    if(move_uploaded_file($file_tmp, $file_path)) {
        $sql = "INSERT INTO files (name, type, path) VALUES ('$file_name', '$file_type', '$file_path')";
        if($conn->query($sql) === TRUE) {
            echo "File uploaded successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }
}

// Download file from server
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM files WHERE id=$id";
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
    <title>File Upload and Download</title>
</head>
<body>


    <h2>Upload File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">Upload</button>
    </form>
    
    <h2>Download File</h2>
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
    $sql = "SELECT * FROM files";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li><a href='?id=".$row['id']."'>".$row['name']."</a></li>";
            ?>
            <a href="view.php?id=id&view=1" target="_blank"><h1>View</h1></a>
            <?php
        }
    } else {
        echo "No files uploaded.";
    }
    ?>
    </ul>

</body>
</html>
