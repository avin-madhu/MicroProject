<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify</title>
    <link rel="stylesheet" href="css/userstyle.css">
    <link rel="stylesheet" href="css/productDesc.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="navbar">
        <ul>
            <li><a href="user_page.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php">Cart</a>
            <li><a href="logout.php">Logout</a></li>
        </ul> 
    </div>


<div class="container">
        <h2>Shopping Cart</h2>
        <br>

        <?php

        
        @include 'config.php';
        $username = $_SESSION['user_name'];
        // Fetch products from the database (adjust SQL query based on your table structure)
        $result = mysqli_query($conn, "SELECT * FROM cart where byuser = '$username'");

        if(mysqli_num_rows($result) == 0){
            echo "<h5>Your Cart is currently Empty 😢 </h5>";
        }
        else
        {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product">';
                echo '<img src="' . $row['image'] . '" alt="' . $row['productname'] . '">';
                echo '<div>';
                echo '<h3>' . $row['productname'] . '</h3>';
                echo '<p>$' . $row['price'] . '</p>';
                echo'<button id="removebtn" class="btn btn-danger">remove</button>';
                echo '</div>';
                echo '</div>';
               
                echo'<br><br><br>';
            }
    
    
             // Check if the user is logged in
             if (!isset($_SESSION['user_name'])) {
                header('location:login_form.php');
                exit(); // Stop execution to prevent further code execution
            }
        }


       

        ?>

        <div id="cart-items"></div>
    </div>

    <style>

        #removebtn{
            display: flex;
            float: right;
            margin-bottom: 20px;
            margin-top: 0px;
        }
      

.container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            margin-bottom: 50px;
        }

        h2 {
            color: #333;
        }

        .product {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .product img {
            max-width: 150px;
            max-height: 150px;
            margin-right: 20px;
            border-radius: 10px;
        }
        

    </style>

    <script>
        function addToCart(productId) {
            var cartItemsDiv = document.getElementById('cart-items');
            cartItemsDiv.innerHTML += '<p>Product ID ' + productId + ' added to cart</p>';
        }
    </script>

    
     
</body>
</html>



