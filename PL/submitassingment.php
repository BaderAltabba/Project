<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <link rel="stylesheet" href="submitassingment_layout.css" />
</head>
<body>
<ul class=A>
    <li class=B><b>S</b>yrian <b>P</b>rivate <b>U</b>niversity</li>
<li class=C><a class=D href="signout.php">Logout</a> </li>
    </ul>
<br><br><br><br><br><br><a class=K href="shome.php">Back</a>
<div class=J></div>
<center>
       <div class=I>
<form method="post" enctype="multipart/form-data">
     <label class=E>STD ID</label>
    <input class=F type="text" name="i" required>
     <br> <br>
    <label class=E>Name  </label>
    <input class=F type="text" name="n" required>
     <br> <br>
    <label class=E>Title </label>
    <input class=F type="text" name="title" required>
     <br> <br>
    <input class=G type="File" name="file">
    <br><br>
    <input class=H type="submit" name="submit">
    </form>
       </div>
   </center>


</form>

</body>
</html>

<?php
error_reporting(0);
ini_set('display_errors', 0);
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "db";  #database name

#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);

if (isset($_POST["submit"]))
 {
     #retrieve file title
        $title = $_POST["title"];
         $n = $_POST["n"];
         $i = $_POST["i"];

    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];

    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];

     #upload directory path
$uploads_dir = 'submits';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);

    #sql query to insert into database
    $sql = "INSERT into submited_files(std_id,name,title,image) VALUES('$i','$n','$title','$pname')";

    if(mysqli_query($conn,$sql)){

   echo "<script>alert('Wow! File Uploaded Successfully.')</script>";
    }
    else{
        echo "<script>alert('Woops! Something Went Wrong.')</script>";
    }
}


?>