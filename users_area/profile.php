<?php
include("../database/connect.php");
include('../functions/functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WristCraft</title>
  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS Link -->
  <link rel="stylesheet" href="../styles.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

  <!-- internal css -->
  <style>
    body{
      overflow-x:hidden;
    }
    
  </style>
</head>

<body>
  <!-- Navbar -->
  <o class="container-fluid p-0 wrapper">
    <div class="container-fluid  p-0">
      <nav class="navbar navbar-expand-lg bg-body-white">
        <div class="container-fluid">
          <img src="../images/logo.png" alt="logo" class="logo" />
          <a class="navbar-brand fw-semibold" href="#">WristCraft</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="../index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="../displayProducts.php">Shop</a></li>

              <!-- Categories with dropdown -->
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="categoryDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                  <li>
                    <a href="?category=1" class="dropdown-item">Men</a>
                  </li>
                  <li>
                    <a href="?category=2" class="dropdown-item">Women</a>
                  </li>
                  <li>
                    <a href="?category=3" class="dropdown-item">Kids</a>
                  </li>
                </ul>
              </li>

              <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
              <li class="nav-item position-relative">
                <a class="nav-link" href="../cart.php">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  <span class="cart-badge">
                    <?php
                    cartItem();
                    ?>
                  </span>
                </a>
              </li>
            </ul>
            <form class="d-flex" action="../searchProduct.php" method="get">
              <input class="form-control me-2 custom-search-input" type="search" placeholder="Search"
                aria-label="Search" name="search_data">
              <input type="submit" value="Search" class="btn custom-search-button" name="search_data_product">
            </form>
            <!-- <ul class="navbar-nav">
              <li class="nav-item">
                <a href="user_registration.php" class="nav-link sign-up-link">Sign Up</a>
              </li>
            </ul> -->
          </div>
        </div>
      </nav>

      <!-- calling cart function -->
      <?php 
      cart();
      ?>

      <!-- Second-child -->
      <nav class="navbar navbar-expand-lg  bg-dark sticky-top">
        <ul class="navbar-nav me-auto gap-4 ms-5 mt-n3">
          <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link text-white' href='#'>Welcome Guest</a>
            </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link text-white' href='#'>Welcome ".$_SESSION['username']."</a>
            </li>";
          }
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link text-white' href='./users_area/user_login.php'>Login</a>
            </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link text-white' href='./users_area/user_logout.php'>Logout</a>
            </li>";
          }
          ?>
          
        </ul>
      </nav>
    </div>

    <!-- fourth child -->
     <div class="row m-4">
        <div class="col-md-2 bg-dark">
            <ul class="navbar-nav text-center text-white" style="height:70vh;">
            <li class='nav-item' style="background-color:#F9E4BC">
            <h4 style="font-family: 'Lucida Console', 'Courier New', monospace;"><a class='nav-link text-black' href='#'>Hello, <?php echo $_SESSION['username'] ?></a></h4>
            </li>
            <li class="nav-item mt-2">
                <h5>Manage My Account</h5>
                <a class='nav-link' href='profile.php'>My Profile</a>
                <a class='nav-link' href='profile.php?edit_account'>Edit Account</a>
                <a class='nav-link' href='profile.php?delete_account'>Delete Account</a>
            </li>
            <li class="nav-item mt-2">
                <h5>My Orders</h5>
                <a class='nav-link' href='profile.php'>Pending Orders</a>
                <a class='nav-link' href='profile.php?my_orders'>My Orders</a>
            </li>
            <li class="nav-item mt-2">
                <h5><a class='nav-link' href='user_logout.php'>Log out</a></h5>
            </li>
            
            </ul>

            <!-- Manage My Account: My Profile -> Edit Account, Delete Account
            My Orders: Pending Order, My Orders
            Logout -->
        </div>
        <div class="col-md-6">
          <?php
        user_order_details();
        ?>
        </div>
     </div>
  </o>

  <!-- last-child -->
  <!-- <div class="bg-dark text-white p-3 text-center mt-2">
    <p>All rights reserved &#169 Designed by Bipasna 2024</p>
  </div> -->

  <!-- Bootstrap JS Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>