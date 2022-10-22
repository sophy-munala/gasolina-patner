<?php
include 'config.php';
session_start();

$customer_id = $_SESSION['customer_id'];

if (!isset($customer_id)) {
	// code...
	header('location:customer_login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Orders</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>

	<?php include 'customer_header.php' ?>
    <div class="heading">
        <h3 class="heading">your <span>Placed Orders</span></h3>
    </div>

    <section class="placed-orders">
        
        <div class="box-container">
            <?php
            $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE customer_id = '$customer_id'")
            or die('query failed');
            if(mysqli_num_rows($order_query) > 0) {
               while ($fetch_orders = mysqli_fetch_assoc($order_query)) { 
            ?>
            <div class="box">
            <p>Placed on: <span><?php echo $fetch_orders['placed_on'];?></span></p>
            <p>Name: <span><?php echo $fetch_orders['name'];?></span></p>
            <p>Number: <span><?php echo $fetch_orders['tel_no'];?></span></p>
            <p>Email: <span><?php echo $fetch_orders['email'];?></span></p>
            <p>Address: <span><?php echo $fetch_orders['address'];?></span></p>
            <p>Method of payment: <span><?php echo $fetch_orders['payment_method'];?></span></p>
            <p>Items Ordered: <span><?php echo $fetch_orders['total_products'];?></span></p>
            <p>Placed on: <span><?php echo $fetch_orders['placed_on'];?></span></p>
            <p>Total price: <span><?php echo $fetch_orders['total_price'];?>/-</span></p>
            <p>Payment status: <span style="color:<?php if ($fetch_orders ['payment_status'] == 'pending'){echo 'red';}else{echo'orange';}?>;"><?php echo $fetch_orders['payment_status'];?></span></p>
            </div>
             <?php
             }
            }else{
                echo '<p class="empty">No orders placed yet!!</p>';
            }
             ?>
 
        </div>
       
       
    </section>

	









<?php include'footer.php'; ?>

    
	<script src="script.js"></script>

</body>
</html>