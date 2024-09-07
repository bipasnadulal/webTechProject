<?php
include("../database/connect.php");

if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    // Make sure the category title is not empty
    if (!empty($category_title)) {
        //select data from database
        $select_query = "SELECT * from `categories` where category_title='$category_title'";
        $result_select = mysqli_query($conn, $select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('Category is already added in the database.')</script>";
        }
        else{

        $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
        $result = mysqli_query($conn, $insert_query);

        if ($result) {
            echo "<script>alert('Category has been inserted successfully.')</script>";
        } else {
            echo "<script>alert('Error: Could not insert category.')</script>";
        }
    }
}
}
?>



<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories">
    </div>
    <div class="input-group w-10 m-auto">
        <input type="submit" class="my-2 border-0 p-2 rounded bg-dark text-white" name="insert_cat"
            value="Insert Categories">
    </div>
</form>