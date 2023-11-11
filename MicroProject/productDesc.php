<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
?>

<?php


if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];

  // Now you can use $product_id to fetch and display the specific product details from your database.
} else {
  // Handle the case where the product_id is not provided.
  echo "Product ID is missing.";
}

  $pro = $product_id;
  $query = "SELECT * FROM products WHERE $pro = products.Price";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result)
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sportify</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="css/productDesc.css">
</head>
<body>

    <div class="navbar">
        <ul>
            <li><a href="user_page.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul> 
    </div>

   <div id="productdetailsContainer"> 
    <div id="productdetails">
      <?php echo '<img id="productDescImage" src="' . $row['imagePath'] . '" alt="' . $row['ProductName'] . '">';?>
      <?php echo '<h2>' . $row['ProductName'] . '</h2>'; ?>
      <?php echo '<div>'?>
      <?php echo '<h3>Total: </h3>'?>
      <?php echo '<h2 id="productDescPrice" >$ ' . $row['Price'] . '</h2>'; ?>
      <?php echo '</div id="totalPrice">'?>
      <button class="btn btn-primary" class="add-to-cart paybtn">Add to Cart</button>
      <button class="btn btn-primary"  class="pay-now paybtn">Pay Now</button>
      <button class="btn btn-primary" class="Quantity paybtn">Quantity</button>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
