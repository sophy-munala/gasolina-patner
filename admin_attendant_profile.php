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
    mysqli_query($conn, "DELETE FROM `attendants` WHERE attendant_id = '$delete_id'")or die('query failed');
    header('location:admin_attendant_profile.php');
}

?>
<!DOCTYPE html>
<html>

    <head>
       <title>Attendant view Page</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> 
       <link rel="stylesheet" href="admin.css">
    </head>
    
    <body>
        <?php include 'admin_header.php'?>

        <section class="customers">
            <h1 class="heading">Attendants accounts</h1>
            <div class="box-container">
                <?php 
                $select_attendants = mysqli_query($conn, "SELECT * FROM `attendants`")or die('query failed');
                while ($fetch_attendants = mysqli_fetch_assoc($select_attendants)){

                 ?>
                 <div class="box">
                     <p>username: <span><?php echo $fetch_attendants['name'];?></span></p>
                     <p>email: <span><?php echo $fetch_attendants['email'];?></span></p>
                     <p>station name: <span><?php echo $fetch_attendants['station_name'];?></span></p>
                    
                     <a href="admin_attendant_profile.php?update=<?php echo $fetch_attendants['attendant_id'];?>" class= "btn">update</a>
                     <a href="admin_attendant_profile.php?delete=<?php echo $fetch_attendants['attendant_id'];?>" onclick = "return confirm('delete this attendant?');" class="delete-btn">delete</a>
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