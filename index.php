<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="home.css">
    </head>
    <body>
    <?php include 'index_header.php' ?>

    <section class="index" id="home">
		<div class="content">
			<h3>best<span> automotive & fuel delivery </span>at your door step</h3>
			<p>We stand for something good in everything we do, by carefully sourcing premium products.</p>
			<a href="customer_login.php" class="btn">Discover More</a>
		</div>
	</section>

    <!--services section-->
	<section class="service" id="service">
		<h1 class="heading">our <span> services</span></h1>
		<div class="box-container">
			<div class="box">
				<img src="image/deliver.png">
				<h3>Free delivery</h3>
				<p>we offer free delivery services in places around Trans-nzoia couty</p>
				<a href="#" class="btn">read more</a>
			</div>
			<div class="box">
				<img src="wash.png">
				<h3>Car wash services</h3>
				<p>we offer free delivery services in places aroung Trans-nzoia couty</p>
				<a href="#" class="btn">read more</a>
			</div>
			<div class="box">
				<img src="tyre.jpg">
				<h3>Tyre Change</h3>
				<p>we change tyre and check pressure for you</p>
				<a href="#" class="btn">read more</a>
			</div>
			<div class="box">
				<img src="pay.webp">
				<h3>Easy payment</h3>
				<p>we have several methods of payment</p>
				<a href="#" class="btn">read more</a>
			</div>
		</div>
	</section>

	<?php include'footer.php'; ?>
    </body>
</html>