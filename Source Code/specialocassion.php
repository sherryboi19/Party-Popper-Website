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
    <title>Party Popper | Special Occasion</title>
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
            <a class="active m-2" href="specialocassion.php">SPECIAL OCCASIONS</a>
            <a class="m-2" href="itemcategory.php">ITEM CATEGORY</a>
            <a class="m-2" href="themes.php">THEMES</a>
            <a class="m-2" href="decorator.php">DECORATORS</a>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-md-3">
                <ul class="sidenavbar">
                <li><h6>Home / Special Ocassion</h6></li>
		        <hr>
                <li><a href="index.php" class="sidebar">Home</a></li>
                <li><a href="specialpcassion.php" class="sidebar">Special Ocassion</a></li>
                <li><a href="itemcategory.php" class="sidebar">Item Category</a></li>
                <li><a href="themes.php" class="sidebar">Theme</a></li>
                </ul>
            </div>
            <div class="col-md-9">
            <div class="row">
                    <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="images/themes/girlstheme.png" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h6><a class= "producttitle" href="#">Birthday</a></h6>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="images/themes/boystheme.png" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h6><a class= "producttitle" href="#">Bridal Shower</a></h6>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="images/themes/adulttheme.png" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h6><a class= "producttitle" href="#">Baby Shower</a></h6>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="images/themes/girlstheme.png" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h6><a class= "producttitle" href="#">Anniversary</a></h6>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="images/themes/girlstheme.png" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h6><a class= "producttitle" href="#">Wedding</a></h6>
                        </div>
                    </div>
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