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
    mysqli_query($conn, "DELETE FROM `admin` WHERE admin_id = '$delete_id'")or die('query failed');
    header('location:admin_profile.php');
}

?>
<!DOCTYPE html>
<html>

    <head>
       <title>Admin Profile Page</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> 
       <link rel="stylesheet" href="admin.css">
    </head>
    
    <body>
        <?php include 'admin_header.php'?>

        <section class="customers">
            <h1 class="heading">Admin Profile</h1>
            <div class="box-container">
                <?php 
                $select_user = mysqli_query($conn, "SELECT * FROM `admin`")or die('query failed');
                while ($fetch_user = mysqli_fetch_assoc($select_user)){

                 ?>
                 <div class="box">
                 <p>username: <span><?php echo $_SESSION['admin_name'] ?></span></p>
			     <p>email: <span><?php echo $_SESSION['admin_email'] ?></span></p>
                    
                     <a href="admin_profile.php?delete=<?php echo $fetch_user['admin_id'];?>" onclick = "return confirm('delete this customer?');" class="delete-btn">Delete</a>
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