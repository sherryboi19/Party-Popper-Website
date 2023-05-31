<div class="row px-3 text-center">
    <h5 class='text-center mb-3'>Pending Orders</h5>
    <div class="col-md-1">
        <h6>Order ID</h6>
    </div>
    <div class="col-md-2">
        <h6>Cart</h6>
    </div>
    <div class="col-md-1">
        <h6>Total</h6>
    </div>
    <div class="col-md-2">
        <h6>Date</h6>
    </div>
    <div class="col-md-2">
        <h6>Status</h6>
    </div>
    <div class="col-md-2">
        <h6>Cancel</h6>
    </div>
    <div class="col-md-2">
        <h6>Confirm</h6>
    </div>
    <?php
    include('./includes/funcs.php');
    $ip = getIPAddress();
    $get_user = "select * from `user` where User_IP='$ip'";
    $result_get_user = mysqli_query($con, $get_user);
    $user = mysqli_fetch_assoc($result_get_user);
    $user_id = $user['User_ID'];
    $get_pendings = "select * from `orders` where User_ID=$user_id AND Order_Status='Pending'";
    $result_pending = mysqli_query($con, $get_pendings);
    if(mysqli_num_rows($result_pending)>0)
    {
        while($row=mysqli_fetch_assoc($result_pending))
        {
            $oid = $row['Order_ID'];
            $cid = $row['Cart_ID'];
            $total = $row['Total'];
            $date = $row['Order_Date'];
            $status = $row['Order_Status'];
            echo "<div class='col-md-1 my-2'>
                <h6>$oid</h6>
            </div>
            <div class='col-md-2'>
                <a href='userprofile.php?cart_detail=$cid' class='btn btn-primary''>View</a>
            </div>
            <div class='col-md-1 my-2'>
                <h6>$total</h6>
            </div>
            <div class='col-md-2'>
                <h6>$date</h6>
            </div>
            <div class='col-md-2 my-2'>
                <h6>$status</h6>
            </div>
            <div class='col-md-2'>
                <a href='userprofile.php?pending&rem_order=$oid' class='btn btn-primary' >Cancel</a>
            </div>
            <div class='col-md-2 p-0'>
                <a href='user_payment.php?pay_for_order=$oid&total=$total' class='btn btn-primary' style='width:55%;' >Confirm</a>
            </div>";
        };
    }
    else
    {
        echo "<h5 class='text-center my-5'>No Pending Orders</h5>";
    }
    ?>
</div>