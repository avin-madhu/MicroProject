<?php
  session_start();

  include("db.php");

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
  }

  if(!empty($email) && !empty($password) && !is_numeric($email))
  {
     $query = "insert into users (fullname, email, password) values('$fullname','$email','$password')";

     mysqli_query($con, $query);
     echo "<script type='text/javascript'> alert('succesfully signed up!');</script>";
  }
  else
  {
    echo "<script type='text/javascript'> alert('Please enter valid information!');</script>";
  }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="signup-container">
        <h2> Create an Account </h2>

        <form action="db.php" method="post">
            <div class="input-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input  type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="button-30">Sign Up</button>
        </form>
        <P id="termsandconditions"> By clicking sign up you are accepting our <a href="TermsandConditions.htm">Terms and Conditions</a> and  <a href="Privacypolicy.html">Privacy Policy</a></P>

        <p id="alreadyhaveaccount">Already have an account? <a href="login.html">Login</a></p>
    </div>
</body>
</html>

