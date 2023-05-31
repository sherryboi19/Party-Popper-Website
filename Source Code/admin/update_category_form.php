<?php
    include('../includes/connect.php');
    $cat_id=$_GET['update_category_form'];
    $old_details="select * from `categories` where Category_ID=$cat_id";
    $old_result=mysqli_query($con,$old_details);
    $row=mysqli_fetch_assoc($old_result);
    $old_name=$row['Category_Name'];
    if(isset($_POST['upd_cat']))
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
            $update_query="update `categories` set `Category_Name`='$category_title', `Category_Image`='$cat_img' where `categories`.`Category_ID`=$cat_id";
            $result=mysqli_query($con,$update_query);
            if($result)
            {
                echo"<script>alert('Category Updated Sucessfully.')</script>";
            }
        }
    }
?>

<h4 class="text-center">UPDATE CATEGORY</h4>
<form action="" method="post" class="mb-2" enctype="multipart/form-data">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="cat_title" class="form-label">Category Name</label>
        <input type="text" name="cat_title" id="cat_title" class="form-control" value="<?php echo"$old_name";?>" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="cat_img" class="form-label">Category Image</label>
        <input type="file" name="cat_img" id="cat_img" class="form-control" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
      <input type="submit" class="form-control ip-btn" name="upd_cat" value="Insert Category" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
</form>