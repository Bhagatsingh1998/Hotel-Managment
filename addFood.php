<?php
require('./templates/head.php');
require('./config/dbConnect.php');

if (isset($_POST['addFood'])) {

	$img = $_FILES['foodImg'];
	print_r($img);
	$imgName = $img['name'];
	$imgTempName = $img['tmp_name'];
	$imgSize = $img['size'];
	$imgError = $img['error'];
	$imgType = $img['type'];

	$imgExt = explode('.', $imgName);
	$imgActExt = strtolower(end($imgExt));

	$allowedExt = array('img', 'png', 'jpg', 'jpeg');
	if (in_array($imgActExt, $allowedExt)) {
		if ($imgError === 0) {

			// $imgNewName = uniqid('', true) . "__" . $imgName . "." . $imgActExt;
			$imgNewName = uniqid('', true) . "__" . $imgName;
			$imgDestination = "uploads/food/" . $imgNewName;
			move_uploaded_file($imgTempName, $imgDestination);

			// ///////////////////////////////////////////////////////////
			$foodId = mysqli_real_escape_string($conn, $_POST['foodId']);
			$foodName = mysqli_real_escape_string($conn, $_POST['foodName']);
			$foodType = mysqli_real_escape_string($conn, $_POST['foodType']);
			$foodCost = mysqli_real_escape_string($conn, $_POST['foodCost']);
			$foodDescription = mysqli_real_escape_string($conn, $_POST['foodDescription']);

			$adminId = mysqli_real_escape_string($conn, $sessUserId);

			$sql = "INSERT INTO foods(foodId, foodName, foodType, foodCost, foodImg, foodDescription, adminId) VALUES ('$foodId', '$foodName', '$foodType', '$foodCost', '$imgNewName', '$foodDescription', '$adminId')";
			if (mysqli_query($conn, $sql)) {
				header('Location: index.php');
			} else {
				echo 'query error' . mysqli_error($conn);
			}

			echo "Success";
		} else {
			echo "Img Error";
		}
	} else {
		echo "Wrong Ext";
	}
}

?>

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1>Add A New Food</h1>
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
					<h2>Add Food</h2>
					<p>Food Details</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-xs-12">
				<div class="contact-block">
					<form id="contactForm" method="POST" action="addFood.php" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<h3>General Info</h3>
								<div class="col-md-12">
									<div class="form-group">
										<input id="input_id" class=" form-control" name="foodId" type="text" required data-error="Please food enter Id" placeholder="Food Id">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input id="input_number" class=" form-control" name="foodName" type="text" required data-error="Please Enter Food Number" placeholder="Food Number">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="foodDescription" class=" form-control" id="" style="width: 100%;" placeholder="Food Description"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<select class="custom-select d-block form-control" name="foodType" id="type" required data-error="Please select Food Type">
											<option disabled selected>Please select Food Type</option>
											<option value="Dessert">Dessert </option>
											<option value="Healty">Healty</option>
											<option value="Junk">Junk</option>
											<option value="Spicy">Spicy</option>
											<option value="Meal">Meal</option>
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input id="input_id" class=" form-control" name="foodCost" type="number" required data-error="Please enter Cost" placeholder="Food Price">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input id="input_id" class=" form-control" accept="image/*" name="foodImg" type="file" required data-error="Please add food Img" placeholder="Food Img">
										<div class="help-block with-errors"></div>
									</div>
								</div>

							</div>

							<div class="col-md-12">
								<div class="submit-button text-center">
									<button class="btn btn-common" id="submit" name="addFood" type="submit">Add Food</button>
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