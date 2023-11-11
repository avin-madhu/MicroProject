<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sportify</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admincss.css">


</head>
<body>

   
<div class="container">

<div id="navbarAdmin">
        <ul>
           <li><a href="admin_page.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

    </div>

   <div class="content">
      <h3>You are an <span>Admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>manage your buisness page well</p>
      <a href="addproduct.php" class="btn">Add Product</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

<script>
function myFunction(x) {
  x.classList.toggle("change");
}
</script>

</body>
</html>