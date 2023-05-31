<?php
    include('../includes/connect.php');
    $pro_id=$_GET['update_product_form'];
    $old_details="select * from `products` where Product_ID=$pro_id";
    $old_result=mysqli_query($con,$old_details);
    $row=mysqli_fetch_assoc($old_result);
    $old_name=$row['Product_Name'];
    $old_des=$row['Product_Descrp'];
    $old_kw=$row['Product_KW'];
    $old_pr=$row['Product_Price'];
    if(isset($_POST['update_product']))
    {
        $pro_title=$_POST['product_title'];
        $pro_desp=$_POST['product_descrp'];
        $pro_kw=$_POST['product_kw'];
        $pro_cat=$_POST['product_cat'];
        $pro_price=$_POST['product_price'];
        $pro_status='True';

        $pro_img1=$_FILES['product_img1']['name'];
        $pro_img2=$_FILES['product_img2']['name'];
        $pro_img3=$_FILES['product_img3']['name'];

        $tpro_img1=$_FILES['product_img1']['tmp_name'];
        $tpro_img2=$_FILES['product_img2']['tmp_name'];
        $tpro_img3=$_FILES['product_img3']['tmp_name'];

        move_uploaded_file($tpro_img1,"./product_images/$pro_img1");
        move_uploaded_file($tpro_img2,"./product_images/$pro_img2");
        move_uploaded_file($tpro_img3,"./product_images/$pro_img3");

        $upd_product="update `products` set `Product_Name`='$pro_title',`Product_Descrp`='$pro_desp',`Product_KW`='$pro_kw',`Category_ID`='$pro_cat',`Product_Img1`='$pro_img1',`Product_Img2`='$pro_img2',`Product_Img3`='$pro_img3',`Product_Price`='$pro_price',`Date`=NOW(),`Product_Status`='$pro_status' where `products`.`Product_ID`=$pro_id";
        $result=mysqli_query($con,$upd_product);
        if($result)
        {
            echo"<script>alert('Product Updated Sucessfully.')</script>";
        }
    }
?>
<h4 class="text-center">UPDATE PRODUCT</h4>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo"$old_name";?>" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_descrp" class="form-label">Product Description</label>
        <input type="text" name="product_descrp" id="product_descrp" class="form-control" value="<?php echo"$old_des";?>" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_kw" class="form-label">Product Keywords</label>
        <input type="text" name="product_kw" id="product_kw" class="form-control" value="<?php echo"$old_kw";?>" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_cat" id="product_cat" class="form-select">
            <option value="">Select Category</option>
            <?php
                $select_query="select * from categories";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query))
                {
                    $cat_title=$row['Category_Name'];
                    $cat_id=$row['Category_ID'];
                    echo"<option value='$cat_id'>$cat_title</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_img1" class="form-label">Product Image 1</label>
        <input type="file" name="product_img1" id="product_img1" class="form-control" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_img2" class="form-label">Product Image 2</label>
        <input type="file" name="product_img2" id="product_img2" class="form-control" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_img3" class="form-label">Product Image 3</label>
        <input type="file" name="product_img3" id="product_img3" class="form-control" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo"$old_pr";?>" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="update_product" class="btn ip-btn w-100" value="Update Product">
    </div>
</form>