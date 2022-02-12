<!DOCTYPE html>
<?php
include_once 'data.php';
 include("auths.php");
?>

<html>

<head>
  <title>View Profile</title>
  <link rel="stylesheet" href="sproflelayout.css" />
</head>

<body>
<ul class=A>
    <li class=B><b>S</b>yrian <b>P</b>rivate <b>U</b>niversity</li>
<li class=C><a class=D href="signout.php">Logout</a> </li>
    </ul>
    <br><br><br><br><br>
<div>
<?php

$sql ="Select * from students where id='{$_SESSION['id']}'";
$result =mysqli_query($con,$sql);
$resultcheck=mysqli_num_rows($result);

  if($resultcheck > 0){
    while($row =mysqli_fetch_assoc($result)){
     echo "<label>Frist Name:</label><br>";
     echo "<p class=Q>". $row['fname']."</p>";
     echo "<label>Last Name:</label><br>";
     echo "<p class=Q>". $row['lname']."</p>";
     echo "<label>Username:</label><br>";
     echo "<p class=Q>". $row['username']."</p>";
     echo "<label>Email:</label><br>";
     echo "<p class=Q>". $row['email']."</p>";
     echo "<label>Contact Info:</label><br>";
     echo "<p class=Q>". $row['contact_info']."</p>";


     }
  }



?>
</div>
</body>
</html>
