<?php
    require 'connection.php';
    session_start();
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$email)){
        echo "Incorrect email. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
    if(strlen($password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
    $roll=$_POST['roll_no'];
    $contact=$_POST['contact'];
    $city=mysqli_real_escape_string($con,$_POST['city']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $duplicate_user_query="select id from users where email='$email'";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_result);
    if($rows_fetched>0){
        //duplicate registration
        //header('location: signup.php');
        ?>
        <script>
            window.alert("Email already exists in our database!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />
        <?php
    }else{
        $hash = md5( rand(0,1000) );  // Generate random 32 character hash and assign it to a local variable.
        $user_registration_query="insert into users(name,roll_no,email,password,contact,city,address,hash) values ('$name','$roll','$email','$password','$contact','$city','$address','$hash')";
        //die($user_registration_query);
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        $sid=mysqli_insert_id($con);
        // echo "User successfully registered";
        $to      = $email; // Send email to our user
        $subject = 'Signup | Verification'; // Give the email a subject 
        $message = '
         
        Thanks for signing up!
        Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
         
        ------------------------
        Username: '.$name.'
        ------------------------
         
        Please click this link to activate your account:
        http://localhost/ecommerce/activation.php?email='.$email.'&hash='.$hash.'&id='.$sid.'
         
        '; // Our message above including the link
                             
        $headers = 'From:ss.sharma1522@gmail.com' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email
        //header('location: products.php');  //for redirecting
        ?>
        <meta http-equiv="refresh" content="3;url=email_direction.php" />
        <?php
    }
    
?>