<section>
<h4 class="text-center">ALL PRODUCTS</h4>
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="row">
                <?php
                    include('../includes/connect.php');
                    $select_query="select * from `products`";
                    $result=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $pro_name=$row['Product_Name'];
                        $pro_img=$row['Product_Img1'];
                        $pro_price=$row['Product_Price'];
                        echo"<div class='col-md-3 my-3'>
                        <img src='./product_images/$pro_img' style='border-radius:50%; height:70px;' alt='$pro_name'>
                        </div>
                        <div class='col-md-6 my-2'>
                        <h6 class='my-4'>$pro_name</h6>
                        </div>
                        <div class='col-md-3 my-2'>
                        <h6 class='my-4'>Rs.$pro_price</h6>
                        </div>";             
                    }
                ?>                
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</section>