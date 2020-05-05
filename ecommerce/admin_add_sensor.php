<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['password'])){
        header('location:settings.php');
    }
    else
    {
        $add=$_POST['add_no'];
    	$id=$_GET['id'];
        $confirm_query="select current_quantity, total_quantity from items where id=$id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        $row=mysqli_fetch_array($confirm_query_result);
        $current_quantity=$row['current_quantity'] + $add;
        $total_quantity=$row['total_quantity'] + $add;

        $confirm_query="update items set current_quantity='$current_quantity' where id=$id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        $confirm_query="update items set total_quantity='$total_quantity' where id=$id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        header('location: admin_sensor_enquiry.php?id='.$id.'');
    }
    ?>