<section>
<h4 class="text-center">VIEW DECORATORS</h4>
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
                        $mail = $row['Decorator_Email'];
                        echo "<div class='col-md-3 my-3'>
                        <img src='./decorator_images/$pic' style='border-radius:50%; height:70px;' alt='$name'>
                        </div>
                        <div class='col-md-4 my-2'>
                        <h6 class='my-4'>$name</h6>
                        </div>
                        <div class='col-md-5 my-2'>
                        <h6 class='my-1'>Ph # : $ph</h6>
                        <br>
                        <h6 class='my-1'>Mail : $mail</h6>
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