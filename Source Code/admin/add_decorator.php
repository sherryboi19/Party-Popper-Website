<?php
    include('../includes/connect.php');
    if(isset($_POST['add_decor']))
    {
        $name=$_POST['dec_name'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $ph=$_POST['phone'];

        $pic=$_FILES['pic']['name'];

        $tpic=$_FILES['pic']['tmp_name'];

        move_uploaded_file($tpic,"./decorator_images/$pic");

        $add_decorator="insert into `decorators` (Decorator_Name,Decorator_Email,Decorator_Address,Decorator_Number,Decorator_Pic) 
        values ('$name','$email','$address','$ph','$pic')";
        $result=mysqli_query($con,$add_decorator);
        if($result)
        {
            echo"<script>alert('Decorator Added Sucessfully.')</script>";
        }
    }
?>
<h4 class="text-center">ADD DECORATOR</h4>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="dec_name" id="name" class="form-control" placeholder="Enter Name" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="pic" class="form-label">Pic</label>
        <input type="file" name="pic" id="pic" class="form-control" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone" autocomplete="off" required="required">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="add_decor" class="btn ip-btn w-100" value="Add Decorator">
    </div>
</form>