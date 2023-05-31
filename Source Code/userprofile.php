<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
    <title>Party Popper | Profile</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
</head>
<body>
    <section>            
        <div class="row header mb-4">
            <div class="col-md-3 mt-5" style='padding-left:20px;'>
            <form class="example" action="search.php">
                <input class="w-50" type="text" placeholder="Search.." name="search_data">
                <input class="w-40 btn-search" type="submit" value="Search" name="search_pro">
            </form>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2 text-center">
            <a href="index.php"><img style='border-radius:50%; height:100px;' src="images/logo.jpg" /></a>
            </div>
            <div class="col-md-3">
                
            </div>
            <div class="col-md-1 mt-5">
                <a href='logout.php'>LOGOUT <i class="fa fa-sign-out" style='font-size:1.1em;' aria-hidden="true"></i></a>
            </div>
            <div class="col-md-1 mt-5">
            <a href="cart.php">CART <i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="options mb-5">
            <a class="m-2" href="index.php">HOME</a>
            <a class="m-2" href="allitems.php">ALL ITEMS</a>
            <a class="m-2" href="specialocassion.php">SPECIAL OCCASIONS</a>
            <a class="m-2" href="itemcategory.php">ITEM CATEGORY</a>
            <a class="m-2" href="themes.php">THEMES</a>
            <a class="m-2" href="decorator.php">DECORATORS</a>
        </div>
    </section>
    <section>
        <h4 class="text-center my-5" style='color:#F08EC0;'>DASHBOARD</h4>

        <div class="row ">
            <div class="col-md-3 text-center">
                <ul class="sidenavbar">
                <li>
                    <div class='text-center'>
                        <h6 >OPTIONS</h6>
                        <hr>
                    </div>
                </li>
                <li><a href="userprofile.php?home" class="sidebar">Home</a></li>
                <li><a href="userprofile.php?edit" class="sidebar">Edit Profile</a></li>
                <li><a href="userprofile.php?pending" class="sidebar">Pending Orders</a></li>
                <li><a href="userprofile.php?order" class="sidebar">My Orders</a></li>
                <li><a href="userprofile.php?del" class="sidebar">Delete Account</a></li>
                </ul>
            </div>
            <div class="col-md-9">
            <?php
                if(isset($_GET['rem_order']))
                {
                include('./includes/funcs.php');
                $oid = $_GET['rem_order'];
                $remove_query = "delete from `orders` where Order_ID=$oid";
                $remove_result = mysqli_query($con, $remove_query);
                if($remove_result)
                {
                    echo "<script>alert('Order Cancelled.')</script>";
                    echo "<script>window.open('userprofile.php?pending','_self')</script>";
                }
                }
                if(isset($_GET['edit']))
                {
                    include('edituser.php');
                }
                if(isset($_GET['pending']))
                {
                    include('user_pending_order.php');
                }
                if(isset($_GET['order']))
                {
                    include('user_orders.php');
                }
                if(isset($_GET['del']))
                {
                include('./includes/funcs.php');
                $ip = getIPAddress();
                $get_user = "select * from `user` where User_IP='$ip'";
                $result_get_user = mysqli_query($con, $get_user);
                $user = mysqli_fetch_assoc($result_get_user);
                $user_id = $user['User_ID'];
                $del_user = "delete from `user` where User_IP='$ip'";
                $del_result=mysqli_query($con,$del_user);
                $del_review = "delete from `reviews` where User_ID=$user_id";
                $del_result=mysqli_query($con,$del_review);
                $del_carts = "delete from `cart` where User_IP='$ip'";
                $del_result=mysqli_query($con,$del_carts);
                $del_orders = "delete from `orders` where User_ID=$user_id";
                $del_result=mysqli_query($con,$del_orders);
                $del_order_cart = "delete from `ordered_cart` where User_IP='$ip'";
                $del_result=mysqli_query($con,$del_order_cart);
                session_start();
                unset($_SESSION['username']);
                echo "<script>alert('Account Deleted.')</script>";
                echo "<script>window.open('index.php','_self')</script>";

                }
                if(isset($_GET['cart_detail']))
                {
                include('./includes/funcs.php');
                $cartid = $_GET['cart_detail'];
                $sub_total=0;
                $getitems="select products.Product_Img1 as IMG1,products.Product_Name as NAME,products.Product_Price as PRICE,products.Product_ID as ID,cart_item.Qty as QTY FROM ordered_cart,cart_item,products WHERE ordered_cart.Cart_ID=$cartid AND ordered_cart.Cart_ID=cart_item.Cart_ID AND cart_item.Product_ID=products.Product_ID";
                $getitems_result=mysqli_query($con,$getitems);
                if(mysqli_num_rows($getitems_result)>0)
                {
                    echo"<div class='row' style='margin-right:10%;'>
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
                    while($row=mysqli_fetch_assoc($getitems_result))
                    {
                        $img=$row['IMG1'];
                        $name=$row['NAME'];
                        $price=$row['PRICE'];
                        $qty=$row['QTY'];
                        $id=$row['ID'];
                        $total=$price*$qty;
                        $sub_total=$sub_total+$total;
                        echo"
                        <div class='col-md-6'>
                        <div class='row'>
                            <div class='col-md-4'>
                                <img src='./admin/product_images/$img' style='border-radius:50%; height:70px;' alt='$name'>
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
                if(isset($_GET['home']))
                {
                    include('user_home.php');
                }
            ?>
            </div>
        </div>        
    </section>

    <section class="footer">
        <div>
            <a id="srp" href="policy.php">SHIPPING AND RETURN POLICY</a>
            <a id="ab" href="about.php">ABOUT</a>
        </div>
        <p>Follow us on:</p>
        <ul>
            <a id="fb" href="www.facebook.com"><img src="images/fb-logo.png"/></a>
            <a id="ig" href="www.instagram.com"><img src="images/insta-logo.png"/></a>
        </ul>
    </section>

</body>
</html>