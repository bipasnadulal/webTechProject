    <?php
include('../database/connect.php');
include_once('../functions/functions.php');
@session_start();  //only if this page is activated then only starting the session.
    ?>
    
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WristCraft-User Login</title>
        <!-- Specifies the base URL for all relative URLs in the page -->
        <base href="/WEBTECHPROJECT/">
        <!-- Bootstrap Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS Link -->
        <link rel="stylesheet" href="styles.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

        <!-- internal css -->
        <style>
            body{
                overflow-x:hidden;
            }
        </style>

    </head>

    <body>
        <div style="
    min-height: 100vh; 
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: black; 
">
            <div class="container-fluid d-flex align-items-center justify-content-center rounded"
                style=" background-color:grey;width:950px; background-image: url('images/watchUserReg.jpg'); background-repeat:no-repeat;">
                <div class="d-flex flex-column align-items-center justify-content-center rounded"
                    style="background-color:white;width:550px; height:720px; margin-right:-400px;">
                    <div style="width:150px; height:55px;">
                        <img src="images/logo.png" alt="logo" style="
            width:100%; height:100%; object-fit:cover;
            ">
                    </div>

                    <h2 class="text-center">Login</h2>
                    <form action="" method="post">

                        <div class="form-outline mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" class="form-control" placeholder="Enter your name"
                                autocomplete="off" required="required" name="username">
                        </div>


                        <div class="form-outline mb-2">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control"
                                placeholder="Enter your password" autocomplete="off" required="required"
                                name="user_password">
                        </div>

                        <div>
                            <input type="submit" value="Login" class="custom-button" name="userLogin"
                                style="width:400px;">
                            <p class="text-center mt-2">Don't have an account?<a
                                    href="users_area/user_registration.php">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </body>

    </html>
</body>

</html>

<!-- PHP Code -->
<?php
if(isset($_POST['userLogin'])){
    $userName = $_POST['username'];
    $user_password = $_POST['user_password'];

    //sql query
    $select_query="Select * from `user_table` where username='$userName'";
    $result=mysqli_query($conn, $select_query);

    if($result){
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart item
    $select_query_cart="Select * from `cart` where ip_address='$user_ip'";
    $select_cart=mysqli_query($conn, $select_query_cart);
    $rows_cart_count=mysqli_num_rows($select_cart);
    

    if($rows_count>0){
        $_SESSION['username']=$userName;
        if(password_verify($user_password, $row_data['user_password'])){
            if($rows_count==1 and $rows_cart_count==0){
                $_SESSION['username']=$userName;
                echo "<script>alert('Logged in Successfully')</script>";
                echo "<script>window.open('users_area/profile.php', '_self')</script>";
            }
            else{
                $_SESSION['username']=$userName;
                echo "<script>alert('Logged in Successfully')</script>";
                echo "<script>window.open('/webTechProject/index.php', '_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
else{
    echo "<script>alert('Database query failed')</script>";
}
}


?>