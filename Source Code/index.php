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
    <title>Party Popper</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
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
        <div class="options mb-3">
            <a class="active mt-4 m-2" href="index.php">HOME</a>
            <a class="m-2" href="allitems.php">ALL ITEMS</a>
            <a class="m-2" href="specialocassion.php">SPECIAL OCCASIONS</a>
            <a class="m-2" href="itemcategory.php">ITEM CATEGORY</a>
            <a class="m-2" href="themes.php">THEMES</a>
            <a class="m-2" href="decorator.php">DECORATORS</a>
        </div>
    </section>
    <section>
        <img class="w-100 p-4" src="images/mainpageart.png" />
    </section>
    
    <section>
        <div>
            <h6 class="text-center">--------------------------------- SHOP BY CATEGORY ---------------------------------</h6>
                <div class="row mpcat">
                <div class="col-md-6">    
                <div class="row">
                    <div class="col-md-6">
                    <div class="mpcontainer p-0">
                        <img src="./images/birthdaysets.png" alt="birthdaysets">
                        <button class="border-0"><a href="" class="btn">Biryhday Sets</a></button>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mpcontainer p-0">
                        <img src="images/hangings.png" alt="hangings">
                        <button class="border-0"><a href="" class="btn">Hangings</a></button>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mpcontainer p-0">
                        <img src="images/decorationset.png" alt="Snow">
                        <button class="border-0"><a href="" class="btn">Decoration Sets</a></button>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mpcontainer p-0">
                        <img src="images/all.png" alt="Snow">
                        <button class="border-0"><a href="" class="btn">All Items</a></button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-md-3 m-30">
                <div class="mpcontainer p-0">
                        <img src="images/balloon.png" alt="Snow">
                        <button class="border-0"><a href="" class="btn btbl">Balloons</a></button>
                    </div>
                </div>
                </div>
            </section>
            <h6 class="text-center">--------------------------------- PARTY DECORATION SETS ---------------------------------</h6>
            <section>
                <div class="row">
                    <div class="col-md-12">
                    <div class="row p-3">  
                 <?php
                    include('./includes/funcs.php');
                    add_to_cart();
                    // $ip = getIPAddress();  
                    // echo 'User Real IP Address - '.$ip;  

                    $select_query="select * from `products` order by rand() limit 0,4";
                    $result=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $pro_id=$row['Product_ID'];
                        $pro_name=$row['Product_Name'];
                        $pro_dsp=$row['Product_Descrp'];
                        $cat_id=$row['Category_ID'];
                        $pro_img1=$row['Product_Img1'];
                        $pro_price=$row['Product_Price'];
                        $pro_date=$row['Date'];
                        $pro_status=$row['Product_Status'];
                        echo "<div class='col-md-3 mb-3'>
                        <div class='card'>
                            <img src='./admin/product_images/$pro_img1' class='card-img-top' alt='$pro_name'>
                            <div class='card-body'>
                            <h6><a class= 'producttitle' href='itemdetail.php?pro_id=$pro_id'>$pro_name</a></h6>
                            
                            <p class='card-text'>$pro_dsp</p>
                            <h4>Rs.$pro_price/-</h4>
                            <a href='index.php?add_to_cart=$pro_id' class='btn btn-primary' >Add to Cart</a>
                            </div>
                        </div>
                        </div>";
                    }

                ?>
            </div>
                    </div>
                </div>
            </section>
                    
            <section class="about">
                <div>
                    <h6 class="text-center">------------------------------ ABOUT US ------------------------------</h6>
                    <div class="text-center my-2">
                    <img class="aboutimg" src="images/div.png" />
                    </div>
                    <div class="text-center my-15">
                    <p>At Party Popper we specializes in innovative custom event decor and Range of
                        Birthday Party Items, Birthday decorations, Anniversary decorations, Bridal shower supplies,
                        Aqiqah and Wedding Decoration items in Pakistan. We are committed to make your special event as
                        you dreamed of. We aim to provide you best quality products with the best quality Customer
                        services.</p>
                    </div>
                    
                </div>
            </section>
        </div>
    </section>
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