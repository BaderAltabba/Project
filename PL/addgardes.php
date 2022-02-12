<!DOCTYPE html>
<?php
include_once 'data.php';
?>
<html>
<head>
    <title>Grading</title>
    <link rel="stylesheet" href="addgarde_layout.css" />
</head>
<body>
<ul class=A>
    <li class=B><b>S</b>yrian <b>P</b>rivate <b>U</b>niversity</li>
<li class=C><a class=D href="signout.php">Logout</a> </li>
    </ul>
  <br><br><br><br><br><br><a class=K href="gradeassignment.php">Back</a>
  <div class=I>
  <center>
  <form method="post" enctype="multipart/form-data">
  <label  class=E>STD ID</label>
    <input class=F type="text" name="std" required><br><br>
    <label  class=E>ID</label>
    <input class=F type="text" name="id" required><br><br>
  <label  class=E>Grade</label>
    <input class=F type="text" name="grade" required><br><br>
    <input class=H type="submit" name="submit">
  </center>
  </div>
 </form>
 <?php
 if(isset($_POST['submit'])){
 $id = $_POST['id']  ;
 $std_id = $_POST['std'] ;
 $sql = "UPDATE submited_files SET grade='$_POST[grade]' WHERE std_id='$_POST[std]' and id='$_POST[id]' " ;
$sql_run =mysqli_query($con,$sql);

if($sql_run){

echo "<script>alert('Garde Has Been Added.')</script>";
    }
    else{
        echo "<script>alert('Woops! Something Went Wrong.')</script>";
    }
}


 ?>
  </body>
</html>