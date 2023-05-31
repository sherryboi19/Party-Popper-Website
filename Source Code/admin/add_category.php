<?php
    include('../includes/connect.php');
    if(isset($_POST['add_cat']))
    {
        $category_title=$_POST['cat_title'];
        $cat_img=$_FILES['cat_img']['name'];
        $tcat_img=$_FILES['cat_img']['tmp_name'];

        move_uploaded_file($tcat_img,"./category_images/$cat_img");
        $select_query="select * from categories where Category_Name='$category_title'";
        $result_select=mysqli_query($con,$select_query);
        $num=mysqli_num_rows($result_select);
        if($num>0)
        {
            echo"<script>alert('Category Already Exsist.')</script>";
        }
        else
        {
            $insert_query="insert into `categories` (Category_Name,Category_Image) values ('$category_title','$cat_img')";
            $result=mysqli_query($con,$insert_query);
            if($result)
            {
                echo"<script>alert('Category Inserted Sucessfully.')</script>";
            }
        }
    }
?>

<h4 class="text-center">ADD CATEGORY</h4>
<form action="" method="post" class="mb-2" enctype="multipart/form-data">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="cat_title" class="form-label">Category Name</label>
        <input type="text" name="cat_title" id="cat_title" class="form-control" placeholder="Enter Title" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="cat_img" class="form-label">Category Image</label>
        <input type="file" name="cat_img" id="cat_img" class="form-control" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
      <input type="submit" class="form-control ip-btn" name="add_cat" value="Add Category" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
</form>