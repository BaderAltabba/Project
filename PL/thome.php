<!DOCTYPE html>
<?php

 include("auth.php");
?>
<html>

<head>
  <title>Teacher HomePage</title>
<link rel="stylesheet" href="thomelayout.css" />

</head>

<body>
<ul class=A>
    <li class=B><b>S</b>yrian <b>P</b>rivate <b>U</b>niversity</li>
<li class=C><a class=D href="signout.php">Logout</a> </li>
    </ul>
    <br><br><br><br>
    <h1>Hey Prof. <?php echo  $_SESSION['username']; ?> Welcome Back!</h1>
    <div class=I>
<input class=F type="button" value="Teacher's Guide" />
<br><br>
<ul class=E>
<li><a class=G href="tprofile.php">View Profile</a></li><br><br>
<li><a class=G href="uplodefile.php">Add Assignment</a></li><br><br>
<li><a class=G href="gradeassignment.php">Grade Assignments</a></li><br><br>
<li><a class=G href="viewstudents.php">View Students</a></li><br>
</ul>
    </div>

</body>
</html>