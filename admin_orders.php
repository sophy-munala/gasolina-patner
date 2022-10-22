<?php
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
}


if (isset($_POST['update_order'])) {
    // code...
    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE order_id = '$order_update_id'")or die('query failed');
    $message[] = 'payment status has been updated!!';
}

if (isset($_GET['delete'])) {
    // code...
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `orders` WHERE order_id = '$delete_id'")or die('query failed');
    header('location:admin_orders.php');
}
?>

<!DOCTYPE html>
<html>

    <head>
       <title>Orders</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> 
       <link rel="stylesheet" href="admin.css">
    </head>
    
    <body>
        <?php include 'admin_header.php'?>

        <!-- customers orders placed-->
        <section class="orders">
            <h1 class="heading">Placed Orders</h1>
            <div class="box-container">
                <?php 
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders`")or die('query failed');
                if (mysqli_num_rows($select_orders) >0 ) {
                    // code...
                    while($fetch_orders = mysqli_fetch_assoc($select_orders)){

                 ?>
                 <div class="box">

                    <p>customer id: <span><?php echo $fetch_orders ['customer_id']; ?></span></p>
                    <p>name: <span><?php echo $fetch_orders ['name']; ?></span></p>
                    <p>email: <span><?php echo $fetch_orders ['email']; ?></span></p>
                    <p>Phone Number: <span><?php echo $fetch_orders ['tel_no']; ?></span></p>
                    <p>address: <span><?php echo $fetch_orders ['address']; ?></span></p>
                    <p>placed on: <span><?php echo $fetch_orders ['placed_on']; ?></span></p>
                    <p>total products: <span><?php echo $fetch_orders ['total_products']; ?></span></p>
                    <p>total price: <span><?php echo $fetch_orders ['total_price']; ?>/-</span></p>
                    <p>payment method: <span><?php echo $fetch_orders ['payment_method']; ?></span></p>

                    <form method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['order_id'];?>">
                        <select name="update_payment"> 
                            <option value="" selected disabled><?php echo $fetch_orders['payment_status'];?></option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>

                        <input type="submit" value="update" name="update_order" class="btn">
                        <a href="admin_orders.php?delete=<?php echo $fetch_orders['order_id'];?>" onclick = "return confirm('are you sure you want to delete this order?');" class="delete-btn">delete</a>

                        
                    </form>
                     
                 </div>
                 <?php 
                     }
                }else{
                    echo '<p class="empty">No orders placed yet!!</p>';
                }
                  ?>
            </div>
            

            
        </section>


       







        <script src="admin_script.js"></script>
    </body>
</html>