<?php
include("../database/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products Admin Dashboard</title>
    <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS Link -->
  <link rel="stylesheet" href="../styles.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_des" class="form-label">Product Description</label>
                <input type="text" name="product_des" id="product_des" class="form-control" placeholder="Enter Product Description" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="product_category" class="form-select">
                    <option value="">Select a Category</option>
                    <!-- php-code -->
                     <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($conn, $select_query);
                        while($row=mysqli_fetch_assoc ($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row ['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                     ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn custom-button mb-3 px-4" value="Insert Product">
            </div>
        </form>
    </div>
    
</body>
</html>