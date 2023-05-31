<?php
if (isset($_GET['other'])) 
{
    session_start();
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
    <title>Party Popper | Login</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
</head>
<?php
    include('./includes/funcs.php'); 
    if(isset($_POST['register']))
    {
        $ip=getIPAddress();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $cpass = $_POST['cpass'];
        $select_query="select * from `user` where User_Name='$username' OR User_Email='$email' OR User_Phone='$phone'";
        $result_select=mysqli_query($con,$select_query);
        $num=mysqli_num_rows($result_select);
        if($num>0)
        {
            echo"<script>alert('Account Already Exist Try Another Username/Email/Phone#.')</script>";
        }
        else if($pass!=$cpass)
        {
            echo"<script>alert('Password Not Matched.')</script>";
        }
        else
        {
            $insert = "insert into `user` (User_Name,User_Email,User_Address,User_Phone,User_Password,User_IP) values ('$username','$email','$address','$phone','$pass_hash','$ip')";
            $insert_result = mysqli_query($con, $insert);
            if($insert_result)
            {
                echo"<script>alert('Registration Successful.')</script>";
            }
            else
            {
                echo"<script>alert('Registration Unsuccessful.')</script>";
            }
        }
    $select_cart = "select * from `cart` where User_IP='$ip'";
    $select_cart_result = mysqli_query($con,$select_cart);
    if(mysqli_num_rows($select_cart_result)>0)
    {
        $row = mysqli_fetch_assoc($select_cart_result);
        $cart_id = $row['Cart_ID'];
        $select_cart_item = "select * from `cart_item` where Cart_ID=$cart_id";
        $select_cart_item_result = mysqli_query($con,$select_cart_item);
        if(mysqli_num_rows($select_cart_item_result)>0)
        {
            $_SESSION['username']=$username;
            echo "<script>alert('You Have Items in Cart.')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
        else
        {
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    else
    {
        echo "<script>window.open('index.php','_self')</script>";
    }
    }
    if(isset($_POST['login']))
    {
        $username = $_POST['uname'];
        $user_pass = $_POST['upass'];
        $ip=getIPAddress();
        $select_user = "select * from `user` where User_Name='$username'";
        $result_select_user = mysqli_query($con, $select_user);

        
        if(mysqli_num_rows($result_select_user)>0)
        {
            $row_data=mysqli_fetch_assoc($result_select_user);
            if(password_verify($user_pass,$row_data['User_Password']))
            {
                $_SESSION['username']=$username;
                $select_cart = "select * from `cart` where User_IP='$ip'";
                $select_cart_result = mysqli_query($con,$select_cart);
                if (mysqli_num_rows($select_cart_result) > 0) 
                {
                    $row = mysqli_fetch_assoc($select_cart_result);
                    $cart_id = $row['Cart_ID'];
                    $select_cart_item = "select * from `cart_item` where Cart_ID=$cart_id";
                    $select_cart_item_result = mysqli_query($con, $select_cart_item);
                    if (mysqli_num_rows($select_cart_item_result) > 0) 
                    {
                        echo"<script>alert('Login Successful.')</script>";
                        echo "<script>window.open('payment.php','_self')</script>";
                    }
                    else
                    {
                        echo"<script>alert('Login Successful.')</script>";
                        echo "<script>window.open('userprofile.php','_self')</script>";
                    }
                }
                else
                {
                    echo"<script>alert('Login Successful.')</script>";
                    echo "<script>window.open('userprofile.php','_self')</script>";
                }
                
            }
            else
            {
                echo"<script>alert('Incorrect Password.')</script>";
            }
        }
        else
        {
            echo"<script>alert('Invalid Credentials.')</script>";
        }
    }
?>
<body>
    <?php
    if(isset($_GET['other']))
    {
        echo "<section>            
        <div class='row header mb-4'>
            <div class='col-md-3 mt-5' style='padding-left:20px;'>
            </div>
            <div class='col-md-2'>

            </div>
            <div class='col-md-2 text-center'>
            <a href='index.php'><img style='border-radius:50%; height:100px;' src='images/logo.jpg' /></a>
            </div>
            <div class='col-md-3'>
                
            </div>
            <div class='col-md-1 mt-5'>
            
            </div>
            <div class='col-md-1 mt-5'>
            <a href='cart.php'>CART <i class='fa fa-shopping-bag' aria-hidden='true'></i></a>
            </div>
        </div>
        </section>";
    }
    ?>
    <section>
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-5 px-5">
                <h4>LOGIN</h4>
                <form action="" method="post" class="mb-2" enctype="multipart/form-data">
                <div class="form-outline mb-4 w-60 m-3">
                    <label for="uname" class="form-label">Username</label>
                    <input type="text" name="uname" id="uname" class="form-control" placeholder="Enter Email" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4 w-60 m-3">
                    <label for="upass" class="form-label">Password</label>
                    <input type="password" name="upass" id="upass" class="form-control" placeholder="Enter Password" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4 w-50 m-3">
                    <input type="submit" class="form-control ip-btn btn-primary m-0" name="login" value="Login" aria-label="Categories" aria-describedby="basic-addon1">
                </div>
                </form>
            </div>
            <div class="col-md-5 px-5">
                <h4>REGISTER</h4>
                <form action="" method="post" class="mb-2" enctype="multipart/form-data">
                <div class="form-outline mb-4 w-60 m-3">
                    <label for="username" class="form-label">Name</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Name(abc)" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4 w-60 m-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email(abc@gmail.com)" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4 w-60 m-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address(P-1 ST#2,COLONY,CITY)" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4 w-60 m-3">
                    <label for="phone" class="form-label">Phone#</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone#(03XXXXXXXXX)" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4 w-60 m-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password(8-12 characters)" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4 w-60 m-3">
                    <label for="cpass" class="form-label">Confirm Password</label>
                    <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Enter Password(8-12 characters)" autocomplete="off" required="required">
                </div>
                <div class="form-outline mb-4 w-50 m-3">
                    <input type="submit" class="form-control ip-btn btn-primary m-0" name="register" value="Register" aria-label="Categories" aria-describedby="basic-addon1">
                </div>
                </form>
            </div>
            <div class="col-md-1">

            </div>
        </div>        
    </section>
    <?php
    if(isset($_GET['other']))
    {
        echo "<section class='footer'>
        <div>
            <a id='srp' href='policy.php'>SHIPPING AND RETURN POLICY</a>
            <a id='ab' href='about.php'>ABOUT</a>
        </div>
        <p>Follow us on:</p>
        <ul>
            <a id='fb' href='www.facebook.com'><img src='images/fb-logo.png'/></a>
            <a id='ig' href='www.instagram.com'><img src='images/insta-logo.png'/></a>
        </ul>
    </section>";
    }
    ?>
</body>
</html>