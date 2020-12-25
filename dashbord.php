<?php
require('./templates/head.php');
require('./config/dbConnect.php');

if (isset($_POST['foodDone'])) {
  $fId = $_POST['fid'];
  echo $fId;

  $delBookedFoodSql = "DELETE FROM booked_food WHERE idbooked_food = $fId";
  if (mysqli_query($conn, $delBookedFoodSql)) {
    header('Location: dashbord.php');
  } else {
    echo 'query error' . mysqli_error($conn);
  }
}

if (isset($_POST['roomDone'])) {
  $rId = $_POST['rid'];
  // echo $fId;

  $delBookedRoomsSql = "DELETE FROM booked_rooms WHERE idbookedRooms = $rId";
  if (mysqli_query($conn, $delBookedRoomsSql)) {
    header('Location: dashbord.php');
  } else {
    echo 'query error' . mysqli_error($conn);
  }
}




$counter = -1;
$userSql = "SELECT * from registrations WHERE idregistrations = $sessUserId";
$userRes =  mysqli_query($conn, $userSql);
$userArr = mysqli_fetch_all($userRes, MYSQLI_ASSOC);
// print_r($userArr);
mysqli_free_result($userRes);

$usersSql = "SELECT * from registrations";
$usersRes =  mysqli_query($conn, $usersSql);
$usersArr = mysqli_fetch_all($usersRes, MYSQLI_ASSOC);
// print_r($usersArr);
mysqli_free_result($usersRes);

$orderedFoodArr = [];
function extarctBookedFood()
{
  global $conn, $orderedFoodArr;
  $orderedFoodSql = "SELECT * from booked_food";
  $orderedFoodRes =  mysqli_query($conn, $orderedFoodSql);
  $orderedFoodArr = mysqli_fetch_all($orderedFoodRes, MYSQLI_ASSOC);
  // print_r($orderedFoodArr);
  mysqli_free_result($orderedFoodRes);
}

$bookedRoomsArr = [];
function extarctBookedRooms()
{
  global $conn, $bookedRoomsArr;
  $bookedRoomsSql = "SELECT * from booked_rooms";
  $bookedRoomsRes =  mysqli_query($conn, $bookedRoomsSql);
  $bookedRoomsArr = mysqli_fetch_all($bookedRoomsRes, MYSQLI_ASSOC);
  // print_r($bookedRoomsArr);
  mysqli_free_result($bookedRoomsRes);
}

if ($sessUserIsAdmin === '1') {
  $foodsSql = "SELECT * from foods";
  $foodsRes =  mysqli_query($conn, $foodsSql);
  $foodsArr = mysqli_fetch_all($foodsRes, MYSQLI_ASSOC);
  // print_r($foodsArr);
  mysqli_free_result($foodsRes);

  $roomsSql = "SELECT * from rooms";
  $roomsRes =  mysqli_query($conn, $roomsSql);
  $roomsArr = mysqli_fetch_all($roomsRes, MYSQLI_ASSOC);
  // print_r($roomsArr);
  mysqli_free_result($roomsRes);
} else {
  $userBookedRoom = [];
  $userOrderedFood = [];
}

$allBookedRoomsRows = '';
$allBookedFoodRows = '';

if (isset($_POST['edit-form-btn'])) {
  $sameEmail = false;

  $editEmail = mysqli_real_escape_string($conn, $_POST['edit-email']);
  foreach ($usersArr as $u) {
    // echo $u['email'];
    if ($u['email'] == $editEmail) {
      $sameEmail = true;
      break;
    }
  }

  if (!$sameEmail) {
    $editName = mysqli_real_escape_string($conn, $_POST['edit-name']);
    $editPhone = mysqli_real_escape_string($conn, $_POST['edit-phone']);
    $editAddress = mysqli_real_escape_string($conn, $_POST['edit-address']);

    $updateUserInfoSql = "UPDATE registrations SET name = '" . $editName . "', email = '" . $editEmail . "', phone = '" . $editPhone . "', address = '" . $editAddress . "' WHERE idregistrations = '" . $sessUserId . "'";
    echo $updateUserInfoSql;
    if (mysqli_query($conn, $updateUserInfoSql)) {
      header('Location: dashbord.php');
    } else {
      echo 'query error' . mysqli_error($conn);
    }
  } else {
    echo "Same Email Exits";
  }
}

