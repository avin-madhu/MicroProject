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

<style>
body {
  font-family: "Lato", sans-serif;
}

#togglebtn{
   color: white;
   position:absolute;
   right: 10px;
   justify-content: center;
   align-items:center;
   top: 3px;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Add Products</a>
  <a href="#">Remove Products</a>
  <a href="#">Remove Users</a>
</div>

<script>

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
<div class="container">

<div id="navbarAdmin">
        <ul>
           <li><a href="user_page.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

         <div class="togglecontainer" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
         </div>

         <span id="togglebtn" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      
    </div>

   <div class="content">
      <h3>You are an <span>Admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>manage your buisness page well</p>
      <a href="login_form.php" class="btn">login</a>
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