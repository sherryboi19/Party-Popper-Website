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
    <title>Party Popper | Login</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
</head>
<?php
    include('../includes/funcs.php'); 
    if(isset($_POST['login']))
    {
        $username = $_POST['uname'];
        $user_pass = $_POST['upass'];
        $select_user = "select * from `admins` where Admin_Name='$username'";
        $result_select_user = mysqli_query($con, $select_user);       
        if(mysqli_num_rows($result_select_user)>0)
        {
            $row_data=mysqli_fetch_assoc($result_select_user);
            if(password_verify($user_pass,$row_data['Admin_Password']))
            {
                $_SESSION['adminname']=$username;
                echo"<script>alert('Login Successful.')</script>";
                echo "<script>window.open('index.php','_self')</script>";
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
    <h4 class="text-center p-10">
        ADMIN PAGE
    </h4>
    <section>
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6 px-5">
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
            <div class="col-md-3">

            </div>
        </div>        
    </section>
</body>
</html>