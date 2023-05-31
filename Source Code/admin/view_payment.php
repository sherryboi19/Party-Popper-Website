<div class="row px-3 text-center">
    <h5 class='text-center mb-3'>All Payments</h5>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Payment ID</h6>
    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Order ID</h6>
    </div>
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Total</h6>
    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Date</h6>
    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Type</h6>
    </div>
    <?php
    include('../includes/funcs.php');
    $get_orders = "select * from `payments`";
    $result_orders = mysqli_query($con, $get_orders);
    if(mysqli_num_rows($result_orders)>0)
    {
        while($row=mysqli_fetch_assoc($result_orders))
        {
            $oid = $row['Order_ID'];
            $pid = $row['Payment_ID'];
            $total = $row['Payment_Recieved'];
            $date = $row['Payment_Date'];
            $type = $row['Payment_Type'];
            echo "<div class='col-md-2 my-2'>
                <h6>$pid</h6>
            </div>
            <div class='col-md-2 my-2'>
                <h6>$oid</h6>
            </div>
            <div class='col-md-2'>
            </div>
            <div class='col-md-2 my-2'>
                <h6>$total</h6>
            </div>
            <div class='col-md-2'>
                <h6>$date</h6>
            </div>
            <div class='col-md-2 my-2'>
                <h6>$type</h6>
            </div>";
        }
    }
    else
    {
        echo "<h5 class='text-center my-5'>No Orders</h5>";
    }
    ?>
</div>