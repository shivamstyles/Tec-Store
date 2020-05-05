<?php
    function out_of_stock($item_id){
        //session_start();    
        require 'connection.php';
        $user_id=$_SESSION['id'];
        $check_query="select current_quantity from items where id='$item_id'";
        $check_result=mysqli_query($con,$check_query) or die(mysqli_error($con));
        $row=mysqli_fetch_array($check_result);
        $qty=$row['current_quantity'];
        if($qty==0)
        {
            return 2;
        }
    }

    function check_if_added_to_cart($item_id){
        //session_start();    
        require 'connection.php';
        $user_id=$_SESSION['id'];
        $product_check_query="select * from users_items where item_id='$item_id' and user_id='$user_id' and status='Added to cart'";
        $product_check_result=mysqli_query($con,$product_check_query) or die(mysqli_error($con));
        $num_rows=mysqli_num_rows($product_check_result);
        if($num_rows>=1)return 1;
        return 0;
    }
?>