<?php
include_once 'data.php';
 include("auths.php");
  include("downloadsubmit.php")  ;
 $sql ="Select * from submited_files";
$result =mysqli_query($con,$sql);
?>
<html>

<head>
    <title>Grade Assignments</title>
<link rel="stylesheet" href="viewstudentslayout.css" />

</head>

<body>
<ul class=A>
        <li class=B><b>S</b>yrian <b>P</b>rivate <b>U</b>niversity</li>
<li class=C><a class=D href="signout.php">Logout</a> </li>
        </ul>
        <br><br><br><br>
       
        <center>
<h1 class=F>Grade Assingments</h1>
        <table class="E">
     <tr class=G>
        <th>#</th>
        <th>ID</th>
        <th>Name</th>
        <th>Title</th>
        <th>File</th>
        <th>Action</th>
        <th colspan="2">Grade</th>
     </tr>
     <?php
    while($row=mysqli_fetch_assoc($result)){
?>
      <tr><td><?php  echo "<span class=Q>". $row['id']."</span>";  ?></td>
      <td><?php  echo "<span class=Q>". $row['std_id']."</span>";  ?></td>
          <td><?php  echo "<span class=Q>". $row['name']."</span>";  ?></td>
          <td><?php  echo "<span class=Q>". $row['title']."</span>";  ?></td>
          <td><?php  echo "<span class=Q>". $row['image']."</span>";  ?></td>
           <td><a class="L" href="gradeassignment.php?file_id=<?php echo $row['id']?>">Download</a></td>
            <td><?php  echo "<span class=Q>". $row['grade']."</span>";  ?></td>
            <td><a class="L" href="addgardes.php">Add Grade</a></td>
      </tr>
<?php }

?>
 </table>
 </center>

</body>
</html>