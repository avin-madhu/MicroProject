<?php
@include 'config.php';


session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Showcase</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/productsstyle.css">
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
    </div>

  <div class="filter-section">
    <label for="category-select">Filter by Category:</label>
    <select id="category-select">
      <option value="all">All</option>
      <option value="category1">Category 1</option>
      <option value="category2">Category 2</option>
      <!-- Add more categories as needed -->
    </select>
  </div>

  


<div data-aos="fade-up" data-aos-duration="3000" class="product-container">
<?php


$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="product-container">';
    echo '<div class="product-card">';
    echo '<div class="product-img-container">';
    echo '<img src="' . $row['imagePath'] . '" alt="' . $row['ProductName'] . '">';
    echo '</div>';
    echo '<h3>' . $row['ProductName'] . '</h3>';
    echo '<p> Qty: ' . $row['Quantity'] . '</p>';
    echo '<h2 id="productPrice">$ ' . $row['Price'] . '</h2>';
    echo '<a href="productDesc.php?product_id=' . $row['Price'] . '" class="more-link">View Details</a>';
    echo '</div>';
    echo '</div>';
}
?>

</div>


 


    
    
  </div>
  <div class="product-details">
    <!-- Product Details Placeholder -->
  </div>


  <script src="script.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script >
  AOS.init();
</script>
</body>
</html>
