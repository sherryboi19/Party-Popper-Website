<?php
session_start();
include('./includes/funcs.php');
$oid = $_GET['pay_for_order'];
$total = $_GET['total'];
if(isset($_POST['add_payment']))
{
    $paying = $_POST['order_bill'];
    $type = $_POST['payment_type'];
    if($total!=$paying)
    {
        echo"<script>alert('Pay the Full Ammount to Proceed.')</script>";
    }
    else
    {
        $confirm_order="update `orders` set `Order_Status`='Deployed' where `Order_ID`=$oid";
        $confirmed_order = mysqli_query($con, $confirm_order);
        $add_payment = "insert into `payments` (Order_ID,Payment_Recieved,Payment_Type,Payment_Date) values ($oid,$paying,'$type',NOW())";
        $added_payment = mysqli_query($con, $add_payment);
        if($added_payment)
        {
            echo"<script>alert('Order Confirmed Thank You for Paying.')</script>";
            echo"<script>window.open('userprofile.php?home','_self')</script>";
        }
    }

}
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
    <title>Payment</title>
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
                <?php echo "<a href='userprofile.php'>".$_SESSION['username']."<i class='fa fa-user px-1' aria-hidden='true'></i></a>"; ?>
                <!-- <a href='logout.php'>LOGOUT <i class="fa fa-sign-out" style='font-size:1.1em;' aria-hidden="true"></i></a> -->
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
        <h4 class="text-center my-5" style='color:#F08EC0;'>PAYMENT PAGE</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="order_id" class="form-label">Order ID</label>
                <input type="number" name="order_id" id="order_id" class="form-control" value="<?php echo $oid; ?>" autocomplete="off" disabled>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="bill" class="form-label">Total Bill</label>
                <input type="text" name="order_bill" id="bill" class="form-control" value="<?php echo $total; ?>" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="payment_type" class="form-label">Payment Option</label>
                <select name="payment_type" id="payment_type" class="form-select">
                    <option value="COD">Cash on Delivery</option>
                    <option value="JazzCash">Jazz Cash</option>
                    <option value="Easypaisa">Easy Paisa</option>
                    <option value="Sadapay">Sadapay</option>
                    <option value="Bank">Bank Transfer</option>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="add_payment" class="btn ip-btn btn-primary" value="Add Payment">
            </div>
        </form>
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