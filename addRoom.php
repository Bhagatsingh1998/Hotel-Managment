<?php 
	require('./templates/head.php');
	require('./config/dbConnect.php');

	if(isset($_POST['addRoom'])) {
		$roomId = mysqli_real_escape_string($conn, $_POST['roomId']);
		$roomName = mysqli_real_escape_string($conn, $_POST['roomName']);
		$roomType = mysqli_real_escape_string($conn, $_POST['roomType']);
		$roomNum = mysqli_real_escape_string($conn, $_POST['roomNum']);
		$roomFeature = mysqli_real_escape_string($conn, $_POST['roomFeature']);
		$adminId = mysqli_real_escape_string($conn, $sessUserId);
		// echo("aaa___".$_SESSION['userId']."____".$adminId."___");
		echo($roomId. $roomName. $roomType. $roomNum. $roomFeature. $adminId);
		$sql = "INSERT INTO rooms(roomId, roomName, roomType, roomNum, roomFeature, adminId) VALUES ('$roomId', '$roomName', '$roomType', '$roomNum', '$roomFeature', '$adminId')";

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
					<h1>Add A New Room</h1>
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
						<h2>Add Rooms</h2>
						<p>Room Details</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="contactForm" method="POST"  action="roomAdd.php">
							<div class="row">
								<div class="col-md-12">
									<h3>General Info</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input id="input_id" class=" form-control" name="roomId" type="text"  required data-error="Please enter Id" placeholder="Room Id">
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input id="input_number" class=" form-control" name="roomName" type="text"  required data-error="Please Enter Room Number" placeholder="Room Number">
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" name="roomType" id="type" required data-error="Please select Room Type">
											  <option disabled selected>Please select Room Type</option>
											  <option value="Delux">Delux</option>
											  <option value="Single">Single</option>
											  <option value="Multiple">Multiple</option>
											  
											</select>
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" name="roomNum" id="capability" required data-error="Please select Room Capability">
											  <option disabled selected>Please select Room Space</option>
											  <option value="1">1</option>
											  <option value="2">2</option>
											  <option value="3">3</option>
											</select>
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" name="roomFeature" id="capability" required data-error="Please select Room Capability">
											  <option disabled selected>Extra Features Availability? (Optional)</option>
											  <option value="Swimming Pool Side">Swimming Pool Side</option>
											  <option value="Mountain Side View">Mountain Side View</option>
											  <option value="Fresh Ventillation">Fresh Ventillation</option>
											  <option value="V.I.P">V.I.P</option>
											</select>
											<div class="help-block with-errors"></div>
										</div> 
									</div>
								</div>
							
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" name="addRoom" type="submit">Add Room</button>
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
	
	<?php require('./templates/end.php') ?>
