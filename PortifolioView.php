<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>portifolio view</title>
</head>

<body>
<p><h1>List of Project</h1></p>
<table width="95%" border="1" >
  <tbody>
    <tr>
      <td width="10%"><h3>&nbsp;&nbsp;&nbsp;Title</h3></td>
      <td width="10%"><h3>&nbsp;&nbsp;&nbsp;File</h3></td>
      <td width="10%"><h3>&nbsp;&nbsp;&nbsp;Type</h3></td>
      <td width="20%"><h3>&nbsp;&nbsp;&nbsp;Path</h3></td>
      <td width="35%"><h3>&nbsp;&nbsp;&nbsp;Description</h3></td>
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
   
    $slectq="select * from portifolio";
    $runq=mysqli_query($conn,$slectq);
    $data=mysqli_num_rows($runq);
    if($data>0)
    {
      while($x=mysqli_fetch_assoc($runq))
      {
        echo "
        <tr>
        <td>".$x['P_title']."</td>
        <td>".$x['P_file']."</td>
        <td>".$x['type']."</td>
        <td>".$x['path']."</td>
        <td>".$x['P_description']."</td>
        <td bgcolor='red'><a href='DeletePortifolio.php?id=".$x['id']."'><h4>Delete</h4></a></td>
       
       
         </tr>
        ";
      }
    }
    ?>
    <tr><td  colspan="6" align="center"  bgcolor='cyan'><a href='Admin.php'>Back</a></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>