<?php
    include('./includes/funcs.php');
    $ip=getIPAddress();
    $select_user = "select * from `user` where User_IP='$ip'";
    $result = mysqli_query($con, $select_user);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['User_ID'];
?>
<h4 class="text-center">PAYMENT</h4>
<div class="row">
    <div class="col-md-6 text-center">
        <img class='' style='width:30%;' src="./images/payment_QR.jpg" alt="QR CODE">
        <img class='pt-5' style='width:31%;' src="./images/payment_QR2.jpg" alt="QR CODE">
    </div>
    <div class="col-md-6" style='margin-top: 7rem!important;'>
        <a href='order.php?user_id=<?php echo $user_id;?>' class='btn btn-primary text-center w-40 mt-5 m-20' >Cash on Delivery</a>
    </div>
</div>