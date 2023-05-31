<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <title>Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
    <style>
    body{
        overflow-x: hidden;
    }
    .adminopt .nav-link{
    text-decoration: none;
    background-color:#f380bb;
    color: white;
    }
    .adminopt .nav-link:hover,.ip-btn:hover{
    text-decoration: underline;
    background-color:#e954ab;    
    color: white;
    }
    .ip-btn{
        background-color:#f380bb;
        color:white;
    }
    </style>
</head>
<body>
    <section class="header">
        <div class="row header mb-4 mt-2">
            <div class="col-md-3 mt-5" style='padding-left:20px;'>
            <?php
            if (isset($_SESSION['adminname'])) 
            {
                echo "<h6 class='text-center'>Welcome " . $_SESSION['adminname'] . "</h6>";
            } 
            ?>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2 text-center">
            <a href="index.php"><img style='border-radius:50%; height:100px;' src="../images/logo.jpg" /></a>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-1 mt-5" style='text-align:right;'>
                <?php
                if(isset($_SESSION['adminname']))
                {
                    echo"<a href='logout.php'>LOGOUT <i class='fa fa-sign-out' style='font-size:1.1em;' aria-hidden='true'></i></a>";
                }
                else
                {
                    echo"<a href='login.php'>LOGIN <i class='fa fa-sign-in' style='font-size:1.1em;' aria-hidden='true'></i></a>";
                }
                ?>
            </div>
            <div class="col-md-2 mt-5 text-center">
                <?php
                if(isset($_SESSION['adminname']))
                {
                    echo"<a href='index.php?add_admin'>ADD ADMIN</a>";
                }
                ?>
            
            </div>
        </div>
    </section>
    <section class="adminopt">
        <h5 class="text-center mt-5">MANAGE STORE</h5>
        <hr>
        <?php
        if(isset($_SESSION['adminname']))
        {
        echo"
        <div class='row'>
            <div class='col-md-12'>
                <div class='text-center p-2'>
                    <button class='border-0'><a href='index.php?add_product' class='nav-link py-1 px-2'>ADD PRODUCT</a></button>
                    <button class='border-0'><a href='index.php?view_product' class='nav-link py-1 px-2'>VIEW PRODUCT</a></button>                       
                    <button class='border-0'><a href='index.php?update_product' class='nav-link py-1 px-2'>UPDATE PRODUCT</a></button>                   
                    <button class='border-0'><a href='index.php?delete_product' class='nav-link py-1 px-2'>DELETE PRODUCT</a></button>
                    <button class='border-0'><a href='index.php?add_category' class='nav-link py-1 px-2'>ADD CATEGORY</a></button>
                    <button class='border-0'><a href='index.php?view_category' class='nav-link py-1 px-2'>VIEW CATEGORY</a></button>
                    <button class='border-0'><a href='index.php?update_category' class='nav-link py-1 px-2'>UPDATE CATEGORY</a></button>
                    
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12 p-1'>
                <div class='text-center p-2'>
                    <button class='border-0'><a href='index.php?add_decor' class='nav-link py-1 px-2'>ADD DECORATOR</a></button>
                    <button class='border-0'><a href='index.php?rem_decor' class='nav-link py-1 px-2'>REMOVE DECORATOR</a></button>
                    <button class='border-0'><a href='index.php?view_decor' class='nav-link py-1 px-2'>ALL DECORATORS</a></button>
                    <button class='border-0'><a href='index.php?view_order' class='nav-link py-1 px-2'>ALL ORDERS</a></button>
                    <button class='border-0'><a href='index.php?view_payment' class='nav-link py-1 px-2'>ALL PAYMENTS</a></button>
                    <button class='border-0'><a href='index.php?view_user' class='nav-link py-1 px-2'>ALL USERS</a></button>

                </div>
            </div>
        </div>
        <hr>";
        }
        else
        {
            echo "<h4 class='text-center m-5'>LOGIN FIRST!</h4>";
        }
        ?>
        <div class="container my-5">
            <?php
            if (isset($_SESSION['adminname'])) 
            {
                if (isset($_GET['add_category'])) {
                    include('add_category.php');
                }
                if (isset($_GET['add_product'])) {
                    include('add_product.php');
                }
                if (isset($_GET['view_category'])) {
                    include('view_category.php');
                }
                if (isset($_GET['update_category'])) {
                    include('update_category.php');
                }
                if (isset($_GET['view_product'])) {
                    include('view_product.php');
                }
                if (isset($_GET['update_product'])) {
                    include('update_product.php');
                }
                if (isset($_GET['update_product_form'])) {
                    include('update_product_form.php');
                }
                if (isset($_GET['update_category_form'])) {
                    include('update_category_form.php');
                }
                if (isset($_GET['delete_product'])) {
                    include('delete_product.php');
                }
                if (isset($_GET['del_product'])) {
                    include('../includes/connect.php');
                    $pro_id = $_GET['del_product'];
                    $del_statement = "delete from `products` where `products`.`Product_ID`=$pro_id";
                    $result = mysqli_query($con, $del_statement);
                    if ($result) {
                        echo "<script>alert('Product Deleted Sucessfully.')</script>";
                    } else {
                        echo "<script>alert('Product Delete Unucessful.')</script>";
                    }
                }
                if (isset($_GET['add_admin'])) {
                    include('add_admin.php');
                }
                if(isset($_GET['add_decor']))
                {
                    include('add_decorator.php');
                }
                if(isset($_GET['rem_decor']))
                {
                    include('remove_decor.php');
                }
                if (isset($_GET['del_decor'])) {
                    include('../includes/connect.php');
                    $dec_id = $_GET['del_decor'];
                    $del_statement = "delete from `decorators` where `decorators`.`Decorator_ID`=$dec_id";
                    $result = mysqli_query($con, $del_statement);
                    if ($result) {
                        echo "<script>alert('Decorator Deleted Sucessfully.')</script>";
                    } else {
                        echo "<script>alert('Decorator Delete Unucessful.')</script>";
                    }
                }
                if(isset($_GET['view_decor']))
                {
                    include('view_decor.php');
                }
                if(isset($_GET['view_order']))
                {
                    include('view_order.php');
                }
                if (isset($_GET['cart_detail'])) {
                    include('../includes/funcs.php');
                    $cartid = $_GET['cart_detail'];
                    $sub_total = 0;
                    $getitems = "select products.Product_Img1 as IMG1,products.Product_Name as NAME,products.Product_Price as PRICE,products.Product_ID as ID,cart_item.Qty as QTY FROM ordered_cart,cart_item,products WHERE ordered_cart.Cart_ID=$cartid AND ordered_cart.Cart_ID=cart_item.Cart_ID AND cart_item.Product_ID=products.Product_ID";
                    $getitems_result = mysqli_query($con, $getitems);
                    if (mysqli_num_rows($getitems_result) > 0) {
                        echo "<div class='row' style='margin-right:10%;'>
                    <h5 class='text-center mb-3'>Cart Details</h5>";
                        echo "
                    <div class='col-md-6'>
                    <div class='row'>
                        <div class='col-md-4'>
                            
                        </div>
                        <div class='col-md-8'>
                            <h6 class='' style='color:#F08EC0;'>Products</h6>
                        </div>
                    </div>
                    </div>
                    <div class='col-md-2'>
                        <h6 class='text-center' style='color:#F08EC0;'>Price</h6>
                    </div>
                    <div class='col-md-2'>
                        <h6 class='text-center' style='color:#F08EC0;'>Quantity</h6>
                    </div>
                    <div class='col-md-2'>
                        <h6 class='text-center' style='color:#F08EC0;'>Total</h6>
                    </div>";
                        while ($row = mysqli_fetch_assoc($getitems_result)) {
                            $img = $row['IMG1'];
                            $name = $row['NAME'];
                            $price = $row['PRICE'];
                            $qty = $row['QTY'];
                            $id = $row['ID'];
                            $total = $price * $qty;
                            $sub_total = $sub_total + $total;
                            echo "
                        <div class='col-md-6'>
                        <div class='row'>
                            <div class='col-md-4'>
                                <img src='product_images/$img' style='border-radius:50%; height:70px;' alt='$name'>
                            </div>
                            <div class='col-md-8 my-4'>
                                <h7 class='mx-4'><a style='text-decoration:none; color:black;' href='itemdetail.php?pro_id=$id'>$name</a></h7>
                            </div>
                        </div>
                        </div>
                        <div class='col-md-2'>
                        <h6 class='text-center my-4'>Rs.$price</h6>
                        </div>
                        <div class='col-md-2'>
                            <h6 class='text-center my-4'>$qty</h6>
                        </div>
                        <div class='col-md-2'>
                            <h6 class='text-center my-4'>Rs.$total</h6>
                        </div>";
                        }
                        echo "</div>";
                    }
                }
                if(isset($_GET['view_payment']))
                {
                    include('view_payment.php');
                }
                if(isset($_GET['view_user']))
                {
                    include('view_users.php');
                }
                if(isset($_GET['del_user']))
                {
                include('../includes/funcs.php');
                $id = $_GET['del_user'];
                $get_user = "select * from `user` where User_ID='$id'";
                $result_get_user = mysqli_query($con, $get_user);
                $user = mysqli_fetch_assoc($result_get_user);
                $ip = $user['User_IP'];
                $del_user = "delete from `user` where User_ID='$id'";
                $del_result=mysqli_query($con,$del_user);
                $del_review = "delete from `reviews` where User_ID=$id";
                $del_result=mysqli_query($con,$del_review);
                $del_carts = "delete from `cart` where User_IP='$ip'";
                $del_result=mysqli_query($con,$del_carts);
                $del_orders = "delete from `orders` where User_ID=$id";
                $del_result=mysqli_query($con,$del_orders);
                $del_order_cart = "delete from `ordered_cart` where User_IP='$ip'";
                $del_result=mysqli_query($con,$del_order_cart);
                session_start();
                unset($_SESSION['username']);
                echo "<script>alert('User Deleted.')</script>";
                echo "<script>window.open('index.php?view_user','_self')</script>";

                }
            }
            ?>
        </div>
    </section>
</body>
</html>