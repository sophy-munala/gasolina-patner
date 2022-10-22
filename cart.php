<?php
include 'config.php';
session_start();

$customer_id = $_SESSION['customer_id'];

if (!isset($customer_id)) {
	// code...
	header('location:customer_login.php');
}

if (isset($_POST['cart-update'])) {
    # code...
    $cartid = $_POST['cart-id'];
    $cartqty = $_POST['cart-qty'];

    mysqli_query($conn, "UPDATE `cart` SET quantity = '$cartqty' WHERE cart_id = '$cartid'")or die('query failed');
    $message[] = 'The quantity in the cart is updated';
}
if (isset($_GET['delete'])) {
    # code...
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = '$delete_id'")or die('query failed');
    header('location:cart.php');
}
if (isset($_GET['delete_all'])) {
    # code...
    mysqli_query($conn, "DELETE FROM `cart` WHERE customer_id = '$customer_id'")or die('query failed');
    header('location:cart.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>

	<?php include 'customer_header.php' ?>
    <div class="heading">
        <h3 class="heading">your <span>shopping</span> Cart</h3>
    </div>

    <section class="shopping-cart">
       
        <div class="box-container">
            <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE customer_id = '$customer_id'")or die('query failed');
            if (mysqli_num_rows($select_cart) >0) {
                # code...
                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    # code...
            ?>
            <div class="box">
                <a href="cart.php?delete=<?php echo $fetch_cart['cart_id'];?>" class="fas fa-trash" onclick="return confirm ('Delete this product form the cart?!!');"></a>
                <img src="image/<?php echo $fetch_cart['image'];?>" alt="">
                <div class="name"><?php echo $fetch_cart['name'];?></div>
                <div class="price"><?php echo $fetch_cart['price'];?>/-</div>
                <form action=""method="post">
                    <input type="hidden" name="cart-id" value="<?php echo $fetch_cart['cart_id'];?>">
                    <input type="number"  min="1" name="cart-qty" value="<?php echo $fetch_cart['quantity'];?>">
                    <input type="submit" name="cart-update" class="update-btn" value="update">
                </form>
                <div class="sub-total">Sub Total : <span><?php echo $sub_total = 
                ($fetch_cart['quantity']* $fetch_cart['price']);?></span>/-</div>
            </div>
            <?php
            $grand_total += $sub_total; 
             }
            }else{
              echo'<p class="empty">Your cart is empty</p>';
            }
            ?>
            
        </div>
          <div style="margin-top: 2rem; text-align:center;">
        <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?
                '':'disabled';?>" onclick="return confirm('Delete everything form the cart?!!');">Clear All</a>
          </div>
          <div class="cart-total">
            <p>Grand Total: <span><?php echo $grand_total;?></span>/-</p>
            <div class="flex">
                <a href="shop.php" class="option-btn">Continue Shopping</a>
                <a href="checkout.php" class="update-btn <?php echo ($grand_total > 1)?
                '':'disabled';?>">Proceed to Checkout</a>
            </div>
          </div>
    </section>

	









<?php include'footer.php'; ?>

    
	<script src="script.js"></script>

</body>
</html>