?>


<div class="all-page-title page-breadcrumb">
  <div class="container text-center">
    <div class="row">
      <div class="col-lg-12">
        <h1>Dasbord</h1>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="main-body">
    <br><br>
    <div class="row gutters-sm">
      <div class="col-md-3 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4><?php echo $userArr[0]['name']; ?> </h4>
                <p class="text-secondary mb-1">Lorem</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <ul class="list-group list-group-flush">

            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                  <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                </svg>Twitter</h6>
              <span class="text-secondary">@User</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                  <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>Instagram</h6>
              <span class="text-secondary">User</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                </svg>Facebook</h6>
              <span class="text-secondary">User</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div style="display: flex;">
          <div style="flex: 1;"></div>
          <div style="color: green; background-color: lightgreen; padding: 0% 2%; cursor: pointer;" id="edit-btn" onclick="toggleEditForm(event)"><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </b></div>
        </div>
        <div class="card mb-3">
          <form action="dashbord.php" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $userArr[0]['name']; ?>
                  <div class="edit-form hide-ele">
                    <input type="text" name="edit-name" value="<?php echo $userArr[0]['name']; ?>">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $userArr[0]['email']; ?>
                  <div class="edit-form hide-ele">
                    <input type="email" name="edit-email" value="<?php echo $userArr[0]['email']; ?>">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $userArr[0]['phone']; ?>
                  <div class="edit-form hide-ele">
                    <input type="text" max="10" min="10" name="edit-phone" value="<?php echo $userArr[0]['phone']; ?>">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">User Type</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php
                  if ($sessUserIsAdmin === '0') {
                    echo "Customer";
                  } else {
                    echo "Admin";
                  }
                  ?>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $userArr[0]['address']; ?>
                  <div class="edit-form hide-ele">
                    <input type="text" name="edit-address" value="<?php echo $userArr[0]['address']; ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="edit-form hide-ele">
              <hr>
              <div style="display: flex; text-align: center; justify-content: center;">
                <button onclick="toggleEditForm(event)" style="color: red; background-color: salmon;"><b>Cancle</b> </button>
                <button style="color: green; background-color: lightgreen;" name="edit-form-btn" type="submit"><b> Update Info</b></button>
              </div>
            </div>
          </form>
        </div>
        <div class="row gutters-sm">
          <?php if ($sessUserIsAdmin === '1') { ?>
            <div class="col-sm-12 mb-12">
              <div class="card h-100">
                <div class="card-body">
                  <h3 class="d-flex align-items-center mb-3">Rooms</h3>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#S.No</th>
                        <th>Room Id</th>
                        <th>Room Number</th>
                        <th>Room Name</th>
                        <th>Room Type</th>
                        <th>Beds</th>
                        <th>Room Feature</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $counter = 0;
                      foreach ($roomsArr as $room) {
                        $counter++;
                        echo "
                      <tr>
                        <td>#{$counter}</td>
                        <td>" . $room['roomId'] . "</td>
                        <td>" . $room['roomNum'] . "</td>
                        <td>" . $room['roomName'] . "</td>
                        <td>" . $room['roomType'] . "</td>
                        <td>3</td>
                        <td>" . $room['roomFeature'] . "</td>
                      </tr>
                      ";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-12 mb-12">
              <div class="card h-100">
                <div class="card-body">
                  <h3 class="d-flex align-items-center mb-3">Food</h3>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#S.No</th>
                        <th>Food Id</th>
                        <th>Food Name</th>
                        <th>Food Type</th>
                        <th>Food Cost</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $counter = 0;
                      foreach ($foodsArr as $food) {
                        $counter++;
                        echo "
                      <tr>
                        <td>#{$counter}</td>
                        <td>" . $food['foodId'] . "</td>
                        <td>" . $food['foodName'] . "</td>
                        <td>" . $food['foodType'] . "</td>
                        <td>" . $food['foodCost'] . "</td>
                        <td>" . $food['foodDescription'] . "</td>
                      </tr>
                      ";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-12 mb-12">
              <div class="card h-100">
                <div class="card-body">
                  <h3 class="d-flex align-items-center mb-3">Booked Rooms</h3>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#S.No</th>
                        <th>CheckIn</th>
                        <th>CheckOut</th>
                        <th>CheckIn Time</th>
                        <th>Room Type</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      function displayAllBookedRooms()
                      {
                        echo "";
                        extarctBookedRooms();
                        global $conn, $bookedRoomsArr, $allBookedRoomsRows;
                        // print_r( $bookedRoomsArr);
                        $rowsBR = '';
                        $counter = 0;
                        foreach ($bookedRoomsArr as $br) {
                          // print_r($br);
                          $counter++;
                          $pNameSql = "SELECT name from registrations WHERE idregistrations = {$br['userId']}";
                          $pNameRes =  mysqli_query($conn, $pNameSql);
                          $pNamesArr = mysqli_fetch_all($pNameRes, MYSQLI_ASSOC);
                          mysqli_free_result($pNameRes);
                          // print_r( $pNamesArr);
                          $rowsBR .= "
                          <tr>
                            <td>#{$counter}</td>
                            <td>" . $br['checkin'] . "</td>
                            <td>" . $br['checkout'] . "</td>
                            <td>" . $br['checkinTime'] . "</td>
                            <td>" . $br['roomType'] . "</td>
                            <td>" . $pNamesArr[0]['name'] . "</td>
                            <td>
                              <form method='POST' action='dashbord.php'>
                                <input type='hidden' name='rid' value='" . $br['idbookedRooms'] . "'>
                                <button type='submit' name='roomDone' class='btn  btn-circle btn-outline-new-white' style='color: black;'>Delete</button>
                              </form>
                            </td>
                          </tr>
                          ";
                        }
                        $allBookedRoomsRows = $rowsBR;
                        echo $allBookedRoomsRows;
                      }
                      displayAllBookedRooms();


                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-12 mb-12">
              <div class="card h-100">
                <div class="card-body">
                  <h3 class="d-flex align-items-center mb-3">Ordered Food</h3>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#S.No</th>
                        <th>Food Id</th>
                        <th>Food Name</th>
                        <th>Order Time</th>
                        <th>User Name</th>
                        <th>Cost</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      function displayBookedFood()
                      {

                        extarctBookedFood();
                        echo "";
                        global $conn, $orderedFoodArr, $allBookedFoodRows;
                        $counter = 0;
                        $rowBF = "";
                        // print_r($orderedFoodArr);
                        foreach ($orderedFoodArr as $bf) {
                          // print_r($bf);
                          $eachFoodSql = "SELECT * from foods WHERE idfoods = {$bf['foodIds']}";
                          $eachFoodRes =  mysqli_query($conn, $eachFoodSql);
                          // print_r($eachFoodRes);
                          $eachFoodsArr = mysqli_fetch_all($eachFoodRes, MYSQLI_ASSOC);
                          mysqli_free_result($eachFoodRes);
                          $d = date('m/d/Y', $bf['orderTime']);

                          $pNameSql = "SELECT name from registrations WHERE idregistrations = {$bf['userId']}";
                          $pNameRes =  mysqli_query($conn, $pNameSql);
                          $pNamesArr = mysqli_fetch_all($pNameRes, MYSQLI_ASSOC);
                          mysqli_free_result($pNameRes);
                          // print("aaa".$bf['idbooked_food']);
                          $counter++;
                          $rowBF .= "
                            <tr id='rowFood" . $bf['idbooked_food'] . "'>
                              <td>#{$counter}</td>
                              <td>" . $eachFoodsArr[0]['foodId'] . "</td>
                              <td>" . $eachFoodsArr[0]['foodName'] . "</td>
                              <td>" . $d . "</td>
                              <td>" . $pNamesArr[0]['name'] . "</td>
                              <td>" . $eachFoodsArr[0]['foodCost'] . "</td>
                              <td>
                                <form method='POST' action='dashbord.php'>
                                  <input type='hidden' name='fid' value='" . $bf['idbooked_food'] . "'>
                                  <button type='submit' name='foodDone'  class='btn  btn-circle btn-outline-new-white' style='color: black;'>Delete</button>
                                </form>
                              </td>
                            </tr>
                            ";
                        }
                        $allBookedFoodRows = $rowBF;
                        echo $allBookedFoodRows;
                      }
                      displayBookedFood();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="col-sm-12 mb-12">
              <div class="card h-100">
                <div class="card-body">
                  <h3 class="d-flex align-items-center mb-3">Booked Rooms</h3>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#S.No</th>
                        <th>CheckIn</th>
                        <th>CheckOut</th>
                        <th>CheckIn Time</th>
                        <th>Room Type</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      function displayAllBookedRooms()
                      {
                        echo "";
                        extarctBookedRooms();
                        global $conn, $bookedRoomsArr, $allBookedRoomsRows, $sessUserId;
                        // print_r( $bookedRoomsArr);
                        $rowsBR = '';
                        $counter = 0;
                        foreach ($bookedRoomsArr as $br) {
                          // print_r($br);
                          if ($br['userId'] === $sessUserId) {
                            $counter++;
                            $rowsBR .= "
                          <tr>
                            <td>#{$counter}</td>
                            <td>" . $br['checkin'] . "</td>
                            <td>" . $br['checkout'] . "</td>
                            <td>" . $br['checkinTime'] . "</td>
                            <td>" . $br['roomType'] . "</td>
                          </tr>
                          ";
                          }
                        }
                        $allBookedRoomsRows = $rowsBR;
                        echo $allBookedRoomsRows;
                      }
                      displayAllBookedRooms();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-12 mb-12">
              <div class="card h-100">
                <div class="card-body">
                  <h3 class="d-flex align-items-center mb-3">Ordered Food</h3>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#S.No</th>
                        <th>Food Id</th>
                        <th>Food Name</th>
                        <th>Order Time</th>
                        <th>Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      function displayBookedFood()
                      {
                        extarctBookedFood();
                        echo "";
                        global $conn, $orderedFoodArr, $allBookedFoodRows, $sessUserId;
                        $counter = 0;
                        $rowBF = "";
                        // print_r($orderedFoodArr);
                        foreach ($orderedFoodArr as $bf) {
                          if ($sessUserId === $bf['userId']) {
                            // print_r($bf);
                            $eachFoodSql = "SELECT * from foods WHERE idfoods = {$bf['foodIds']}";
                            $eachFoodRes =  mysqli_query($conn, $eachFoodSql);
                            // print_r($eachFoodRes);
                            $eachFoodsArr = mysqli_fetch_all($eachFoodRes, MYSQLI_ASSOC);
                            mysqli_free_result($eachFoodRes);
                            $d = date('d-m-Y', strtotime($bf['orderTime']));

                            $counter++;
                            $rowBF .= "
                            <tr id='rowFood" . $bf['idbooked_food'] . "'>
                              <td>#{$counter}</td>
                              <td>" . $eachFoodsArr[0]['foodId'] . "</td>
                              <td>" . $eachFoodsArr[0]['foodName'] . "</td>
                              <td>" . $d . "</td>
                              <td>" . $eachFoodsArr[0]['foodCost'] . "</td>
                            </tr>
                            ";
                          }
                        }
                        $allBookedFoodRows = $rowBF;
                        echo $allBookedFoodRows;
                      }
                      displayBookedFood();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <?php }; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>
<?php
require('./templates/end.php');


?>