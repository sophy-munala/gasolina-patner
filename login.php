<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' && password = '$pass'")or die ('query failed');

   //$result = mysqli_query($conn, $select);

   if(mysqli_num_rows($select_users) > 0){
     $row = mysqli_fetch_assoc($select_users);
     if ($row['user_type'] == 'admin') {
         // code...
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        header('location:admin_page.php');
      }elseif 
      ($row['user_type'] == 'customer') {
         // code...
        $_SESSION['customer_name'] = $row['name'];
        $_SESSION['customer_email'] = $row['email'];
        $_SESSION['customer_id'] = $row['id'];
        header('location:home_page.php');
     }
     
   }else{
      $message[] = 'Incorrect email or password!';

   }

}

?>

<!DOCTYPE html>
<html>
    <head>
       <title>Login Page</title> 
       <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="form-container">
            <form action="" method="post">
                <h3>Sign in</h3>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
                <input type="email" name="email" class="box" required placeholder="enter your name">
                <input type="password" name="password" class="box"required placeholder="enter your password">
                <input type="submit" name="submit"value="sign in now" class="btn">
                <br>
                <a href="#">Forgot password?</a>
                <p>don't have an account? <a href="register.php">register now</a></p>
            </form> 
        </div>
    </body>
</html>