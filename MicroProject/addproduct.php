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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admincss">
    <link href="https://fontawesome.com/icons/circle-left?f=classic&s=regular&pc=%23ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sportify</title>
</head>
<body>
<div id="navbarAdmin">
        <ul>
          
           <li><a href="admin_page.php">Back</a></li>
            
        </ul>

    </div>

<style>

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  border: none;
  text-decoration: none;
  font-size: 25px;
}


@media (max-width: 768px) {
    .slider-container {
        overflow-x: scroll;
    }

    .slider {
        flex-wrap: nowrap;
    }
}

#navbarAdmin{

    background-color: #000;
    position: absolute;
    top: 0px;
    width: 100%;
    height: 90px;
    
}

#navbarAdmin ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

#navbarAdmin li{
   float: left;

}

#navbarAdmin a:hover {
    background-color: rgba(129, 150, 206, 0);
    border-radius: 20px;
    color: #eee;
    transition: ease-in-out 0.2s;
}

#navbarAdmin a {
    display: block; 
    color: #a7a7a7; 
    text-align: center; 
    padding: 15px 20px; 
    text-decoration: none; 
    font-size:20px;

}

#userPageText{
    color: rgb(193, 209, 223);
}

body {
    background: linear-gradient(-45deg, #000000, #27000f, #002d3e, #003327);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
    height: 100vh;
  }
  
  @keyframes gradient {
    0% {
      background-position: 0% 50%;
    }
    50% {
      background-position: 100% 50%;
    }
    100% {
      background-position: 0% 50%;
    }
  }

  form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width:80%;
    margin:auto;
    height:150%;
    
}

h2 {
    text-align: center;
    color: #fff;
    margin-top: 100px;
    margin-bottom:20px;
    font-size: 22px;
}

label {
    display: block;
    margin: 10px 0;
    font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea {

    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    size:10px;


}



</style>

    <h2>Add Product</h2>
    <form  action="" method="post">
        <label for="productid">Product ID:</label>
        <input autocomplete="off" class="form-control form-control-sm" type="text" name="productid" required><br>

        <label for="name">Product Name:</label>
        <input autocomplete="off" class="form-control " type="text" name="name" required><br>

        <label for="price">Price:</label>
        <input autocomplete="off" class="form-control " type="text" name="price" required><br>

        <label for="description">Description:</label>
        <textarea autocomplete="off" class="form-control" name="description"></textarea><br>

        <label for="image">Image Path:</label>
        <input autocomplete="off" class="form-control " type="text" name="image" step="0.01" required><br>

        <!-- Add other input fields for additional attributes -->

        <input class="btn btn-primary" type="submit" name="submit" value="Add Product">
    </form>

</body>

<?php
@include 'config.php';

if (isset($_POST['submit'])) {
    $productid = mysqli_real_escape_string($conn, $_POST['productid']);
    $productname = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $productimg = mysqli_real_escape_string($conn, $_POST['image']);

    $insert = "INSERT INTO products(id, ProductName, Price, Quantity, imagePath, description)
               VALUES('$productid', '$productname', '$price', '1', '$productimg', '$description')";

    if (mysqli_query($conn, $insert)) {
        echo "<p>Product added successfully</p>";
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }
    
}
?>




</html>