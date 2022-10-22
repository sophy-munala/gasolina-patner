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
	<title>About Us</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" href="home.css">
    
</head>

<body>

	<?php include 'customer_header.php' ?>

	<div class="title">
	<h1 class="heading"> <span>about</span> us</h1>
	<p><a href="home.php">home</a> /about</p>

	</div>

	<!--about section -->
	<section class="about" id="about">
	 
		<div class="flex">
			<div class="image">
				<img src="image/about.jpg" alt="">
			</div>

			<div class="content">
				<h3>why choose us!!</h3>
				<p>gewyghbfhvwedyfeudnbhdgetgvwjhbsduyghwb
					ajkhuygcwfgednmmmmmmmmmgvbn chygjkwakigeghbdbhhgghcvbcnbsujyegvjkdu
					iwrydfwuodhpiebkhewvj encioewyfiyehcbkjmcopuiudgwejhbc,msqncjuqgdy2ehd92w
					jdp3tr73egfpowejkfierfhsdcndjgfetfyoi</p>
				<a href="contact.php" class="btn">contact us</a>

			</div>

		</div>

	</section>

	<section class="reviews">
		<h1 class="heading"><span>Customer's</span> Reviews</h1>
		<div class="box-container">
            <div class="box">
				<img src="reviews/pers3.jpg" alt="">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's 
					 </p>
				<div class="stars">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star-half-alt"></i>
				</div>
				<h3>Joseph Kisaka</h3>
			</div>

			<div class="box">
				<img src="reviews/pers1.jpg" alt="">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's 
					 </p>
				<div class="stars">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star-half-alt"></i>
				</div>
				<h3>Ariel Sole</h3>
			</div>

			<div class="box">
				<img src="reviews/pers2.jpg" alt="">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's 
					 </p>
				<div class="stars">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star-half-alt"></i>
				</div>
				<h3>Julius Etiang'</h3>
			</div>

            <div class="box">
				<img src="reviews/pers4.jpg" alt="">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's 
					 </p>
				<div class="stars">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star-half-alt"></i>
				</div>
				<h3>Charity Cherry'</h3>
			</div>
			<div class="box">
				<img src="reviews/pers5.jpg" alt="">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's 
					 </p>
				<div class="stars">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star-half-alt"></i>
				</div>
				<h3>Sophy Mnalah</h3>
			</div>
			<div class="box">
				<img src="reviews/pers6.jpg" alt="">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     Lorem Ipsum has been the industry's 
					 </p>
				<div class="stars">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star-half-alt"></i>
				</div>
				<h3>Samuel Okiru</h3>
			</div>
		</div>

	</section>

	









<?php include'footer.php'; ?>

    
	<script src="script.js"></script>

</body>
</html>