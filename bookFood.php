<?php
  require('./templates/head.php');
  require('./config/dbConnect.php');

  $getAllFoodQuery = "SELECT * FROM foods";
  $getAllFoodQueryRes = mysqli_query($conn, $getAllFoodQuery);
  $getAllFoodArr = mysqli_fetch_all($getAllFoodQueryRes, MYSQLI_ASSOC);
  mysqli_free_result($getAllFoodQueryRes);

  function storeData($foodId, $conn, $sessUserId) {
    $orderTime = mysqli_real_escape_string($conn, date("d-m-Y"));
    $userId = mysqli_real_escape_string($conn, $sessUserId);
    $selectedFId = mysqli_real_escape_string($conn, $foodId);

    $sql = "INSERT INTO booked_food(orderTime, userId, foodIds) VALUES($orderTime, $userId, $selectedFId)";

    if (mysqli_query($conn, $sql)) {
      header(('Location: index.php'));
    } else {
      echo 'query error' . mysqli_error($conn);
    }
  }

  if (isset($_POST['bookFood'])) {
    foreach ($_POST as $fId) {
      if (gettype($fId) === 'array') {
        $arrayLength = sizeof($fId);
        // print_r($fId);
        $foodId = 0;
        foreach ($fId as $id) {
          $foodId = mysqli_real_escape_string($conn, $id);
          storeData($foodId, $conn, $sessUserId);
        }
      }
    }
  }

?>

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
  <div class="container text-center">
    <div class="row">
      <div class="col-lg-12">
        <h1>Book Food Rooms</h1>
      </div>
    </div>
  </div>
</div>
<!-- End All Pages -->

<!-- Start Menu -->
<div class="menu-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="heading-title text-center">
          <h2>Special Menu</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
        </div>
      </div>
    </div>

    <div class="row special-list">

      <?php foreach ($getAllFoodArr as $food) :  ?>
        <div class="col-lg-4 col-md-6 special-grid drinks">
          <div class="gallery-single fix">
            <?php echo "<img src='./uploads/food/" . $food['foodImg'] . "' onerror='imgError(event)' class='img-fluid' alt='Image'>"; ?>
            <div class="why-text">
              <div style="display: flex;">
                <h4 style="flex: 1;"><?php echo (htmlspecialchars($food['foodName'])); ?></h4>
                <span style="color: while;"><b><?php echo (htmlspecialchars($food['foodType'])); ?></b></span>
              </div>
              <p><?php echo (htmlspecialchars($food['foodDescription'])); ?></p>
              <div style="display: flex;">
                <h5 style="flex: 1;"> ₹<?php echo (htmlspecialchars($food['foodCost'])); ?></h5>
                <h3>
                  <b>
                    <input type="checkbox" class="foodCheckbox" onchange="selectFood(event, this)" <?php echo ("id='buy_" . htmlspecialchars($food['idfoods']) . "' data-price='{$food['foodCost']}'"); ?>>
                    <label <?php echo ("for='buy_" . htmlspecialchars($food['idfoods']) . "'"); ?>>BUY</label>
                  </b>
                </h3>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="contact-imfo-box">
  <div class="container">
    <div class="row" style="display: flex; justify-content: center;">
      <div style="width: 40%;">
        <i class="fa fa-money"></i>
        <div class="overflow-hidden">
          <h4>TOTAL</h4>
          <p class="lead">
            ₹ <span id="totalCost"></span>
          </p>
        </div>
      </div>
      <div>
        <form action="bookFood.php" method="post">
          <button class="btn btn-lg btn-circle" type="submit" id="bookFood" disabled name="bookFood">BUY</button>
          <div id="orderedFood"></div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Menu -->


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