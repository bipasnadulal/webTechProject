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
              <a href='#' class='btn custom-button'>Add to Cart</a>
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
              <a href='#' class='btn custom-button'>Add to Cart</a>
              <a href='#' class='btn custom-view-button'>View More</a>
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
            <a href='#' class='btn custom-button'>Add to Cart</a>
            <a href='#' class='btn custom-view-button'>View More</a>
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
              <a href='#' class='btn custom-button'>Add to Cart</a>
              <a href='#' class='btn custom-view-button'>View More</a>
            </div>
          </div>
          </div>";
            }
          }
}

?>