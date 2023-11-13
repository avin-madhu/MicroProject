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
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/productDesc.css">
</head>

<body>

    <div class="navbar">
        <ul>
            <li><a href="user_page.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php">Cart</a><span id="cart-count" class="cart-count">0</span></li>
            <li><a href="logout.php">Logout</a></li>
        </ul> 
    </div>

   <div id="productdetailsContainer"> 
    <div id="productdetails">
      <?php echo '<img type="hidden" name="image" id="productDescImage" src="' . $row['imagePath'] . '" alt="' . $row['ProductName'] . '">';?>
      <?php echo '<h4 type="hidden" name="name">' . $row['ProductName'] . '</h4>'; ?>
      <?php echo '<div>'?>
      <?php echo '<h3>Total: </h3>'?>
      <?php echo '<h2 type="" name="price" id="productDescPrice" >$ ' . $row['Price'] . '</h2>'; ?>
      <?php echo '</div id="totalPrice">'?>
      <?php 
      $productid = $row['Price'];
      $productname = $row['ProductName'];
      $price =  $row['Price'];
      $productimg = $row['imagePath'];





            // Check if the user is logged in
            if (!isset($_SESSION['user_name'])) {
                header('location:login_form.php');
                exit(); // Stop execution to prevent further code execution
            }

            // Get the username from the session
            $username = $_SESSION['user_name'];

            // Count the number of products in the cart for the specific username
            $count_query = "SELECT COUNT(*) as cart_count FROM cart WHERE byuser = '$username'";
            $result = mysqli_query($conn, $count_query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $cartCount = $row['cart_count'];
            } else {
                // Handle the error, e.g., echo "Error: " . $count_query . "<br>" . mysqli_error($conn);
                $cartCount = 0; // Set a default value
            }
      ?>
      
      <button id="purchasenowbtn" class="btn btn-primary"  class="pay-now paybtn">Purchase Now</button>
    </div>
    <div>
      <div id="description">
<h5>Product Description</h3>
<p></p>
      </div>
          <div id="addtocartform">
          <form action="" method="POST" >
          <input type="hidden" name="product_id" value="123">
            <label for="quantity">Quantity:</label>
            <input id="quantityinput" type="number"class="form-control" name="quantity" value="1" min="1" onchange="updatePrice()" required>
            <button name="submit" id="cartbtn" type="submit" class="btn btn-primary" class="add-to-cart-btn">Add to Cart</button>
          </form>
          </div>
      </div>
  </div>

  <script>
    var cartCount = parseFloat(<?php echo $cartCount; ?>);

    console.log(cartCount);

    function updateCartCount() {
        document.getElementById('cart-count').innerHTML = cartCount;
    }

    // Corrected: Don't call the function immediately, just pass the reference
    document.getElementById('cart-count').addEventListener('click', updateCartCount());
</script>


  <?php
@include 'config.php';



if (isset($_POST['submit'])) {
    $qty = mysqli_real_escape_string($conn, $_POST['quantity']);
    $username = $_SESSION['user_name'];

    $select = " SELECT * FROM cart WHERE productid = '$productid' && byuser = '$username' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

      $error[] = 'product already exist in cart!';

   }else{
   
        $insert = "INSERT INTO cart(productid, productname, qty, price, image, byuser)
        VALUES('$productid', '$productname', '$qty', '$price', '$productimg', '$username')";

        if (mysqli_query($conn, $insert)) {
        
        } else
         {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
        }
     }
     
 }
   
  


?>



 

  <style>
    #addtocartform{
      background-color: #bfc0ff;
      height: 50%;
      width: 100%;
      position: relative;
      padding:30px;
      border-radius: 0px 0px 10px 10px;
    }
    #description{
      background-color: #bfc0ff;
      height: 50%;
      width: 100%;
      position:relative;
      padding: 10px;
      border-radius: 10px 10px 0px 0px;
    }

    #quantityinput{
      /* margin-left: 50px; */
      margin-right: 100px;
      padding: 10px;
      margin-bottom: 75px;
      margin-top: 10px
    }
    
    #cart-count {
    position: absolute;
    top: 20px;
    left: 310px;
    background-color: #ff3f2e;
    color: #fff;
    width: 25px;
    border-radius: 40%;
    padding: 5px;
    font-size: 12px;
    text-align: center;
    }

  </style>
  <script src="script.js">
  AOS.init();
  </script>
</body>
</html>
