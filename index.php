<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WristCraft</title>
  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS Link -->
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
  <!-- Navbar -->
  <div class="container-fluid p-0">
    <div class="container-fluid  p-0">
    <nav class="navbar navbar-expand-lg bg-body-white">
      <div class="container-fluid">
        <img src="./images/logo.png" alt="logo" class="logo" />
        <a class="navbar-brand fw-semibold" href="#">WristCraft</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
            <li class="nav-item position-relative">
              <a class="nav-link" href="#">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="cart-badge">1</span>
              </a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2 custom-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn custom-search-button" type="submit">Search</button>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="#" class="nav-link sign-up-link">Sign Up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Second-child -->
    <nav class="navbar navbar-expand-lg  bg-dark sticky-top">
      <ul class="navbar-nav me-auto gap-4 ms-5 mt-n3">
        <li class="nav-item">
          <a href="#" class="nav-link text-white">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-white">Login</a>
        </li>
      </ul>
    </nav>
    </div>


    <!-- Third-child -->
    <!-- <div class="HomeContainer">
     <div class="homePageContainer">
      <img src="./images/homePage.png" alt="HomePage Image" class="homePageImage">
    </div>
    <div class="content">
    <p>Your Perfect Watch, Just a Click Away.</p>
    <button>Shop Now</button>
    </div>
    
     </div> -->


    <!-- Fourth-child -->
    <div class="mt-5">
      <h3 class="mx-4">Explore WristCraft</h3>
    </div>

    <div class="row px-4">
      <div class="col-md-12">
        <!-- products -->
         <div class="row">
          <!-- fetching products -->
          <?php
            include("database/connect.php");
            $select_query="Select * from `products` order by rand() limit 0,8";
            $result_query=mysqli_query($conn, $select_query);
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_keywords=$row['product_keywords'];
              $product_image=$row['product_image'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              echo "<div class='col-md-3'>
          <div class='card'>
            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='#' class='btn custom-button'>Add to Cart</a>
              <a href='#' class='btn custom-view-button'>View More</a>
            </div>
          </div>
          </div>";
            }
          ?>
        

          <!-- row-end -->
        </div>
        <!-- col-end -->
        </div>
      </div>


    <!-- last-child -->
    <div class="bg-dark text-white p-3 text-center mt-2">
    <p>All rights reserved &#169 Designed by Bipasna 2024</p>
   </div>
  </div>

  <!-- Bootstrap JS Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>