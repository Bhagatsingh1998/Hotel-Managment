<?php
require('./templates/head.php');
require('./config/dbConnect.php');

unset($_SESSION['userId']);
unset($_SESSION['userEmail']);
unset($_SESSION['userIsAdmin']);
session_destroy();

if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);

	if ($password == $cpassword) {
		$hash = password_hash($password, PASSWORD_DEFAULT);
		echo ($name . $email . $hash . $phone);
		$isAdmin = '0';
		$sql = "INSERT INTO registrations(name, email, password, phone, address, isAdmin) VALUES('$name', '$email', '$hash', '$phone',' $address', '$isAdmin')";
		if (mysqli_query($conn, $sql)) {
			header('Location: index.php');
		} else {
			echo 'query error' . mysqli_error($conn);
		}
	}
}


if (isset($_POST['login'])) {
	$regEmail = mysqli_real_escape_string($conn, $_POST['reg-email']);
	$regPass = mysqli_real_escape_string($conn, $_POST['reg-pass']);

	// write query for all emails
	$allEmailsSql = "SELECT * from registrations";
	// get the result set (set of rows)
	$allEmalsRes =  mysqli_query($conn, $allEmailsSql);
	// fetch the resulting rows as an array
	$allEmailsArr = mysqli_fetch_all($allEmalsRes, MYSQLI_ASSOC);
	// print_r($allEmailsArr);

	// free the $result from memory (good practise)
	mysqli_free_result($allEmalsRes);

	foreach ($allEmailsArr as $e) :
		// print_r($e);
		if ($regEmail == $e['email']) {
			$verfiyPassword = password_verify($regPass, $e['password']);
			if ($verfiyPassword) {
				echo ("CORRECT");
				session_start();
				$_SESSION['userEmail'] = $regEmail;
				$_SESSION['userIsAdmin'] = $e['isAdmin'];
				$_SESSION['userId'] = $e['idregistrations'];

				echo $_SESSION['userEmail'] . $_SESSION['userIsAdmin'] . $_SESSION['userId'];
				header('Location: index.php');
			} else {
				echo "INCORRECT";
			}
		}
	endforeach;


	// close connection
	mysqli_close($conn);
}

?>

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1>Login/Signup</h1>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->

<!-- Start Contact -->

<div class="contact-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<p>Login or create a new account</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<form id="contactForm" action="auth.php" method="POST">
					<div class="row">
						<div class="col-md-12">
							<h2>Signup</h2>
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="email" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email address">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" placeholder="Your Phone Number" id="phone" class="form-control" name="phone" required data-error="Please enter your Phone Number">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" placeholder="Your Address" id="address" class="form-control" name="address" required data-error="Please enter your Address">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="password" placeholder="Passowrd" id="password" name="password" class="form-control" name="name" required data-error="Please enter your Phone Number">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" class="form-control" name="name" required data-error="Please enter your Phone Number">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">

							<div class="submit-button text-center">
								<button class="btn btn-common" id="submit" name="signup" type="submit">Signup</button>
								<div id="msgSubmit" class="h3 text-center hidden"></div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="col-lg-6">
				<h2>Login</h2>
				<form id="contactForm" action="auth.php" method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="email" placeholder="Your Email Id" id="email" class="form-control" name="reg-email" required data-error="Please enter your password">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="password" placeholder="Your Password" id="email" class="form-control" name="reg-pass" required data-error="Please enter your password">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="submit-button text-center">
								<button class="btn btn-common" id="submit" type="submit" name="login">Login</button>
								<div id="msgSubmit" class="h3 text-center hidden"></div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Contact -->



<?php require("./templates/end.php") ?>