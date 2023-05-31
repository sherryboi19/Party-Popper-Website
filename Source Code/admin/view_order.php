<div class="row">
    <h5 class='text-center mb-3'>All Orders</h5>
    <div class="col-md-6">
    <div class="row px-3 text-center">
    <h5 class='text-center mb-3'>Pending Orders</h5>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Order ID</h6>
    </div>
    <div class="col-md-3">
        <h6 class='' style='color:#F08EC0;'>Cart</h6>
    </div>
    <div class="col-md-1">

    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Total</h6>
    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Date</h6>
    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Status</h6>
    </div>
    <?php
    include('../includes/funcs.php');
    $get_orders = "select * from `orders` where Order_Status='Pending'";
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
                <a href='index.php?cart_detail=$cid' class='btn btn-primary'>View</a>
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
        echo "<h5 class='text-center my-5'>No Pending Orders</h5>";
    }
    ?>
</div>
    </div>
    <div class="col-md-6">
    <div class="row px-3 text-center">
    <h5 class='text-center mb-3'>Deployed Orders</h5>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Order ID</h6>
    </div>
    <div class="col-md-3">
        <h6 class='' style='color:#F08EC0;'>Cart</h6>
    </div>
    <div class="col-md-1">

    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Total</h6>
    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Date</h6>
    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Status</h6>
    </div>
    <?php
    $get_orders = "select * from `orders` where Order_Status='Deployed'";
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
                <a href='index.php?cart_detail=$cid' class='btn btn-primary'>View</a>
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
        echo "<h5 class='text-center my-5'>No Deployed Orders</h5>";
    }
    ?>
</div>
    </div>
</div>