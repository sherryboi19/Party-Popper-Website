<?php
    include('./includes/funcs.php');
    $ip=getIPAddress();
    $select_cart = "select * from `cart` where User_IP='$ip'";
    $result = mysqli_query($con, $select_cart);
    $row = mysqli_fetch_assoc($result);
    $cart_id = $row['Cart_ID'];
    $add_cart_to_orders = "insert into `ordered_cart` (Cart_ID,User_IP) values($cart_id,'$ip')";
    $result_addcart = mysqli_query($con, $add_cart_to_orders);
    $empty_cart = "delete from `cart` where User_IP='$ip'";
    $result_empty_cart = mysqli_query($con, $empty_cart);
    $user_id = $_GET['user_id'];
    $select_cart_item = "select SUM(cart_item.Qty * products.Product_Price) as Total from cart_item,products where cart_item.Cart_ID=$cart_id AND cart_item.Product_ID=products.Product_ID";
    $test = mysqli_query($con, $select_cart_item);
    $res = mysqli_fetch_assoc($test);
    $total = 200 + $res['Total'];
    $insert_order = "insert into `orders` (User_ID,Cart_ID,Total,Order_Date,Order_Status) values ($user_id,$cart_id,$total,NOW(),'Pending')";
    $insert_order_result = mysqli_query($con,$insert_order);
    if($insert_order_result)
    {
        echo"<script>alert('Order Placed Sucessfully.')</script>";
        echo "<script>window.open('userprofile.php','_self')</script>";
    }
    else
    {
        echo"<script>alert('Ordering Unsucessfully.')</script>";

    }
?>