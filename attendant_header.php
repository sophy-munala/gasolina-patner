<?php
                if(isset($message)){
                    foreach($message as $message){
             echo '<div class="message"> <span>'.$message.'</span>
            <i class="fas fa-times".onclick="this.parentElement.remove();"></i>
        </div>';
                    };
                };
         ?>

<header class="header">
	<div class="flex">
		<a href="station_page.php" class="logo"><span>Station Attendant Panel</span></a>

		<nav class="navbar">
			<a href="attendant_page.php">Home</a>
			<a href="att_products.php">Product</a>
			<a href="att_orders.php">Orders</a>			
			<a href="att_station.php">Station</a>
		</nav>
		<div class="icons">
			<div id="menu-btn" class="fas fa-bars"></div>
			<div id="user-btn" class="fas fa-user"></div>
		</div>
        
		<div class="account-box">
			<p>username: <span><?php echo $_SESSION['attendant_name'] ?></span></p>
			<p>email: <span><?php echo $_SESSION['attendant_email'] ?></span></p>
			<a href="logout.php" class="btn">Logout</a>
		</div>
	</div>
</header>