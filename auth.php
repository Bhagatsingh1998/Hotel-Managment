<?php
	require('./templates/head.php');
	require('./config/dbConnect.php');

	if (isset($_POST['signup'])) {
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);	
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);

		if ($password == $cpassword) {
			$hash = password_hash($password, PASSWORD_DEFAULT);
			echo ($name . $email . $hash . $phone);
			$isAdmin = true;
			$sql = "INSERT INTO registrations(name, email, password, phone, isAdmin) VALUES('$name', '$email', '$hash', '$phone', $isAdmin)";
			if (mysqli_query($conn, $sql)) {
				header('Location: index.php');
			} else {
				echo 'query error' . mysqli_error($conn);
			}
		}
	}

	if(isset($_POST)) {
		$regEmail = mysqli_real_escape_string($conn, $_POST['reg-email']);
		$regPass = mysqli_real_escape_string($conn, $_POST['reg-pass']);

		
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



<?php require('./templates/end.php') ?>