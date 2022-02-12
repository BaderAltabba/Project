<?php
// Initialize the session

session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: thome.php");
    exit;
}

// Include config file
require_once "data.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Check if username is empty
        if(empty(trim($_POST["username"]))){
                $username_err = "<br>Please enter username.";
        } else{
                $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if(empty(trim($_POST["password"]))){
                $password_err = "<br>Please enter your password.";
        } else{
                $password = trim($_POST["password"]);
        }

        // Validate credentials
        if(empty($username_err) && empty($password_err)){
                // Prepare a select statement
                $sql = "SELECT id, username, password FROM teachers WHERE username = ?";

                if($stmt = mysqli_prepare($con, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "s", $param_username);

                        // Set parameters
                        $param_username = $username;

                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){
                                // Store result
                                mysqli_stmt_store_result($stmt);

                                // Check if username exists, if yes then verify password
                                if(mysqli_stmt_num_rows($stmt) == 1){
                                        // Bind result variables
                                        mysqli_stmt_bind_result($stmt, $id, $username,$hashed_password);
                                        if(mysqli_stmt_fetch($stmt)){
                                                if(password_verify($password, $hashed_password)){
                                                        // Password is correct, so start a new session
                                                        session_start();

                                                        // Store data in session variables
                                                        $_SESSION["loggedin"] = true;
                                                        $_SESSION["id"] = $id;
                                                        $_SESSION["username"] = $username;

                                                        // Redirect user to welcome page
                                                        header("location: thome.php");
                                                } else{
                                                        // Display an error message if password is not valid
                                                        $password_err = "<br>The password you entered was not valid.";
                                                }
                                        }
                                } else{
                                        // Display an error message if username doesn't exist
                                        $username_err = "<br>No account found with that username.";
                                }
                        } else{
                                echo "<br>Oops! Something went wrong. Please try again later.";
                        }
                }

                // Close statement
                mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($con);
}
?>


<!--Writing HTML Code here from bootstrap templates-->

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="loginT.css" />
        <title>Teacher Login</title>
    </head>
    <body>
    <img src="imageedit_56_5653725764.png" alt="SPU" />
<br>


        <div class=E>
                <input class=C type="button" value="Teacher"/><br><br>
                <span class="E1">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>",> </span>
                                <label class=A>Username</label>
                                <span class="E1"><input class=D type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                        </div></span><br>
                        <span class="E1"><div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"> </span>
                                <label class=A>Password</label>
                                <span class="E1"> <input class=D type="password" name="password" class="form-control">
                                <span class="help-block"><?php echo $password_err; ?></span>
                        </div></span>  <br>

 <button type="submit" class="B"><i class="fa fa-lock">&nbsp;</i><span class="BP">Login</span></button> &nbsp; &nbsp;
    <button type="reset" class="BR"><i class="fa fa-repeat">&nbsp;</i><span class="BP1">Reset</span></button>


                </form>
                </div>




    </body>
</html>


