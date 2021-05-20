<?php 
	
	include "../js/connection.php";

	$table = $_GET['table'];
	$id = $_GET['id'];

	$sql = "DELETE FROM `".$table."` WHERE `id` = '$id'";
	mysqli_query($connection,$sql);
	header("Location: home.php?selected=orders");

 ?>