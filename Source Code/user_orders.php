<div class="row px-3 text-center">
    <h5 class='text-center mb-3'>My Orders</h5>
    <div class="col-md-2">
        <h6>Serial</h6>
    </div>
    <div class="col-md-3">
        <h6>Cart</h6>
    </div>
    <div class="col-md-1">

    </div>
    <div class="col-md-2">
        <h6>Total</h6>
    </div>
    <div class="col-md-2">
        <h6>Date</h6>
    </div>
    <div class="col-md-2">
        <h6>Status</h6>
    </div>
    <?php
    include('./includes/funcs.php');
    $ip = getIPAddress();
    $get_user = "select * from `user` where User_IP='$ip'";
    $result_get_user = mysqli_query($con, $get_user);
    $user = mysqli_fetch_assoc($result_get_user);
    $user_id = $user['User_ID'];
    $get_orders = "select * from `orders` where User_ID=$user_id";
    $result_orders = mysqli_query($con, $get_orders);
    if(mysqli_num_rows($result_orders)>0)
    {
        while($row=mysqli_fetch_assoc($result_orders))
        {
            $oid = $row['Order_ID'];
            $cid = $row['Cart_ID'];
            $total = $row['Total'];
            $date = $row['Order_Date'];
            $status = $row['Order_Status'];
            echo "<div class='col-md-2 my-2'>
                <h6>$oid</h6>
            </div>
            <div class='col-md-3'>
                <a href='userprofile.php?cart_detail=$cid' class='btn btn-primary'>View</a>
            </div>
            <div class='col-md-1'>
            </div>
            <div class='col-md-2 my-2'>
                <h6>$total</h6>
            </div>
            <div class='col-md-2'>
                <h6>$date</h6>
            </div>
            <div class='col-md-2 my-2'>
                <h6>$status</h6>
            </div>";
        }
    }
    else
    {
        echo "<h5 class='text-center my-5'>No Orders</h5>";
    }
    ?>
</div>