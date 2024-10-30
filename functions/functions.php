<?php
include("./database/connect.php");

//getting products
function getProducts(){
    global $conn;
    if(!isset($_GET['category'])){
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
              <a href='index.php?add_to_cart=$product_id' class='btn custom-button'>Add to Cart</a>
              <a href='productDetails.php?product_id=$product_id' class='btn custom-view-button'>View More</a>
            </div>
          </div>
          </div>";
            }
          }
}

//get all products
function getAllProducts(){
  global $conn;
    if(!isset($_GET['category'])){
    $select_query="Select * from `products` order by rand()";
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
              <a href='index.php?add_to_cart=$product_id' class='btn custom-button'>Add to Cart</a>
              <a href='productDetails.php?product_id=$product_id' class='btn custom-view-button'>View More</a>
            </div>
          </div>
          </div>";
            }
          }
}

//get unique categories
function getUniqueCategories(){
  global $conn;

  if(isset($_GET['category'])){
    $category_id=$_GET['category'];
    $select_query="Select * from `products` where category_id=$category_id";
          $result_query=mysqli_query($conn, $select_query);
          $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0){
            echo "<h2 class='text-center'>No stock for this category</h2>";
          }
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
            <a href='index.php?add_to_cart=$product_id' class='btn custom-button'>Add to Cart</a>
             <a href='productDetails.php?product_id=$product_id' class='btn custom-view-button'>View More</a>
          </div>
        </div>
        </div>";
          }
        }
}

//search products

function searchProducts(){
  global $conn;
  if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
    $search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
            $result_query=mysqli_query($conn, $search_query);
            $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0){
            echo "<h2 class='text-center'>No results match!</h2>";
          }
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
              <a href='index.php?add_to_cart=$product_id' class='btn custom-button'>Add to Cart</a>
               <a href='productDetails.php?product_id=$product_id' class='btn custom-view-button'>View More</a>
            </div>
          </div>
          </div>";
            }
          }
}

//view details function
function viewMore(){
  global $conn;
  if(isset($_GET['product_id'])){ 
    if(!isset($_GET['category'])){
      $product_id=$_GET['product_id'];
    $select_query="Select * from `products` where product_id=$product_id";
            $result_query=mysqli_query($conn, $select_query);
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_image=$row['product_image'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              echo "<div class='col-md-4'>
                <!-- image of the product -->
                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title' style='
                max-height:300px;
                width:100%;
                object-fit:contain;
                margin-top: 70px; 
                margin-bottom: 20px;
                '>
            </div>
          <div class='col-md-8'>
                <!-- Description of the products -->
                <h2 class='text-start' style='margin-top: 6rem'>$product_title</h2>
                <h3 class='text-start  mt-3'>Rs. $product_price</h3>  
                <div>
                <p class='text-start'>$product_description</p>
                </div>
                <a href='#' class='btn custom-button'>Add to Cart</a>

            </div>
          ";
            }
          }
        }
}


//getting ip address of the visitors
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $conn;
    $ip = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query= "SELECT * FROM `cart` WHERE ip_address='$ip' AND product_id=$get_product_id";
    $result_query=mysqli_query($conn, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('This item is already added to cart.')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }
    else{
      $insert_query="insert into `cart` (product_id, ip_address, quantity) values ($get_product_id, '$ip', 0)";
      $result_query=mysqli_query($conn, $insert_query);
      echo "<script>alert('This item is added to cart.')</script>";
      echo "<script>window.open('index.php')</script>";
    }
  }
} 

// getting cart item number
function cartItem(){
  if(isset($_GET['add_to_cart'])){
    global $conn;
    $ip = getIPAddress();
    $select_query= "SELECT * FROM `cart` WHERE ip_address='$ip'";
    $result_query=mysqli_query($conn, $select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
    else{
      global $conn;
    $ip = getIPAddress();
    $select_query= "SELECT * FROM `cart` WHERE ip_address='$ip'";
    $result_query=mysqli_query($conn, $select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
  }


?>