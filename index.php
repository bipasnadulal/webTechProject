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
    <div class="container-fluid sticky-top p-0">
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
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
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
        <div class="col-md-3">
          <div class="card">
            <img src="./images/NaviforceNF8003.jpeg" class="card-img-top" alt="NaviforceWatch">
            <div class="card-body">
              <h5 class="card-title">NaviforceNF8003</h5>
              <p class="card-text">Naviforce NF8003 is a sleek, durable watch featuring a dual display, water resistance, and an elegant stainless steel band.</p>
              <a href="#" class="btn custom-button">Add to Cart</a>
              <a href="#" class="btn custom-view-button">View More</a>
            </div>
          </div>
          <div class="card mt-2">
            <img src="./images/NaviforceNF8003.jpeg" class="card-img-top" alt="NaviforceWatch">
            <div class="card-body">
              <h5 class="card-title">NaviforceNF8003</h5>
              <p class="card-text">Naviforce NF8003 is a sleek, durable watch featuring a dual display, water resistance, and an elegant stainless steel band.</p>
              <a href="#" class="btn custom-button">Add to Cart</a>
              <a href="#" class="btn custom-view-button">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="./images/SeacroftWaffle.jpg" class="card-img-top" alt="SeacroftWaffle Watch">
            <div class="card-body">
              <h5 class="card-title">SeacroftWaffle</h5>
              <p class="card-text">Seacroft Waffle is a stylish and casual watch with a textured dial, comfortable strap, and reliable quartz movement.</p>
              <a href="#" class="btn custom-button">Add to Cart</a>
              <a href="#" class="btn custom-view-button">View More</a>
            </div>
          </div>
          <div class="card mt-2">
            <img src="./images/NaviforceNF8003.jpeg" class="card-img-top" alt="NaviforceWatch">
            <div class="card-body">
              <h5 class="card-title">NaviforceNF8003</h5>
              <p class="card-text">Naviforce NF8003 is a sleek, durable watch featuring a dual display, water resistance, and an elegant stainless steel band.</p>
              <a href="#" class="btn custom-button">Add to Cart</a>
              <a href="#" class="btn custom-view-button">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="./images/shinola.jpg" class="card-img-top" alt="Shinola Watch">
            <div class="card-body">
              <h5 class="card-title">Shinola - Men's Leather Strap Watch</h5>
              <p class="card-text">Shinola Men's Leather Strap Watch: stylish, durable, and timelessly elegant design.</p>
              <a href="#" class="btn custom-button">Add to Cart</a>
              <a href="#" class="btn custom-view-button">View More</a>
            </div>
          </div>
          <div class="card mt-2">
            <img src="./images/NaviforceNF8003.jpeg" class="card-img-top" alt="NaviforceWatch">
            <div class="card-body">
              <h5 class="card-title">NaviforceNF8003</h5>
              <p class="card-text">Naviforce NF8003 is a sleek, durable watch featuring a dual display, water resistance, and an elegant stainless steel band.</p>
              <a href="#" class="btn custom-button">Add to Cart</a>
              <a href="#" class="btn custom-view-button">View More</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="./images/longinesSpirit2.jpg" class="card-img-top" alt="longinesSpirit Watch">
            <div class="card-body">
              <h5 class="card-title">Longines Spirit</h5>
              <p class="card-text">The Longines Spirit watch blends heritage with modern technology, featuring precise Swiss movement and a sleek, elegant design.</p>
              <a href="#" class="btn custom-button">Add to Cart</a>
              <a href="#" class="btn custom-view-button">View More</a>
            </div>
          </div>
          <div class="card mt-2">
            <img src="./images/NaviforceNF8003.jpeg" class="card-img-top" alt="NaviforceWatch">
            <div class="card-body">
              <h5 class="card-title">NaviforceNF8003</h5>
              <p class="card-text">Naviforce NF8003 is a sleek, durable watch featuring a dual display, water resistance, and an elegant stainless steel band.</p>
              <a href="#" class="btn custom-button">Add to Cart</a>
              <a href="#" class="btn custom-view-button">View More</a>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>


    <!-- last-child -->
    <div class="bg-black text-white p-3 text-center mt-2">
    <p>All rights reserved &#169 Designed by Bipasna 2024</p>
   </div>
  </div>

  <!-- Bootstrap JS Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>