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
?>
<div class="row">
<h6 style='margin-left:30%;'>My Profile</h6>
<div class="col-md-2">   
</div>
<div class="col-md-8">
<form action="" method="post" class="mb-2" enctype="multipart/form-data">
    <div class="form-outline mb-4 w-50 m-3">
        <label for="username" class="form-label">Name</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo "$oldname";?>" disabled>
    </div>
    <div class="form-outline mb-4 w-50 m-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo "$oldemail";?>" disabled>
    </div>
    <div class="form-outline mb-4 w-50 m-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" id="address" class="form-control" value="<?php echo "$oldaddress";?>" disabled>
    </div>
    <div class="form-outline mb-4 w-50 m-3">
        <label for="phone" class="form-label">Phone#</label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo "$oldphone";?>" disabled>
    </div>
</form>
</div>
<div class="col-md-2">
</div>
</div>