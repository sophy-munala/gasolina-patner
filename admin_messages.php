<?php
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
}
?>
<!DOCTYPE html>
<html>

    <head>
       <title>Contact Us</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> 
       <link rel="stylesheet" href="admin.css">
    </head>
    
    <body>
        <?php include 'admin_header.php'?>
        <section class="messages">
            <h1 class="heading">messages</h1>
            <div class="box-container">
                <?php 
                $select_messages = mysqli_query($conn, "SELECT * FROM `messages`")or die('query failed');
                if (mysqli_num_rows($select_messages) >0) {
                    // code...
                    while($fetch_messages = mysqli_fetch_assoc($select_messages)){
                 ?>
                 <div class="box">
                    <p>name: <span><?php echo $fetch_messages['name'] ?></span></p>
                    <p>number: <span><?php echo $fetch_messages['tel_no'] ?></span></p>
                    <p>email: <span><?php echo $fetch_messages['email'] ?></span></p>
                    <p>message: <span><?php echo $fetch_messages['message'] ?></span></p>
                    <a href="admin_messages.php?update=<?php echo $fetch_messages['message_id'];?>" class= "btn">Reply</a>
                    <a href="admin_messages.php?delete=<?php echo $fetch_messages['message_id'];?>" onclick = "return confirm('delete this message?');" class="delete-btn">Delete</a>
                 </div>
                 <?php 
             };
                     }else{
                        echo '<p class="empty">you do not have any messages yet!!</p>';
                     }
                  ?>
                
            </div>
            
        </section>


       







        <script src="admin_script.js"></script>
    </body>
</html>