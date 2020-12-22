<?php 

	// connect to the database
	$conn = mysqli_connect('127.0.0.1', 'bhagat', 'bhagat', 'hotel', '3306');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	} else {
    // print_r($conn);
  }

?>