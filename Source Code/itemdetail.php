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
    <title>Party Popper</title>
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
    <div class="container">
    <?php
                include('./includes/funcs.php');
                add_to_cart();
                if(isset($_GET['pro_id']))
                {
                    $search=$_GET['pro_id'];
                    $search_query="select * from `products` where Product_ID=$search";
                    $result=mysqli_query($con,$search_query);
                    $num=mysqli_num_rows($result);
                    if($num==0)
                    {
                        echo"<h4 class='text-center' style='color:#f380bb'>Product Failed To Load!</h4>";
                    }
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $pro_id=$row['Product_ID'];
                        $pro_name=$row['Product_Name'];
                        $pro_dsp=$row['Product_Descrp'];
                        $cat_id=$row['Category_ID'];
                        $pro_img1=$row['Product_Img1'];
                        $pro_img2=$row['Product_Img2'];
                        $pro_img3=$row['Product_Img3'];
                        $pro_price=$row['Product_Price'];
                        $pro_date=$row['Date'];
                        $pro_status=$row['Product_Status'];
                        echo "<div class='row m-0'>
                        <div class='col-lg-6 text-center'>
                                <img src='./admin/product_images/$pro_img1' class='pb-5' alt='$pro_name'>
                            <div class='row'>
                                 <div class='col-lg-6 '>
                                 <img src='./admin/product_images/$pro_img2' class='img-thumbnail' alt='$pro_name'>
                                </div>
                                <div class='col-lg-6 '>
                                <img src='./admin/product_images/$pro_img3' class='img-thumbnail' alt='$pro_name'>
                                </div>
                            </div>
                        </div>
                        <div class='col-lg-6'>
                            <div class='right-side-pro-detail border p-3 m-0'>
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <h4 class='m-0 p-0'>$pro_name</h4>
                                </div>
                                <div class='col-lg-12'>
                                    <h5 class='m-0 py-2 price-pro'>Rs.$pro_price/- </h5>
                                    <hr class='p-0 m-0'>
                                </div>
                                <div class='col-lg-12 pt-2'>
                                    <h5>Product Detail</h5>
                                    <span>$pro_dsp</span>
                                    <hr class='m-0 pt-2 mt-2'>
                                </div>
                                <div class='col-lg-3'>
                                    <p >Quantity :</p>
                                    <input type='number' class='form-control text-center w-10' id='quantity' name='quantity' min='1' max='3'>
                                </div>                          
                                <div class='col-lg-12 mt-3'>
                                    <div class='row'>                                                                                          
                                        <div class='col-lg-6 pb-2'>
                                            <a href='itemdetail.php?pro_id=$pro_id&add_to_cart=$pro_id' class='btn btn-primary w-100 mx-0'>Add To Cart</a>
                                        </div>";
                                        if(isset($_SESSION['username']))
                                        {
                                            echo "<div class='col-lg-6 pb-2 '>
                                            <a href='itemdetail.php?pro_id=$pro_id&add_review' class='btn btn-primary w-100 mx-0'>Add Review</a>
                                            </div>";
                                        }
                                    echo"</div>
                                </div>
                            </div>
                        
                    </div>
                    </div>";
                    }
                }

                ?>
    
            <div class="col-lg-12 text-center pt-3">
                <h4 class='mt-5 mb-3'>Reviews</h4>
            </div>
            <?php
                if(isset($_POST['add_rev']))
                {
                    $rev_text = $_POST['rev_text'];
                    $ip=getIPAddress();
                    $geting_user = "select * from `user` where User_IP='$ip'";
                    $get_user_result = mysqli_query($con, $geting_user);
                    $user = mysqli_fetch_assoc($get_user_result);
                    $user_id = $user['User_ID'];
                    $add_review = "insert into `reviews` (User_ID,Product_ID,Review_Text,Date) values ($user_id,$pro_id,'$rev_text',NOW())";
                    $add_review_result = mysqli_query($con, $add_review);
                    if($add_review_result)
                    {
                        echo "<script>alert('Review Added.')</script>";
                        echo "<script>window.open('itemdetail.php?pro_id=$pro_id','_self')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Review Not Added.')</script>";
                    }
                }
                if(isset($_GET['add_review']))
                {
                echo "<form action='' method='post' enctype='multipart/form-data'>
                    <div class='row m-5'>
                        <div class='col-md-1'>
        
                        </div>
                        <div class='col-md-2'>
                            <h6 class='m-2'>Add Review: </h6>
                        </div>
                        <div class='col-md-6'>
                            <input class='w-100 p-1'type='text' name='rev_text'>
                        </div>
                        <div class='col-md-2'>
                            <input type='submit' name='add_rev' class='btn w-50 btn-primary mx-0' value='POST'>
                        </div>
                    </div>
                    </form>";
                }
            ?>
            
        <div class="row mt-3 p-0 text-center pro-box-section">
            <?php
                $select_query="select * from `reviews` where Product_ID=$pro_id order by rand() limit 0,4";
                $result=mysqli_query($con,$select_query);
                if(mysqli_num_rows($result)>0)
                {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $text = $row['Review_Text'];
                    $user_id = $row['User_ID'];
                    $time = $row['Date'];
                    $geting_user = "select * from `user` where User_ID='$user_id'";
                    $get_user_result = mysqli_query($con, $geting_user);
                    $user = mysqli_fetch_assoc($get_user_result);
                    $user_name = $user['User_Name'];
                    echo"<div class='col-lg-3'>
                    <p>$text</p>
                    <hr>
                    <div class='row'>
                        <div class='col-md-8'>
                            <h7>$user_name</h7>
                        </div>
                        <div class='col-md-4'>
                            <h7 style='font-size:0.5em;'>$time</h7>
                        </div>
                    </div>
                    </div>";
                }
                }
                else
                {
                    echo "<h6 class='text-center' style='color:#f380bb'> NO REVIEWS FOR THIS PRODUCT </h6>";
                }
            ?>
        </div>
    </div>
    </div>
    <section class="footer">
        <div>
            <a id="srp" href="policy.php">SHIPPING AND RETURN POLICY</a>
            <a id="ab" href="about.php">ABOUT</a>
        </div>
        <p>Follow us on:</p>
        <ul>
            <a id="fb" href="www.facebook.com"><img src="images/fb-logo.png" /></a>
            <a id="ig" href="www.instagram.com"><img src="images/insta-logo.png" /></a>
        </ul>
    </section>

</body>

</html>