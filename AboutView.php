<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>about view</title>
</head>

<body>
<p><h1>List of CV</h1></p>
<table width="90%" border="1" >
  <tbody>
    <tr>
      <td width="15%"><h3>&nbsp;&nbsp;&nbsp;Title</h3></td>
      <td width="25%"><h3>&nbsp;&nbsp;&nbsp;File</h3></td>
      <td width="15%"><h3>&nbsp;&nbsp;&nbsp;Type</h3></td>
      <td width="25%"><h3>&nbsp;&nbsp;&nbsp;Path</h3></td>
      <td width="10%"><h3>&nbsp;&nbsp;&nbsp;Action</h3></td>
      
    </tr>
    <?php 
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "myweb";
   
   $conn = new mysqli($servername, $username, $password, $database);
   
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   
    $slectq="select * from about";
    $runq=mysqli_query($conn,$slectq);
    $data=mysqli_num_rows($runq);
    if($data>0)
    {
      while($x=mysqli_fetch_assoc($runq))
      {
        echo "
        <tr>
        <td>".$x['cv_title']."</td>
        <td>".$x['cv_file']."</td>
        <td>".$x['type']."</td>
        <td>".$x['path']."</td>
        <td bgcolor='red'><a href='DeleteAbout.php?Id=".$x['Id']."'><h4>Delete</h4></a></td>
       
         </tr>
        ";
      }
    }
    ?>
    <tr><td  colspan="5" align="center"  bgcolor='cyan'><a href='Admin.php'>Back</a></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>