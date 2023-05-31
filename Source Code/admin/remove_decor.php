<section>
<h4 class="text-center">REMOVE DECORATOR</h4>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="row">
                <?php
                    include('../includes/connect.php');
                    $select_query="select * from `decorators`";
                    $result=mysqli_query($con,$select_query);
                    if(mysqli_num_rows($result)>0)
                    {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $name=$row['Decorator_Name'];
                        $pic=$row['Decorator_Pic'];
                        $ph = $row['Decorator_Number'];
                        $dec_id=$row['Decorator_ID'];
                        echo"<div class='col-md-3 my-3'>
                        <img src='./decorator_images/$pic' style='border-radius:50%; height:70px;' alt='$name'>
                        </div>
                        <div class='col-md-3 my-2'>
                        <h6 class='my-4'>$name</h6>
                        </div>
                        <div class='col-md-4 my-2'>
                        <h6 class='my-4'>Ph: $ph</h6>
                        </div>
                        <div class='col-md-2 my-4'>
                        <button class='border-0'><a href='index.php?del_decor=$dec_id' class='nav-link py-1 px-2'>Delete</a></button>
                        </div>";             
                    }
                    }
                    else
                    {
                        echo"<h6 class='text-center'>NO DECORATOR FOUND</h6>";
                    }
                    
                ?>                
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</section>