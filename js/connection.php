<?php 
	$connection = mysqli_connect('localhost','root','usbw','pizzeria');
	if ($connection == false) {
		echo "MySQL error Please check connection.php";
		exit();
	}
	mysqli_set_charset($connection,"utf8");
 ?>