<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
// else
// {
//     header('location:products.php');
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify</title>
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userstyle.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="user_page.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>
            
        </ul>
        <ul id=navbarHead>Sportify</ul>
        
    </div>
    <div data-aos="zoom-out-down" data-aos-duration="3000"class="container">
        <div class="content">
            <h3 id="userPageText">Welcome to Sp⚾rtify</h3>
            <h1 id="userPageText">Hello, <span><?php echo $_SESSION['user_name']; ?></span></h1>
            <p id="userPageText">Explore our wide range of sports products.</p>
            <a href="products.php" class="btn">View Products</a>
        </div>
    </div>

    <div class="d-flex flex-column justify-content-center w-100 h-100">

</div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
  AOS.init();
</script>
    
</body>
</html>
