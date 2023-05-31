<section>
<h4 class="text-center">ALL CATEGORIES</h4>
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="row">
                <?php
                    include('../includes/connect.php');
                    $select_query="select * from `categories`";
                    $result=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $cat_name=$row['Category_Name'];
                        $cat_img=$row['Category_Image'];
                        echo"<div class='col-md-4 my-3'>
                        <img src='./category_images/$cat_img' style='border-radius:50%; height:70px;' alt='$cat_name'>
                        </div>
                        <div class='col-md-8'>
                        <h6 class='my-4'>$cat_name</h6>
                        </div>";             
                    }
                ?>                
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</section>