<?php
// Include config file
require_once "data.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate username
        if(empty(trim($_POST["username"]))){
                $username_err = "Please enter a username.";
        } else{
                // Prepare a select statement
                $sql = "SELECT id FROM teacher WHERE username = ?";

                if($stmt = mysqli_prepare($con, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "s", $param_username);

                        // Set parameters
                        $param_username = trim($_POST["username"]);

                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){
                                /* store result */
                                mysqli_stmt_store_result($stmt);

                                if(mysqli_stmt_num_rows($stmt) == 1){
                                        $username_err = "This username is already taken.";
                                } else{
                                        $username = trim($_POST["username"]);
                                }
                        } else{
                                echo "Oops! Something went wrong. Please try again later.";
                        }
                }

                // Close statement

        }

        // Validate password
        if(empty(trim($_POST["password"]))){
                $password_err = "Please enter a password.";
        } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "Password must have atleast 6 characters.";
        } else{
                $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
                $confirm_password_err = "Please confirm password.";
        } else{
                $confirm_password = trim($_POST["confirm_password"]);
                if(empty($password_err) && ($password != $confirm_password)){
                        $confirm_password_err = "Password did not match.";
                }
        }

        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

                // Prepare an insert statement
                $sql = "INSERT INTO teachers (username, password) VALUES (?, ?)";

                if($stmt = mysqli_prepare($con, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                        // Set parameters
                        $param_username = $username;
                        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){
                                // Redirect to login page
                                header("location: home1.php");
                        } else{
                                echo "Something went wrong. Please try again later.";
                        }
                }

                // Close statement
                mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Sign Up</title>

</head>
<body>

<!-- navgation menu start  -->


<div class="container my-4">
<div class="card mx-auto" style="width: 20rem;"><br>
<div class="card-body">
<h2 style="text-align:center">Sign Up Teachers</h2>
<hr>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
                                <label>Username</label>
                                <input type="text" name="username"  value="<?php echo $username; ?>">
                                <span><?php echo $username_err; ?></span>
                        </div>
                        <div  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
                                <label>Password</label>
                                <input type="password" name="password"  value="<?php echo $password; ?>">
                                <span><?php echo $password_err; ?></span>
                        </div>
                        <div  <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>>
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password"  value="<?php echo $confirm_password; ?>">
                                <span><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="form-group">
                                <input type="submit"  value="Submit">
                                <input type="reset"  value="Reset">
                        </div>

                </form>
        </div>
</div>
</body>
</html>