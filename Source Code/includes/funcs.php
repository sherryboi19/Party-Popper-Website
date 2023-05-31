<?php
    include('connect.php');
    function getIPAddress() {  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) 
    {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
    {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
//whether ip is from the remote address  
    else
    {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
    }  
    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  

    //cart function
    function add_to_cart()
    {
        global $con;
        if(isset($_GET['add_to_cart']))
        {
            $ip=getIPAddress();
            $cart_query="select * from `cart` where User_IP='$ip'";
            $cart_result=mysqli_query($con,$cart_query);
            $num=mysqli_num_rows($cart_result);
            if($num==0)
            {
                $create_cart="insert into `cart` (User_IP) values ('$ip')";
                $create_result=mysqli_query($con,$create_cart);
            }
            $cart_query1="select * from `cart` where User_IP='$ip'";
            $cart_result1=mysqli_query($con,$cart_query);
            $row=mysqli_fetch_assoc($cart_result1);
            $cartid=$row['Cart_ID'];
            $get_pro_id=$_GET['add_to_cart'];
            $select_query="select * from `cart_item` where Cart_ID=$cartid and Product_ID=$get_pro_id";
            $select_result=mysqli_query($con,$select_query);
            $num1=mysqli_num_rows($select_result);
            if($num1>0)
            {
                echo "<script>alert('Item Already in Cart.')</script>";
                echo "<script>window.open('index.php')</script>";
            }
            else
            {
                $insert_query="insert into `cart_item` (Cart_ID,Product_ID,Qty) values ($cartid,$get_pro_id,1)";
                $insert_result=mysqli_query($con,$insert_query);
            }

        }
    }
?>