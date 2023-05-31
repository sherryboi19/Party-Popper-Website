<section>
<h4 class="text-center">UPDATE CATEGORIES</h4>
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
                        $cat_id=$row['Category_ID'];
                        $cat_name=$row['Category_Name'];
                        $cat_img=$row['Category_Image'];
                        echo"<div class='col-md-4 my-2'>
                        <img src='./category_images/$cat_img' style='border-radius:50%; height:70px;' alt='$cat_name'>
                        </div>
                        <div class='col-md-6 my-4'>
                        <h6>$cat_name</h6>
                        </div>
                        <div class='col-md-2 my-4'>
                        <button class='border-0'><a href='index.php?update_category_form=$cat_id' class='nav-link py-1 px-2'>Update</a></button>
                        </div>";             
                    }
                ?>                
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</section>