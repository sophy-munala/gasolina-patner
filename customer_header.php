

	<header class="header">

	<div class="header-1">
			<div class="flex">
				<div class="share">
					<a href="#" class="fab fa-facebook"></a>
					<a href="#" class="fab fa-youtube"></a>
					<a href="#" class="fab fa-twitter"></a>
					<a href="#" class="fab fa-instagram"></a>
				</div>
				<p> new <a href="customer_login.php">Login </a>| <a href="customer_register.php">Register</a></p>
			</div>
		</div> 

		<div class="header-2">
			<div class="flex">
				<a href="#" class="logo"><i class="fas fa-gas-pump"></i>Gasoline Partner</a>
		<nav class="navbar">
			<a href="customer_page.php">Home</a>
			<a href="shop.php">Shop</a>
			<a href="cart.php">Cart</a>
			<a href="about.php">about</a>
			<a href="contact.php">contact</a>
		</nav>

		<div class="icons">
			<div class="fas fa-bars" id="menu-btn"></div>
			<a href="search_page.php" class="fas fa-search"></a>
			<div class="fas fa-user" id="user-btn"></div>
			<?php
			$select_cart_number = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id'")or die ('query failed');
			$cart_row_number = mysqli_num_rows($select_cart_number);
			?>
			<a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_row_number;?>)</span></a>


		</div>
		

		<div class="user-box">
			<p>Username :<span><?php echo $_SESSION['customer_name']?></span></p>
			<p>Email :<span><?php echo $_SESSION['customer_email'] ?></span></p>
			<a href="logout.php" class="btn">Logout</a>
		</div>
			</div>
		</div>
</header>

<?php
     if(isset($message)){
        foreach($message as $message){
          echo '
		  <div class="message"> 
		  <span>'.$message.'</span>
            <i class="fas fa-times"onclick="this.parentElement.remove();"></i>
        </div>';
                    }
                }
         ?>


