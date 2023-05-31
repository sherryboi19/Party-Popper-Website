<?php
include('./includes/funcs.php'); 
$ip = getIPAddress();
$get_user = "select * from `user` where User_IP='$ip'";
$result_get_user = mysqli_query($con, $get_user);
$user = mysqli_fetch_assoc($result_get_user);
$oldname = $user['User_Name'];
$oldemail = $user['User_Email'];
$oldaddress = $user['User_Address'];
$oldphone = $user['User_Phone'];
if (isset($_POST['update_info'])) 
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
    $cpass = $_POST['cpass'];
    $select_query = "select * from `user` where User_Name='$username'";
    $result_select = mysqli_query($con, $select_query);
    $num = mysqli_num_rows($result_select);
    if ($num > 0) 
    {
        echo "<script>alert('Account Already Exist Try Another Username')</script>";
    } 
    else if ($pass != $cpass) 
    {
        echo "<script>alert('Password Not Matched.')</script>";
    }
    else
    {
        $update_query = "update `user` set `User_Name`='$username',`User_Email`='$email',`User_Address`='$address',`User_Phone`='$phone',`User_Password`='$pass_hash' where `User_IP`='$ip'";
        $update_result = mysqli_query($con, $update_query);
        if($update_result)
        {
            echo"<script>alert('Information Updated Sucessfully.')</script>";
            echo "<script>window.open('userprofile.php?home','_self')</script>";
        }
    }
}
?>
<div class="row">
<h6 style='margin-left:30%;'>Edit Profile</h6>
<div class="col-md-2">   
</div>
<div class="col-md-8">
<form action="" method="post" class="mb-2" enctype="multipart/form-data">
    <div class="form-outline mb-4 w-50 m-3">
        <label for="username" class="form-label">Name</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo "$oldname";?>" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo "$oldemail";?>" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" id="address" class="form-control" value="<?php echo "$oldaddress";?>" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-3">
        <label for="phone" class="form-label">Phone#</label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo "$oldphone";?>" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-3">
        <label for="pass" class="form-label">Password</label>
        <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password(8-12 characters)" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-3">
        <label for="cpass" class="form-label">Confirm Password</label>
        <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Enter Password(8-12 characters)" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-3">
        <input type="submit" class="form-control ip-btn btn-primary m-0" name="update_info" value="Update" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
</form>
</div>
<div class="col-md-2">
</div>
</div>