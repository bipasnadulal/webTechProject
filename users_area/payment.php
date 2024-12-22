<?php
include('../database/connect.php');
include_once('../functions/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WristCraft-Payment Page</title>
    <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS Link -->
  <link rel="stylesheet" href="../styles.css">
  <!-- script -->
  <script src="https://khalti.com/static/khalti-checkout.js"></script>

  <!-- internal css -->
   <style>
#payment-button {
            background-color: #563d7c;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        #payment-button:hover {
            background-color: #6a4db4; 
        }

        #cash_on_delivery{
            background-color:black;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        body{
          overflow-x: hidden;
        }
   </style>
  

</head>
<body>

<!-- php to access user id -->
<?php
$user_ip=getIPAddress();
$get_user="Select * from `user_table` where user_ip='$user_ip'";
$result=mysqli_query($conn, $get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];
?>

    <h2 class="m-2">Select Payment Method</h2>
    <div class="d-flex flex-row mx-2">
        <!-- khalti digital payment -->
        <div style="width:250px; height:150px;" class="d-flex flex-column align-items-center">
            <img src="./images/khaltiLogo.jpg" alt="khalti payment" style="width:100%; height:100%; object-fit:cover;">
            <button id="payment-button">Pay with Khalti</button>
    </div>

    <!-- Cash on delivery -->
    <div style="width:250px; height:140px;" class="m-2 d-flex flex-column align-items-center">
            <img src="./images/COD.jpg" alt="cash on delivery" style="width:100%; height:100%; object-fit:cover;">
            <a href="./users_area/orders_page.php?user_id=<?php echo $user_id ?>"><button id="cash_on_delivery">Cash on delivery</button></a>
    </div>
    </div>
    

    <!-- Script for dummy khalti payment integration -->
    <script>
        var config = {
            "publicKey": "test_public_key_xxxxx", // Replace with test public key
            "productIdentity": "1234567890",
        "productName": "Dummy Product",
        "productUrl": "http://example.com/product", 
            "eventHandler": {
                onSuccess(payload) {
                    console.log("Payment Success (Dummy):", payload);
                    alert('Payment successful! Token: ' + payload.token);
                    
                    // Send payload.token to your server (PHP) for verification
                    fetch('verify_payment.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(payload)
                    }).then(response => response.json())
                      .then(data => {
                          if (data.success) {
                              alert('Dummy Payment Verified!');
                          } else {
                              alert('Dummy Payment Verification Failed!');
                          }
                      });
                },
                onError(error) {
                    console.log("Error:", error);
                    alert('Payment Error!');
                },
                onClose() {
                    alert('Payment Cancelled!');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);

        document.getElementById("payment-button").onclick = function () {
            checkout.show({ amount: 1000 }); // Amount in paisa (e.g., Rs. 10 = 1000 paisa)
        };
    </script>
   
</body>
</html>