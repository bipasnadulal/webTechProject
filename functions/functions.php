<?php
include("./database/connect.php");

//getting products
function getProducts(){
    global $conn;
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
}

?>