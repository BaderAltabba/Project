<?php
include_once 'data.php';
 include("auths.php");
 include("download.php")  ;
 $sql ="Select * from uploaded_files";
$result =mysqli_query($con,$sql);
?>
<html>

<head>
    <title>View Assingments</title>
<link rel="stylesheet" href="viewassingment_layout.css" />

</head>

<body>
<ul class=A>
        <li class=B><b>S</b>yrian <b>P</b>rivate <b>U</b>niversity</li>
<li class=C><a class=D href="signout.php">Logout</a> </li>
        </ul>
        <br><br><br><br>
        <center>
<h1 class=F>Available Assingments</h1>
        <table class="E">
     <tr class=G>
        <th>#</th>
        <th>Title</th>
        <th>File</th>
        <th>Action</th>

     </tr>
     <?php
    while($row=mysqli_fetch_assoc($result)){
?>
      <tr><td><?php  echo "<span class=Q>". $row['id']."</span>";  ?></td>
          <td><?php  echo "<span class=Q>". $row['title']."</span>";  ?></td>
          <td><?php  echo "<span class=Q>". $row['image']."</span>";  ?></td>
          <td><a class=Z href="viewassingment.php?file_id=<?php echo $row['id']?>">Download</a></td>


      </tr>
<?php }

?>
 </table>
 </center>

</body>
</html>