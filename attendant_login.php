<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_attendants = mysqli_query($conn, "SELECT * FROM attendants WHERE email = '$email' && password = '$pass'")or die ('query failed');

   //$result = mysqli_query($conn, $select);

   if(mysqli_num_rows($select_attendants) > 0){
     $row = mysqli_fetch_assoc($select_attendants);
     if ($row['user_type'] == 'attendant') {
         // code...
        $_SESSION['attendant_name'] = $row['name'];
        $_SESSION['attendant_email'] = $row['email'];
        $_SESSION['attendant_id'] = $row['attendant_id'];
        header('location:attendant_page.php');
      }
     
   }else{
      $message[] = 'Incorrect email or password!';

   }

}

?>

<!DOCTYPE html>
<html>
    <head>
       <title> Attendant Login Page</title>
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
            <h3>Attendant login</h3>
            <h1>Sign into your account</h1><br>
               
                <input type="email" name="email" class="box" required placeholder="enter your email">
                <input type="password" name="password" class="box" required placeholder="******">
                <input type="submit" name="submit" value="sign in now" class="btn">
                <br>
                <a href="#">Reset password</a>
                 
            </form> 
        </div>
    </body>
</html>