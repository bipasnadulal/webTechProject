<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- css link -->
     <link rel="stylesheet" href="../styles.css">

    <!-- font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first-child -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="logo" class="logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second-child -->
         <div class="">
            <h3 class="text-center p-2">
                Manage Details
            </h3>
         </div>

         <!-- third-child  -->
        <div class="row">
            <div class="col-md-12 bg-dark p-0">
                <div class="button text-center my-2">
                    <button class="mx-2"><a href="insert_product.php" class="nav-link text-dark bg-light my-1">Insert Products</a></button>
                    <button class="mx-2"><a href="" class="nav-link text-dark bg-light my-1">View Products</a></button>
                    <button class="mx-2"><a href="index.php?insert_category" class="nav-link text-dark bg-light my-1">Insert Categories</a></button>
                    <button class="mx-2"><a href="" class="nav-link text-dark bg-light my-1">View Categories</a></button>
                    <button class="mx-2"><a href="" class="nav-link text-dark bg-light my-1">All Orders</a></button>
                    <button class="mx-2"><a href="" class="nav-link text-dark bg-light my-1">All Payments</a></button>
                    <button class="mx-2"><a href="" class="nav-link text-dark bg-light my-1">List Users</a></button>
                    <button class="mx-2"><a href="" class="nav-link text-dark bg-light my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- fourth-child  -->
         <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            ?>
         </div>

          <!-- last-child -->
    <div class="bg-dark text-white p-3 text-center mt-2">
    <p>All rights reserved &#169 Designed by Bipasna 2024</p>
   </div>
     </div>
    







<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>