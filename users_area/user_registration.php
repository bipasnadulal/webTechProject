<?php
include('../database/connect.php');
include('../functions/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WristCraft-User Registration</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body style="background-color:black">
    <div class="container-fluid d-flex align-items-center justify-content-center rounded"
        style="background-color:grey;width:950px; background-image: url('../images/watchUserReg.jpg'); background-repeat:no-repeat;">
        <div class="d-flex flex-column align-items-center justify-content-center rounded"
            style="background-color:white;width:550px; height:720px; margin-right:-400px;">
            <div style="width:150px; height:55px;">
                <img src="../images/logo.png" alt="logo" style="
            width:100%; height:100%; object-fit:cover;
            ">
            </div>
            <h2 class="text-center">Welcome</h2>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-outline mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" class="form-control" placeholder="Enter your name"
                        autocomplete="off" required="required" name="username">
                </div>
                <div class="form-outline mb-2">
                    <label for="userEmail" class="form-label">Email</label>
                    <input type="text" id="userEmail" class="form-control" placeholder="Enter your email"
                        autocomplete="off" required="required" name="userEmail">
                </div>
                <div class="form-outline mb-2">
                    <label for="userAddress" class="form-label">Address</label>
                    <input type="text" id="userAddress" class="form-control" placeholder="Enter your address"
                        autocomplete="off" required="required" name="userAddress">
                </div>
                <div class="form-outline mb-2">
                    <label for="userContact" class="form-label">Contact</label>
                    <input type="text" id="userContact" class="form-control" placeholder="Enter your mobile number"
                        autocomplete="off" required="required" name="userContact">
                </div>
                <div class="form-outline mb-2">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" id="userPassword" class="form-control" placeholder="Enter your password"
                        autocomplete="off" required="required" name="userPassword">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirmPw" class="form-label">Confirm Password</label>
                    <input type="password" id="confirmPw" class="form-control" placeholder="Enter your password"
                        autocomplete="off" required="required" name="confirmPw">
                </div>
                <div>
                    <input type="submit" value="Register" class="custom-button" name="userRegister"
                        style="width:400px;">
                    <p class="text-center mt-2">Already have an account?<a href="user_login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<!-- php code -->
<?php
if (isset($_POST['userRegister'])) {
    $user_name = $_POST['username'];
    $user_email = $_POST['userEmail'];
    $user_address = $_POST['userAddress'];
    $user_contact = $_POST['userContact'];
    $user_password = $_POST['userPassword'];
    $confirm_pw = $_POST['confirmPw'];
    $user_IP = getIPAddress();
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);

    //for inserting users image need to make a form field and then uncomment these and also create one user_images folder inside user_area.
    // $user_image=$_FILES['user_image']['name'];
    // $user_image_temp=$_POST['user_image']['tmp_name'];

    // move_uploaded_file($user_image_temp, "./user_images/$user_image");

    //select query
    $select_query = "Select * from `user_table` where username='$user_name' or user_email='$user_email'";
    $result = mysqli_query($conn, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username or user email already exist.')</script>";
    } 
    else if($user_password != $confirm_pw){
        echo "<script>alert('Passwords do not match.')</script>";
    }
    else {
        //insert query
        $insert_query = "insert into `user_table` (username, user_email, user_password, user_ip, user_address, user_mobile) values ('$user_name', '$user_email','$hash_password', '$user_IP','$user_address', '$user_contact')";
        $sql_execute = mysqli_query($conn, $insert_query);
    }
    
    //selecting cart item
    $select_cart_items="Select * from `cart` where ip_address='$user_IP'";
    $result_cart=mysqli_query($conn, $select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_name;
        echo "<script>alert('You have items in your cart.')</script>";
        echo "<script>window.open('checkout.php', '_self');</script>";
    }
    else{
        echo "<script>window.open('index.php', '_self');</script>";
    }


}
?>