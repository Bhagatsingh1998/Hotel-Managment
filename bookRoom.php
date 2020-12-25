<?php 
	require('./templates/head.php'); 
	require('./config/dbConnect.php');

	if(isset($_POST['bookRoom'])) {
		$checkin = mysqli_real_escape_string($conn, $_POST['checkin']);
		$checkout = mysqli_real_escape_string($conn, $_POST['checkout']);
		$checkTime = mysqli_real_escape_string($conn, $_POST['checkTime']);
		$persons = mysqli_real_escape_string($conn, $_POST['persons']);
		$roomType = mysqli_real_escape_string($conn, $_POST['roomType']);
		$userId = mysqli_real_escape_string($conn, $sessUserId);

		echo $checkin.$checkout.$checkTime.$persons.$roomType.$userId;
		$sql = "INSERT INTO booked_rooms(checkin, checkout, checkinTime, persons, roomType, userId) VALUES('$checkin', '$checkout', '$checkTime', '$persons', '$roomType', '$userId')";

		if(mysqli_query($conn, $sql)) {
			header('Location: index.php');
		} else {
			echo 'query error' . mysqli_error($conn);
		}
	}

?>

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1>Book Instant Rooms</h1>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->

<!-- Start Reservation -->
<div class="reservation-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Sanitized Rooms with premium features</h2>
					<p>Book Customer rooms now</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-xs-12">
				<div class="contact-block">
					<form id="contactForm" method="POST" action="bookRoom.php">
						<div class="row">
							<div class="col-md-12">
								<h3>General Info</h3>
								<div class="col-md-12">
									<div class="form-group">
										<input id="input_date" class="datepicker picker__input form-control" name="checkin" type="date" equired data-error="Please enter Date" placeholder="Check In Date">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input id="input_date" class="datepicker picker__input form-control" name="checkout" type="date"  equired data-error="Please enter Date" placeholder="Check Out Date">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input id="input_time" class="time form-control picker__input" type="time" name="checkTime" required data-error="Please enter time" placeholder="Check In Time">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<select name="persons" class="custom-select d-block form-control" id="person" required data-error="Please select Person">
											<option disabled selected>Select Person*</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<select name="roomType" class="custom-select d-block form-control" id="person" required data-error="Select Room Type">
											<option disabled selected>Select Room Type*</option>
											<option value="Single">Single</option>
											<option value="Dual">Dual </option>
											<option value="Delux">Delux</option>
											<option value="Primium">Primium</option>
											<option value="V.I.P">V.I.P</option>
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<!-- <div class="col-md-12">
									<div class="form-group">
										<select name="roomNum" class="custom-select d-block form-control" id="person" required data-error="Please select Room Number">
											<option disabled selected>Please select Room Number</option>
											<option value="1">D101</option>
											<option value="2">D302</option>
											<option value="3">D303</option>
											<option value="3">D404</option>
											<option value="3">D505</option>
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div> -->
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" name="bookRoom" type="submit">Book Room</button>
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
</div>
<!-- End Reservation -->

<!-- Start Customer Reviews -->
<div class="customer-reviews-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Customer Reviews</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 mr-auto ml-auto text-center">
				<div id="reviews" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner mt-4">
						<div class="carousel-item text-center active">
							<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="./assets/images/profile-1.jpg" alt="">
							</div>
							<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
							<h6 class="text-dark m-0">Web Developer</h6>
							<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
						</div>
						<div class="carousel-item text-center">
							<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="./assets/images/profile-3.jpg" alt="">
							</div>
							<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
							<h6 class="text-dark m-0">Web Designer</h6>
							<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
						</div>
						<div class="carousel-item text-center">
							<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="./assets/images/profile-7.jpg" alt="">
							</div>
							<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
							<h6 class="text-dark m-0">Seo Analyst</h6>
							<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
						</div>
					</div>
					<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Customer Reviews -->

<?php require('./templates/end.php') ?>