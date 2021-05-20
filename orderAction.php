<?php 
	include "js/connection.php";

	if(isset($_POST['order'])) {
		$name=$_POST['name'];
		$surname = $_POST['surname'];
		$address = $_POST['address'];
		$telnumber = $_POST['telnumber'];
		$id_order = $_POST['id'];
		$category = $_GET['category'];

		$sql = "INSERT INTO `orders` (`name`, `surname`, `address`, `tel number`, `id_order`,`category`) VALUES ('$name','$surname','$address','$telnumber','$id_order','$category')";
		mysqli_query($connection,$sql);
		header("Location: menu.php");
	}
	else if (isset($_POST['msg_button'])) {
		$name = $_POST['name'];
		$people = $_POST['people'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		$telNumber = $_POST['telNumber'];

		$sql = "INSERT INTO `messages` (`name`, `telnumber`,`people`, `date`, `message`) VALUES ('$name','$telNumber','$people','$date','$message')";
		mysqli_query($connection,$sql);
		header("Location: /diplom Anna");
	}
 ?>