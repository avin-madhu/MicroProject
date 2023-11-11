<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="signup-container">
        <h2 >Login to your Account</h2>

        <form action="process_signup.php" method="post">
           
            <div class="input-group">
                <label for="email">Email:</label>
                <input  type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="button-30">Login</button>
        </form>

        <p id="alreadyhaveaccount">Don't have an account? <a href="index.html">Sign Up</a></p>
    </div>
</body>
</html>
