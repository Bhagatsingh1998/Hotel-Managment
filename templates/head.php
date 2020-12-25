<?php
session_start();

if(isset($_POST['signout'])) {
	echo 'Signout';
	//  $unsetStatus = session_unset();
	unset($_SESSION['userId']);
	unset($_SESSION['userEmail']);
	unset($_SESSION['userIsAdmin']);
	 if(!$_SESSION['userId'] && !$_SESSION['userId']) {
		 header('Location: ../index.php');
	 } else {
		//  print($unsetStatus);
	 }
}
// if (isset($_SESSION)) {
$sessUserId;
$sessUserEmail;
$sessUserIsAdmin;

if (isset($_SESSION['userEmail']) && !empty($_SESSION['userEmail'])) {
	print_r($_SESSION['userId']. $_SESSION['userIsAdmin']. $_SESSION['userEmail']);
	$sessUserId = $_SESSION['userId'];
	$sessUserIsAdmin = $_SESSION['userIsAdmin'];
	$sessUserEmail = $_SESSION['userEmail'];
	echo $sessUserIsAdmin;
} else {
	$sessUserEmail = 'Guest';
	$sessUserId = 100;
	$sessUserIsAdmin = 100;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Star Hotel </title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/responsive.css">
	<link rel="stylesheet" href="/assets/css/custom.css">
	<link rel="stylesheet" href="/assets/css/profile.css">
</head>

<body>
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="/assets/images/logo.png" style="height: 80px;" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item  active"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
						<?php if ($sessUserIsAdmin == '0') { ?>
							<li class="nav-item"><a class="nav-link " href="bookRoom.php">Book A Room</a></li>
							<li class="nav-item"><a class="nav-link " href="bookFood.php">Order Food</a></li>
						<?php }?>
						<?php if ($sessUserIsAdmin == '1') { ?>
							<li class="nav-item"><a class="nav-link " href="addRoom.php">Add A Room</a></li>
							<li class="nav-item"><a class="nav-link " href="addFood.php">Add A Food</a></li>
						<?php }?>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

						<?php if ($sessUserIsAdmin == '0' || $sessUserIsAdmin == '1') { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Hi!!</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="dashbord.php">Dashbord</a>
								<form  method="POST" action="./templates/head.php" style="cursor: pointer; background-color: #d0a772;">
									<input class="dropdown-item" name="signout" type="submit" value="Sign Out" style="cursor: pointer; background-color: #d0a772;">
								</form>

							</div>
						</li>
						<?php } else { ?>
							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="auth.php" id="dropdown-a" data-toggle="dropdown">Account</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="auth.php">SignIn</a>
								<a class="dropdown-item" href="auth.php">Register</a>
							</div>
						</li>
							<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main>