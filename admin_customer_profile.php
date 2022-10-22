<?php
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
}

if (isset($_GET['delete'])) {
    // code...
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `customer` WHERE customer_id = '$delete_id'")or die('query failed');
    header('location:admin_customer_profile.php');
}

?>
<!DOCTYPE html>
<html>

    <head>
       <title>Admin customer Profile</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> 
       <link rel="stylesheet" href="admin.css">
    </head>
    
    <body>
        <?php include 'admin_header.php'?>

        <section class="customers">
            <h1 class="heading">Users accounts</h1>
            <div class="box-container">
                <?php 
                $select_users = mysqli_query($conn, "SELECT * FROM `customer`")or die('query failed');
                while ($fetch_users = mysqli_fetch_assoc($select_users)){

                 ?>
                 <div class="box">
                     <p>username: <span><?php echo $fetch_users['name'];?></span></p>
                     <p>email: <span><?php echo $fetch_users['email'];?></span></p>
                     <p>tel number: <span><?php echo $fetch_users['tel_no'];?></span></p>
                    
                     <a href="admin_customer_profile.php?delete=<?php echo $fetch_users['customer_id'];?>" onclick = "return confirm('delete this customer?');" class="delete-btn">Delete</a>
                 </div>
                 <?php
                 } {
                    
                } 

                  ?>
            </div>
            
        </section>


       







        <script src="admin_script.js"></script>
    </body>
</html>