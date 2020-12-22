<?php
session_start();

if(isset($_POST['signout'])) {
	echo 'Signout';
	//  $unsetStatus = session_unset();
	unset($_SESSION['user']);
	unset($_SESSION['userStatus']);
	 if(!$_SESSION['user'] && !$_SESSION['userStatus']) {
		 header('Location: ../index.php');
	 } else {
		 echo "aaaa";
		 print($unsetStatus);
	 }
}
// if (isset($_SESSION)) {
$sessName;
$sessStatus;

if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	print_r($_SESSION['user']);
	// print_r($_SESSION['userStatus']);
	$sessName = $_SESSION['user'];
	$sessStatus = $_SESSION['userStatus'];
} else {
	// echo "NOOO";
	$sessName = 'Hi Guest';
	$sessStatus = 100;
}
// }

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
						<li class="nav-item dropdown">
							<a class="nav-link " href="bookRoom.php">Book A Room</a>
						</li>
						<li class="nav-item dropdown">
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="blog.php">blog</a>
								<a class="dropdown-item" href="blog-details.php">blog Single</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						<?php if ($sessStatus == '0' || $sessStatus == '1') { ?>
							<!-- <li class="nav-item"><button class="nav-link">Sign Out</button></li> -->
							<li class="nav-item">
								<form class="nav-link" method="POST" action="./templates/head.php">
									<input name="signout" type="submit" value="Sign Out">
								</form>
							</li>
						<?php } else { ?>
							<li class="nav-item"><a class="nav-link" href="auth.php">Login/SignUp</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main>