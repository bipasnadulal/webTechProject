<?php
include("database/connect.php");
include('functions/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WristCraft - Cart details</title>
  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS Link -->
  <link rel="stylesheet" href="styles.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
  <!-- Navbar -->
  <div class="container-fluid p-0 wrapper">
    <div class="container-fluid  p-0">
      <nav class="navbar navbar-expand-lg bg-body-white">
        <div class="container-fluid">
          <img src="./images/logo.png" alt="logo" class="logo" />
          <a class="navbar-brand fw-semibold" href="#">WristCraft</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="displayProducts.php">Shop</a></li>

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
                <a class="nav-link" href="cart.php">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  <span class="cart-badge">
                    <?php
                    cartItem();
                    ?>
                  </span>
                </a>
              </li>
            </ul>
            <form class="d-flex" action="searchProduct.php" method="get">
              <input class="form-control me-2 custom-search-input" type="search" placeholder="Search"
                aria-label="Search" name="search_data">
              <input type="submit" value="Search" class="btn custom-search-button" name="search_data_product">
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="#" class="nav-link sign-up-link">Sign Up</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- calling cart function -->
      <?php 
      cart();
      ?>

  </div>


  <div class="container table-responsive">
    <div class="row">
      <form action="" method="post">
      <h3 class='text-center mb-3'>My Cart</h3>
        <table class="table text-center">
            
              <!-- php code to display dynamic data -->
               <?php
                global $conn;
                $get_ip_add =  getIPAddress();
                global $total_price;
                $total_price=0;
                $cart_query="Select * from `cart` where ip_address = '$get_ip_add'";
                $result=mysqli_query($conn, $cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                echo "
                
                <thead>
                <tr>
                    <th colspan='2'>Items</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>
            <tbody>
                ";
                while($row=mysqli_fetch_array($result)){
                  $product_id=$row['product_id'];
                  $select_products="Select * from `products` where product_id=$product_id";
                  $result_products=mysqli_query($conn, $select_products);
                  while($row_product_price=mysqli_fetch_array($result_products)){
                    $product_price=array($row_product_price['product_price']);
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image=$row_product_price['product_image'];
                    $product_values=array_sum($product_price);
                    $total_price+=$product_values;
                 ?>
                <tr>
                    <td>
                    <b><?php
                    echo $product_title
                    ?></b>
                    </td>
                    <td>
                    <img src="./admin_area/product_images/<?php
                    echo $product_image
                    ?>" alt="<?php echo $product_title ?>" width="100px">
                    </td>
                    <td>Rs. 
                      <?php echo $price_table ?>
                    </td>
                    <td>
                      <!-- Quantity -->
                      <div class="wrapperButton">
                        <span class="minus">-</span>
                        <span class="num">00</span>
                        <span class="plus">+</span>
                      </div>
                      <input type="hidden" name="quantity" id="quantityInput" value="0"/>  <!--Hidden field-->
                      <script>
                        const plusButton = document.querySelector(".plus"),
                        minusButton = document.querySelector(".minus"),
                        numDisplay=document.querySelector(".num");
                        quantityInput =document.querySelector("#quantityInput");
                        
                          let a =0;
                          plusButton.addEventListener("click", ()=>{
                          a++
                          a=(a<10) ? "0" + a : a;
                          numDisplay.innerText = a;
                          quantityInput.value=a;
                        });

                          minusButton.addEventListener("click", ()=>{
                          if ( a > 0 ){
                            a--;
                          a = (a<10) ? "0" + a: a;
                          numDisplay.innerText = a;
                          quantityInput.value=a;
                          }
                        }); 
                      </script> 
                      <?php
                        $get_ip_add = getIPAddress();
                        if(isset($_POST['updateCart'])){
                          $quantities = intval($_POST['quantity']);
                          $update_cart="update `cart` set quantity=$quantities where ip_address='$get_ip_add'";
                          $result_products_quantity=mysqli_query($conn, $update_cart); 
                          $total_price=0;
                          while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $product_quantity = $row['quantity'];
                    
                            // Fetch the product price
                            $select_products = "SELECT * FROM `products` WHERE product_id = $product_id";
                            $result_products = mysqli_query($conn, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = $row_product_price['product_price'];
                                $total_price += $product_price * $product_quantity;
                            }
                          
                        }
                        }
                      ?>
                    </td>
                    <td>
                      <input type="checkbox" name="remove_item[]" value="
                      <?php
                        echo $product_id
                      ?>
                      ">
                    </td>
                    <td>
                       <input type="submit" value="Update Cart" class="custom-button" name="updateCart">
                       <input type="submit" value="Remove Item" class="custom-button" name="removeItem">
                    </td>

                </tr>
                <?php
                }
              }
            }
            else{
              echo "
              <div class='emptyCart text-center'>
                <img src='./images/cart.png' alt='empty cart'/>
               
              <h3>Your Cart Is Currently Empty!</h3>
              <p>Before proceed to checkout you must add some products to your shopping cart.</p>
              <p>You will find a lost of interesting products on our 'Shop' page.</p>
              <a href='displayProducts.php' class='custom-button'>Return to Shop</a>
              </div>
              ";
            }
           ?>
            </tbody>
        </table>

        
    </div>
    </form>
    <!-- function to remove item -->
     <?php
      function remove_cart_item(){
        global $conn;
        if(isset($_POST['removeItem'])){
          foreach($_POST['remove_item'] as $remove_id){
            echo $remove_id;
            $delete_query = "delete from `cart` where product_id = $remove_id";
            $execute_delete=mysqli_query($conn, $delete_query);
            if($execute_delete){
              echo "<script>
              window.open('cart.php','_self')
              </script>";
            }
          }
        }
      }
      echo remove_cart_item();
     ?>

     <!-- sub-total -->
      <?php
      global $conn;
      $get_ip_add=getIPAddress();
      global $total_price;
      $total_price=0;
      $cart_query="Select * from `cart` where ip_address = '$get_ip_add'";
      $result=mysqli_query($conn, $cart_query);
      while($row=mysqli_fetch_array($result)){
                  $product_id=$row['product_id'];
                  $select_products="Select * from `products` where product_id=$product_id";
                  $result_products=mysqli_query($conn, $select_products);
                  while($row_product_price=mysqli_fetch_array($result_products)){
                    $product_price=array($row_product_price['product_price']);
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image=$row_product_price['product_image'];
                    $product_values=array_sum($product_price);
                    $total_price+=$product_values;
                  }}
      $cart_has_items=mysqli_num_rows($result)>0;
      if($cart_has_items){
        echo'
        <div class="cartContainer">
        <h5 class="m-2">Order Summary</h5>
        <div class="d-flex justify-content-between m-2">
          <span>Subtotal</span>
          <span>Rs. '.$total_price.'</span>
        </div>
        <div class="d-flex justify-content-between m-2">
          <span>Shipping Fee</span>
          <span>Free</span>
        </div>
        <div class="d-flex justify-content-between m-3">
        <a href="index.php"><button class="custom-search-button px-3 py-2 border-0 ">Continue Shopping</button></a>
        <a href="displayProducts.php"><button class="custom-search-button px-3 py-2 border-0 mx-3">Proceed to Checkout</button></a>
        </div>   
    </div>
        ';
      }
      ?>
  
  </div>
  
  </div>

  <!-- last-child -->
  <div class="bg-dark text-white p-3 text-center mt-2">
    <p>All rights reserved &#169 Designed by Bipasna 2024</p>
  </div>

  <!-- Bootstrap JS Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
  </script>
</body>

</html>