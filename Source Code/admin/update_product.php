<section>
<h4 class="text-center">UPDATE PRODUCT</h4>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
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
                        $pro_id=$row['Product_ID'];
                        echo"<div class='col-md-3 my-3'>
                        <img src='./product_images/$pro_img' style='border-radius:50%; height:70px;' alt='$pro_name'>
                        </div>
                        <div class='col-md-5 my-2'>
                        <h6 class='my-4'>$pro_name</h6>
                        </div>
                        <div class='col-md-2 my-2'>
                        <h6 class='my-4'>Rs.$pro_price</h6>
                        </div>
                        <div class='col-md-2 my-4'>
                        <button class='border-0'><a href='index.php?update_product_form=$pro_id' class='nav-link py-1 px-2'>Update</a></button>
                        </div>";             
                    }
                ?>                
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</section>