<?php
include 'config.php';
session_start();

$customer_id = $_SESSION['customer_id'];

if (!isset($customer_id)) {
	// code...
	header('location:customer_login.php');
}

if (isset($_POST['submit'])) {
    # code...
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $tel_no =  $_POST['tel_no'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $address = mysqli_real_escape_string($conn, 'flat no.'.$_POST['flat'].','. $_POST['street'].','. $_POST['county']);
    $placed_on = date('d-m-y');

    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE customer_id = '$customer_id'")or die('query failed');
    if (mysqli_num_rows($cart_query)> 0) {
        # code...
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $cart_products[] = $cart_item['name'].'('.$cart_item['quantity'].')';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }
    $total_products = implode(', ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` 
    WHERE name = '$nam' AND tel_no = '$tel_no' AND email = '$email' 
    AND payment_method = '$payment_method' AND address = '$address' AND 
    total_products = '$total_products' AND total_price = '$cart_total'")or die('query failed');

    if ($cart_total == 0) {
        # code...
        $message[] = 'Your cart is empty!!';
    }else {
        if(mysqli_num_rows($order_query)> 0){
            $message[] = 'Order already placed!!';
        }else{
        mysqli_query($conn, "INSERT INTO `orders` (customer_id, name, tel_no, email, payment_method, addres, total_products, total_price, placed_on)
         VALUES('$customer_id', '$name', '$tel_no', '$email', '$payment_method', '$address', '$total_products', '$cart_total', '$placed_on')")or die('query failed');
         $message[] = 'Order placed succesfully!!';
         mysqli_query($cann, "DELETE FROM `cart` WHERE customer_id = '$customer_id'")or die('query failed');
    }
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Check out</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>

	<?php include 'customer_header.php' ?>
    <div class="heading">
        <h3 class="heading"> <span>Checkout</span></h3>
    </div>
    <section class="display-order">
        <?php
        $grand_total = 0;
          $select_cart = mysqli_query($conn, "SELECT * FROM `cart`WHERE customer_id = '$customer_id'")or die('query failed');
          if (mysqli_num_rows($select_cart)> 0) {
            # code...
            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                # code...
                $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                $grand_total += $total_price;
        ?>
        <p><?php echo $fetch_cart['name'];?><span> (<?php echo $fetch_cart['quantity'];?>)</span></p>
        <?php
         }
        }else {
          # code...
          echo'<p class="empty">Your cart is empty</p>';
        }
        ?>
        <div class="grand-total" >Grand Total:
            <span><?php echo $grand_total;?></span>/-
        </div>
    </section>
    <section class="checkout">
        <form action="" method="post">
            <h3>Place Your orders</h3>
            <div class="flex">
                <div class="inputbox">
                    <span>Name</span>
                    <input type="text" name="name" placeholder=" your name">
                </div>
                <div class="inputbox">
                    <span> Number</span>
                    <input type="number" name="tel_no" placeholder=" your number">
                </div>
                <div class="inputbox">
                    <span>Email:</span>
                    <input type="email" name="email" placeholder=" your email">
                </div>
                <div class="inputbox">
                    <span>Payment method:</span>
                    <select name="payment method" id="">
                        <option value="mpesa">M-pesa</option>
                        <option value="cash on delivery">Cash on delivery</option>
                        <option value="paypal">Paypal</option>
                    </select>
                </div>
                <div class="inputbox">
                    <span>Address line 1:</span>
                    <input type="number" name="flat" min="0" placeholder=" e.g flat no.">
                </div>
                <div class="inputbox">
                    <span>Address line 2:</span>
                    <input type="text" name="street" min="0" placeholder=" e.g street name">
                </div>
                <div class="inputbox">
                    <span>County:</span>
                    <input type="text" name="county" placeholder=" e.g your county">
                </div>
            </div>
            <a href="transaction_page.php" class="option-btn" name="submit">Proceed to Pay</a>
            
        </form>

    </section>

	









<?php include'footer.php'; ?>

    
	<script src="script.js"></script>

</body>
</html>