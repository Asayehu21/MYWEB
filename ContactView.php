<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>contact view</title>
</head>

<body>
<p><h1>List of Contact</h1></p>
<table width="90%" border="1" >
  <tbody>
    <tr>
      <td width="15%"><h3>&nbsp;&nbsp;&nbsp;Name</h3></td>
      <td width="25%"><h3>&nbsp;&nbsp;&nbsp;EMail</h3></td>
      <td width="40%"><h3>&nbsp;&nbsp;&nbsp;Message</h3></td>
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
   
    $slectq="select * from contact";
    $runq=mysqli_query($conn,$slectq);
    $data=mysqli_num_rows($runq);
    if($data>0)
    {
      while($x=mysqli_fetch_assoc($runq))
      {
        echo "
        <tr>
        <td>".$x['Name']."</td>
        <td>".$x['Email']."</td>
        <td>".$x['Message']."</td>
        <td bgcolor='red'><a href='DeleteContact.php?id=".$x['id']."'><h4>Delete</h4></a></td>
        
         </tr>
        ";
      }
    }
    ?>
    <tr><td  colspan="4" align="center"  bgcolor='cyan'><a href='Admin.php'>Back</a></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>