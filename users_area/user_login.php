<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WristCraft-User Registration</title>
        <!-- Specifies the base URL for all relative URLs in the page -->
        <base href="/WEBTECHPROJECT/">
        <!-- Bootstrap Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS Link -->
        <link rel="stylesheet" href="styles.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

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
                    <form action="" method="post" enctype="multipart/form=data">

                        <div class="form-outline mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" class="form-control" placeholder="Enter your name"
                                autocomplete="off" required="required" name="username">
                        </div>


                        <div class="form-outline mb-2">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" id="userPassword" class="form-control"
                                placeholder="Enter your password" autocomplete="off" required="required"
                                name="userPassword">
                        </div>

                        <div>
                            <input type="submit" value="Login" class="custom-button" name="userRegister"
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