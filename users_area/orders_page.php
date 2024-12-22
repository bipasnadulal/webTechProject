<?php
include('../database/connect.php');
include('../functions/functions.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

//getting total items and total price of all items
$get_ip_address=getIPAddress();
$total_price=0;
$cart_query_price="Select * from `cart` where ip_address='$get_ip_address'";
$result_cart_price=mysqli_query($conn, $cart_query_price);
$invoice_number=mt_rand();  //Generates a random integer using Mersenne Twister algorithm
$status='pending';
$count_products=mysqli_num_rows($result_cart_price);

while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_products="Select * from `products` where product_id=$product_id";
    $result_price=mysqli_query($conn, $select_products);
    while($row_product_price=mysqli_fetch_array($result_price)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}

//getting quantity from cart
$get_cart="select * from `cart`";
$result_cart=mysqli_query($conn, $get_cart);
$get_item_quantity=mysqli_fetch_array($result_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}
else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

//insert query for inserting orders
$insert_orders="insert into `user_orders` (user_id, due_amount, invoice_number, total_products, order_date, order_status) values($user_id, $subtotal, $invoice_number, $count_products, NOW(), '$status')";
$result_query=mysqli_query($conn, $insert_orders);
if($result_query){
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}

//pending orders
$insert_pending_orders="insert into `pending_orders` (user_id, invoice_number, product_id, quantity, order_status) values($user_id, $invoice_number, $product_id, $quantity, '$status')";
$result_pending_query=mysqli_query($conn, $insert_pending_orders);

//delete items from cart
$empty_cart="Delete from `cart` where ip_address='$get_ip_address'";
$result_delete=mysqli_query($conn, $empty_cart);
?>
