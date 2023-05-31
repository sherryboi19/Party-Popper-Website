<?php
    include('../includes/connect.php');
    if(isset($_POST['add_product']))
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

        $add_product="insert into `products` (Product_Name,Product_Descrp,Product_KW,Category_ID,Product_Img1,Product_Img2,Product_Img3,Product_Price,Date,Product_Status) 
        values ('$pro_title','$pro_desp','$pro_kw','$pro_cat','$pro_img1','$pro_img2','$pro_img3','$pro_price',NOW(),'$pro_status')";
        $result=mysqli_query($con,$add_product);
        if($result)
        {
            echo"<script>alert('Product Inserted Sucessfully.')</script>";
        }
    }
?>
<h4 class="text-center">ADD PRODUCT</h4>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Title" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_descrp" class="form-label">Product Description</label>
        <input type="text" name="product_descrp" id="product_descrp" class="form-control" placeholder="Enter Description" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_kw" class="form-label">Product Keywords</label>
        <input type="text" name="product_kw" id="product_kw" class="form-control" placeholder="Enter Keywords" autocomplete="off" required="required">
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
        <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Price" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="add_product" class="btn ip-btn w-100" value="Add Product">
    </div>
</form>