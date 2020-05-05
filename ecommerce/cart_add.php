<?php
    require 'connection.php';
    //require 'header.php';
    session_start();
    $item_id=$_GET['id'];
    $item_name=$_GET['name'];
    $user_id=$_SESSION['id'];
    $user_email=$_SESSION['email'];
    $user_authentication_query="select name from users where email='$user_email'";
    $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($user_authentication_result);
    $user_name=$row['name']; 
    $add_to_cart_query="insert into users_items(user_id,user_name,email_id,item_id,item_name,status) values ('$user_id','$user_name','$user_email','$item_id', '$item_name','Added to cart')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: products.php');
?>