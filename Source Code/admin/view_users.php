
<div class="row px-3 text-center">
    <h5 class='text-center mb-3'>All Users</h5>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>User ID</h6>
    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Name</h6>
    </div>
    <div class="col-md-3">
        <h6 class='' style='color:#F08EC0;'>Address</h6>
    </div>
    <div class="col-md-3">
        <h6 class='' style='color:#F08EC0;'>Contacts</h6>
    </div>
    <div class="col-md-2">
        <h6 class='' style='color:#F08EC0;'>Delete</h6>
    </div>
    <?php
    include('../includes/funcs.php'); 
    $get_user = "select * from `user`";
    $result_get_user = mysqli_query($con, $get_user);
    if(mysqli_num_rows($result_get_user)>0)
    {
        while($user=mysqli_fetch_assoc($result_get_user))
        {
            $id = $user['User_ID'];
            $name = $user['User_Name'];
            $email = $user['User_Email'];
            $address = $user['User_Address'];
            $phone = $user['User_Phone'];
            echo "<div class='col-md-2 my-2'>
            <h6 class=''>$id</h6>
            </div>
            <div class='col-md-2 my-2'>
                <h6 class=''>$name</h6>
            </div>
            <div class='col-md-3 my-2'>
                <h6 class=''>$address</h6>
            </div>
            <div class='col-md-3'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h7 class=''>Mail:$email</h7>
                    </div>
                    <div class='col-md-12'>
                        <h7 class='''>Ph #:$phone</h6>
                    </div>
                </div>
            </div>
            <div class='col-md-2 my-2'>
                <button class='border-0'><a href='index.php?del_user=$id' class='nav-link py-1 px-2'>Delete</a></button>
            </div>
            ";
        }
    }
    else
    {
        echo "<h5 class='text-center my-5'>No Users</h5>";
    }
?>
</div>