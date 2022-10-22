<?php
include 'config.php';
session_start();

$customer_id = $_SESSION['customer_id'];

if (!isset($customer_id)) {
	// code...
	header('location:customer_login.php');
}

if(isset($_POST['send'])){
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$tel_no = $_POST['tel_no'];
	$msg = mysqli_real_escape_string($conn, $_POST['message']);

	$select_message = mysqli_query($conn, "SELECT * FROM `messages` 
	WHERE name = '$name' AND email = '$email' AND tel_no = '$tel_no' AND message = '$msg'")or die('query failed');

	if (mysqli_num_rows($select_message) > 0) {
		$message[] = 'message already sent';
	}else{
		mysqli_query($conn, "INSERT INTO `messages`(customer_id, name, email, tel_no, message) VALUES ('$customer_id','$name', '$email', '$tel_no', '$msg' )")or die('query failed') ;
		$message[] = 'message sent succesfully!!';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">
    
</head>

<body>

	<?php include 'customer_header.php' ?>
	<div class="title">
		<h3>Contact us</h3>
        <p><a href="home.php">Home</a>/ contact</p>
	</div>
	<section class="contact">
		<form action="" method="post">
			<h3>Get in touch!!</h3>
			<input type="text" name="name" placeholder="enter your name" class="box">
			<input type="email" name="email" placeholder="enter your email" class="box">
			<input type="number" name="tel_no" placeholder="enter your phone number" class="box">
			<textarea name="message" placeholder="message here" class="box" id="" cols="30" rows="10"></textarea>
			<input type="submit" value="send message" class="btn" name="send">
		</form>

	</section>

	









<?php include'footer.php'; ?>

    
	<script src="script.js"></script>

</body>
</html>