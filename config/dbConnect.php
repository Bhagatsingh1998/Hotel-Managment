<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'root', 'root', 'hotel', '3306');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	} else {
    // print_r($conn);
  }

?>