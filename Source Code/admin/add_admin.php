<?php
    include('../includes/connect.php');
    if(isset($_POST['add_adm']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $pass_hash=password_hash($pass, PASSWORD_DEFAULT);
        $select_query="select * from `admins` where Admin_Name='$name' OR Admin_Email='$email'";
        $result_select=mysqli_query($con,$select_query);
        $num=mysqli_num_rows($result_select);
        if($num>0)
        {
            echo"<script>alert('Account Already Exist Try Another Username/Email')</script>";
        }
        else
        {
            $insert_query="insert into `admins` (Admin_Name,Admin_Email,Admin_Password) values ('$name','$email','$pass_hash')";
            $result=mysqli_query($con,$insert_query);
            if($result)
            {
                echo"<script>alert('Admin Added Sucessfully.')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }
?>

<h4 class="text-center">ADD ADMIN</h4>
<form action="" method="post" class="mb-2" enctype="multipart/form-data">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="name" class="form-label">Admin Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Title" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="email" class="form-label">Admin Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Title" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="pass" class="form-label">Admin Password</label>
        <input type="text" name="pass" id="pass" class="form-control" placeholder="Enter Title" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
      <input type="submit" class="form-control ip-btn" name="add_adm" value="Add Admin" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
</form>