<?php require('./templates/head.php') ?>

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
					<form id="contactForm">
						<div class="row">
							<div class="col-md-12">
								<h3>General Info</h3>
								<div class="col-md-12">
									<div class="form-group">
										<input id="input_date" class="datepicker picker__input form-control" name="date" type="text" value="" equired data-error="Please enter Date" placeholder="Check In Date">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input id="input_date" class="datepicker picker__input form-control" name="date" type="text" value="" equired data-error="Please enter Date" placeholder="Check Out Date">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input id="input_time" class="time form-control picker__input" required data-error="Please enter time" placeholder="Check In Time">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<select class="custom-select d-block form-control" id="person" required data-error="Please select Person">
											<option disabled selected>Select Person*</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>

										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<select class="custom-select d-block form-control" id="person" required data-error="Select Room Type">
											<option disabled selected>Select Room Type*</option>
											<option value="Delux">Delux</option>
											<option value="Single">Single</option>
											<option value="Dual">Dual </option>

										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<select class="custom-select d-block form-control" id="person" required data-error="Please select Room Number">
											<option disabled selected>Please select Room Number</option>
											<option value="1">D201</option>
											<option value="2">D302</option>
											<option value="3">D403</option>

										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<!-- <div class="col-md-6">
									<h3>Contact Details</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" required data-error="Please enter Customer name">
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Customer Email" id="email" class="form-control" name="email" required data-error="Please enter Customer email">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Customer Number" id="phone" class="form-control" name="phone" required data-error="Please enter Customer Numbar">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Id Proof" id="phone" class="form-control" name="phone" required data-error="Please enter Customer Numbar">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
								</div> -->
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Book Room</button>
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
						Customermail@gmail.com
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