<!DOCTYPE html>
<?php

 include("auths.php");
?>
<html>

<head>
  <title>Students HomePage</title>
<link rel="stylesheet" href="shomelayout.css" />

</head>

<body>
<ul class=A>
    <li class=B><b>S</b>yrian <b>P</b>rivate <b>U</b>niversity</li>
<li class=C><a class=D href="signout.php">Logout</a> </li>
    </ul>
    <br><br><br><br>
    <h1>Hey <?php echo $_SESSION['username']; ?> Welcome Back!</h1>
    <center>
    <div class=I>
<input class=F type="button" value="Student's Guide" />
<br><br>
<ul class=E>
<li><a class=G href="sprofle.php">View Profile</a></li><br> <br>
<li><a class=G href="viewassingment.php">View Assignments</a></li><br> <br>
<li><a class=G href="submitassingment.php">Submit Assingments</a></li> <br><br>
<li><a class=G href="viewgrade.php">View Grades</a></li> <br>
</ul>
    </div>
    </center>
</body>
</html>