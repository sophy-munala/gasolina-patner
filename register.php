<?php

 //session_start();

include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' && password = '$pass'")or die ('query failed');

    //$result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($select_users) > 0){
 
       $message[] = 'user already exist!';
 
    }else{
 
       if($pass != $cpass){
          $message[] = 'password not matched!';
       }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name','$email', '$pass','$user_type')")or die('query failed');
             $message[] = 'Registration Succesfull!!';
             header('location:login.php');
       }
    }
 
 }
 
 ?>
   
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <?php
        if(isset($message)){
         foreach($message as $message){
             echo '<div class="message"> <span>'.$message.'</span>
            <i class="fas fa-times".onclick="this.parentElement.remove();"></i>
        </div>';
                    };
                };
         ?>

    <div class="form-container">
            <form action="" method="post">
                <h3>Sign up</h3>
                <input type="text" name="name" class="box" required placeholder="enter your name">
                <input type="email" name="email" class="box" required placeholder="example@gmail.com">
                <input type="password" name="password" class="box" required placeholder="enter your password">
                <input type="password" name="cpassword" class="box" required placeholder="confirm your password">
                <select name="user_type" id="" class="box">
                    <option value="admin">admin</option>
                    <option value="customer">customer</option>
                </select>
                <input type="submit" name="submit" value="sign up now" class="btn">
                <p>already have an account? <a href="login.php">login now</a></p>
            </form> 
        </div>
    </body>

</html>