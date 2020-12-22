<?php require('./templates/head.php') ?>
	<?php 
		require('./config/dbConnect.php');
		if(isset($_POST['submit'])) {
			echo 'HEY'.$_POST['submit'];
			// $email = $_POST['email'];
			// $name = $_POST['name'];
			// $phone = $_POST['phone'];
			// $query = $_POST['query'];
			// $message = $_POST['message'];
			// print($email. $namem. $phone. $query. $message );

			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$phone = mysqli_real_escape_string($conn, $_POST['phone']);
			$query = mysqli_real_escape_string($conn, $_POST['query']);
			$message = mysqli_real_escape_string($conn, $_POST['message']);
			print($email. $name. $phone. $query. $message );

			$sql = "INSERT INTO contacts(email, name, phone, query, message) VALUES('$email', '$name', '$phone', '$query', '$message')";

			if(mysqli_query($conn, $sql)) {
				header('Location: index.php');
			} else {
				echo 'query error'. mysqli_error($conn);
			}
		}
	
	?>

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1>Contact</h1>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->

<!-- Start Contact -->
<div class="map-full">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3885.190516157646!2d77.60707181477257!3d13.15037959073879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1ffe35333377%3A0xc39e9d2b36830ccb!2sSir%20Mvit%20College%20Ground!5e0!3m2!1sen!2sin!4v1608533895744!5m2!1sen!2sin" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<div class="contact-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Contact</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form id="contactForm" action="contact.php" method="POST">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email address">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" placeholder="Your Phone Number" id="email" class="form-control" name="phone" required data-error="Please enter your Phone Number">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<select class="custom-select d-block form-control"  name="query" required data-error="Please Select Person">
									<option disabled selected>Select Query Type*</option>
									<option value="Related Booking a Room">Related Booking a Room</option>
									<option value="Problem in Food Services?">Problem in Food Services?</option>
									<option value="Bad Service ">Bad Service </option>
									<option value="Dirty Rooms?">Dirty Rooms?</option>
									<option value="Noisy Neighbors?">Noisy Neighbors?</option>
									<option value="Bad Smell?">Bad Smell?</option>
									<option value="Some Other Query">Some Other Query</option>
								</select>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="4" data-error="Write your message" required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="submit-button text-center">
								<button class="btn btn-common" id="submit" name="submit" type="submit">Send Message</button>
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

<!-- Start Contact info -->
<div class="contact-imfo-box">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<i class="fa fa-volume-control-phone"></i>
				<div class="overflow-hidden">
					<h4>Phone</h4>
					<p class="lead">
						+01 123-456-4590
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<i class="fa fa-envelope"></i>
				<div class="overflow-hidden">
					<h4>Email</h4>
					<p class="lead">
						yourmail@gmail.com
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<i class="fa fa-map-marker"></i>
				<div class="overflow-hidden">
					<h4>Location</h4>
					<p class="lead">
						800, Lorem Street, US
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require('./templates/end.php') ?>