<?php
include_once 'data.php';
       include("auths.php");
$sql ="Select * from submited_files Where std_id='{$_SESSION['id']}'";
$query ="Select sum(grade) from submited_files Where std_id='{$_SESSION['id']}' ";
$result =mysqli_query($con,$sql);
$re =mysqli_query($con,$query);
?>

<html>

<head>
  <title>View Grade</title>
  <link rel="stylesheet" href="viewgrade_layout.css" />
</head>

<body>
<ul class=A>
    <li class=B><b>S</b>yrian <b>P</b>rivate <b>U</b>niversity</li>
<li class=C><a class=D href="signout.php">Logout</a> </li>
    </ul>
    <br><br><br><br><br><br>
    <center>
<h1 class=F>Your Grades</h1>
<table class="E">
     <tr class=G>
        <th>Title</th>
        <th>File</th>
        <th>Grade</th>
     </tr>
     <?php
    while($row=mysqli_fetch_assoc($result)){
?>
      <tr>
          <td><?php  echo "<span class=Q>". $row['title']."</span>";  ?></td>
          <td><?php  echo "<span class=Q>". $row['image']."</span>";  ?></td>
          <td><?php  echo "<span class=Q>". $row['grade']."</span>";  ?></td>
      </tr>
<?php

}

?>
 </table>
    </center>
    <table class=H>
        <tr class=I>
            <th>Total</th>
        </tr>
<tr><td class=J> <?php
 while($row1=mysqli_fetch_array($re)) {

    echo "<span class=Q>". $row1['sum(grade)']."</span>";
 }

 ?>  </td></tr>
 </table>

 </body>
</html>