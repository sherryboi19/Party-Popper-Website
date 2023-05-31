<?php
session_start();
?>
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
    <title>Party Popper | Cart</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
</head>
<body>
<section>            
        <div class="row header mb-4">
            <div class="col-md-3 mt-5" style='padding-left:20px;'>
            
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-2 text-center">
            <a href="index.php"><img style='border-radius:50%; height:100px;' src="images/logo.jpg" /></a>
            </div>
            <div class="col-md-3">
                
            </div>
            <div class="col-md-1 mt-5">
            <?php
                if(isset($_SESSION['username']))
                {
                    echo"<a href='userprofile.php?home'>".$_SESSION['username']."<i class='fa fa-user px-1' aria-hidden='true'></i></a>";
                }
                else
                {
                    echo"<a href='login.php?other'>LOGIN</a>";
                }
            ?>
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
        <h2 class="text-center mb-5">My Cart</h2>
        <div class="row">
            <div class="col-md-8">                
                <div class="row" style="margin-left:10%;">
                    <?php
                    include('./includes/funcs.php');
                    $ip=getIPAddress();
                    $cart_query1="select * from `cart` where User_IP='$ip'";
                    $cart_result1=mysqli_query($con,$cart_query1);
                    $num0=mysqli_num_rows($cart_result1);
                    $sub_total=0;
                    if($num0==0)
                    {
                        echo"<h4 class='text-center' style='color:#f380bb'>No Cart!</h4>";
                    }
                    else
                    {
                        $row=mysqli_fetch_assoc($cart_result1);
                        $cartid=$row['Cart_ID'];
                        if(isset($_GET['del-item']))
                        {
                            $del_pro_id=$_GET['del-item'];
                            $del_query="delete from `cart_item` where Product_ID=$del_pro_id AND Cart_ID=$cartid";
                            $del_result=mysqli_query($con,$del_query);
                            if($del_result)
                            {
                                echo"<script>alert('Item Removed from Cart.')</script>";
                            }
                        }
                        $getitems="select products.Product_Img1 as IMG1,products.Product_Name as NAME,products.Product_Price as PRICE,products.Product_ID as ID,cart_item.Qty as QTY FROM cart,cart_item,products WHERE cart.Cart_ID=$cartid AND cart.Cart_ID=cart_item.Cart_ID AND cart_item.Product_ID=products.Product_ID";
                        $getitems_result=mysqli_query($con,$getitems);
                        $num1=mysqli_num_rows($getitems_result);
                        if($num1==0)
                        {
                            echo"<h4 class='text-center' style='color:#f380bb'>No Item in Cart!</h4>";
                        }
                        else
                        {
                            echo"<div class='col-md-1 '>
                        
                            </div>
                            <div class='col-md-5 '>
                                <h6>Products</h6>
                            </div>
                            <div class='col-md-2'>
                                <h6 class='text-center'>Price</h6>
                            </div>
                            <div class='col-md-2'>
                                <h6 class='text-center'>Quantity</h6>
                            </div>
                            <div class='col-md-2'>
                                <h6 class='text-center'>Total</h6>
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
                                    <div class='col-md-2 my-3'>
                                        <a href='cart.php?del-item=$id' class='btn btn-primary w-100 mx-0'>X</a>
                                    </div>
                                    <div class='col-md-3'>
                                        <img src='./admin/product_images/$img' style='border-radius:50%; height:70px;' alt='$name'>
                                    </div>
                                    <div class='col-md-7 my-4'>
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
                        }
                    }
                    ?>
                </div>
            </div>
            <div class='col-md-4'>
                <h5 class='mb-20'>Cart Total</h5>
                <div class='row mx-3'>
                    <div class='col-md-6'>
                        <h6 class='my-2'>Sub-Total</h6>
                    </div>
                    <div class='col-md-4'>
                        <h6 class='my-2 text-left'>Rs.<?php echo"$sub_total";?>/-</h6>
                    </div>
                    <div class='col-md-6'>
                        <h6 class='my-2'>Shipping Charges</h6>
                    </div>
                    <div class='col-md-4'>
                        <h6 class='my-2 text-left'>Rs.200/-</h6>
                    </div>
                    <div class='col-md-6'>
                        <h6 class='my-2'>Grand-Total</h6>
                    </div>
                    <div class='col-md-4'>
                        <h6 class='my-2 text-left'>Rs.<?php $grand_total=$sub_total+200; echo"$grand_total";?>/-</h6>
                    </div>
                    <div class='col-md-10'>
                    <hr>
                    </div>
                    <div class='col-md-10 mt-10'>
                    <?php
                        if($sub_total!=0)
                        {
                            echo "<a href='checkout.php' class='btn btn-primary w-100 my-30 mx-0' >Proceed to Checkout</a>";
                        }
                    ?>
                    </div>
                </div>
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