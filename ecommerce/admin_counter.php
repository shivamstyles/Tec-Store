<?php
    session_start();
    require 'connection.php';
	$no=$_GET['no'];
    if($no==1)
    {
        $user_id=$_GET['id'];
        $user_authentication_query="select users_items.item_id, items.current_quantity from users_items inner join items on  users_items.item_id=items.id where status='Ordered'";
        $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
        while($row = mysqli_fetch_assoc($user_authentication_result))
        {
            $count=$row['item_id'];
            $num=$row['current_quantity']; 
            $num = $num - 1;
            $confirm_query="update items set current_quantity=$num where id=$count";
            $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        }
        header('location: success_confirm.php?id='.$user_id.'');
    }
    if($no==2)
    {
        $count=$_GET['item_id'];
        $email=$_GET['email'];
        $query = "select current_quantity from items where id=$count";
        $result=mysqli_query($con,$query) or die(mysqli_error($con));
        $row=mysqli_fetch_array($result);
        $num=$row['current_quantity']; 
        $num = $num + 1;
        $confirm_query="update items set current_quantity=$num where id=$count";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        header('location: admin_control.php?email='.$email.'');
    }
	
    ?>