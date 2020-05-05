<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['password'])){
        header('location:settings.php');
    }
    else
    {
    	$item_id=$_GET['item_id'];
    	$email=$_GET['email'];
    	$unique=$_GET['serial_id'];
        $confirm_query="update users_items set status='Rejected', date_and_time=current_timestamp() where serial_id=$unique";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        header('location: admin_counter.php?email='.$email.'&item_id='.$item_id.'&no=2');
    }
    ?>