<!DOCTYPE html>
<?php
include_once 'data.php';
 include("auths.php");
$sql ="Select * from students";
$result =mysqli_query($con,$sql);
?>

<html>

<head>
  <title>View Students</title>
  <link rel="stylesheet" href="viewstudentslayout.css" />
</head>

<body>
<ul class=A>
    <li class=B><b>S</b>yrian <b>P</b>rivate <b>U</b>niversity</li>
<li class=C><a class=D href="signout.php">Logout</a> </li>
    </ul>
    <br><br><br><br><br><br>
    <center>
<h1 class=F>Students Records</h1>
<table class="E">
     <tr class=G>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Contact Info</th>
     </tr>
     <?php
    while($row=mysqli_fetch_assoc($result)){
?>
      <tr><td><?php  echo "<span class=Q>". $row['id']."</span>";  ?></td>
          <td><?php  echo "<span class=Q>". $row['fname']."</span>";  ?></td>
          <td><?php  echo "<span class=Q>". $row['lname']."</span>";  ?></td>
           <td><?php  echo "<span class=Q>". $row['email']."</span>";  ?></td>
          <td><?php  echo "<span class=Q>". $row['contact_info']."</span>";  ?></td>

      </tr>
<?php }

?>
 </table>
    </center>
 </body>
</html>