<?php 
	session_start();
	$_SESSION['logged_in'] = false;
	include "../html/functional.php";
  	include "../js/connection.php";
	$selected = false;

	if($_GET['selected'] == 'orders') {
	  $sql = "SELECT * FROM `orders` ORDER BY `id` DESC";
	  $result = mysqli_query($connection,$sql);
	  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	}
	else if ($_GET['selected'] == 'messages') {
		$sql = "SELECT * FROM `messages` ORDER BY `id` DESC";
	    $result = mysqli_query($connection,$sql);
	    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$selected = true;
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Page</title>
		<?php include "../html/imports.php"; ?>
		<style type="text/css">
			  body {
				    font-size:16px;
				  }
				  body,h1,h2,h3,h4,h5 {
				    font-family: "Poppins", sans-serif;
				  }
		</style>
	</head>
	<body>
		<div class="w3-bar w3-border w3-light-grey">
		  <a href="home.php?selected=orders" class="w3-bar-item w3-button <?php if(!$selected) {echo 'w3-red';} ?>">Orders</a>
		  <a href="home.php?selected=messages" class="w3-bar-item w3-button <?php if($selected) {echo 'w3-red';} ?>">Contacts</a>
		  <a href="/diplom Anna" class="w3-bar-item w3-button">Log out</a>
		</div>
		<div class="w3-row-padding">
		<?php if($_GET['selected'] == 'orders') { 
					$i = 0;
					while($i < count($data)) {
						$id = $data[$i]['id_order'];
						$sql = "SELECT * FROM `".$data[$i]['category']."` WHERE `id` = '$id'";
						$result = mysqli_query($connection,$sql);
	  					$data_order = mysqli_fetch_all($result,MYSQLI_ASSOC);

		?>
		    <div class="w3-col m4 w3-margin-bottom">
		      <div class="w3-light-grey">
		        <img src="<?php echo $data_order[0]['image']; ?>" alt="John" style="width:100%">
		        <div class="w3-container" style="padding-bottom: 10px;">
				    <p>Name - <?php echo $data[$i]['name']; ?></p>
				    <p>Surname - <?php echo $data[$i]['surname']; ?></p>
				    <p>Address - <?php echo $data[$i]['address']; ?></p>
				    <p>Tel. Number - <?php echo $data[$i]['tel number']; ?></p>
				    <hr>
				    <p style="text-align: center; padding: 7px 0;" class="w3-red"><?php echo $data_order[0]['title']." ".$data_order[0]['price']; ?>$</p>
				    <a href="del.php?from=<?php echo $_GET['selected']; ?>&table=orders&id=<?php echo $data[$i]['id']; ?>" class="w3-button w3-red">Delete</a>
		        </div>
		      </div>
		    </div>
		<?php $i++;}} ?>
		</div>
		<div class="w3-row-padding">
		<?php if($_GET['selected'] == 'messages') { 
					$i = 0;
					while($i < count($data)) {
		?>
					    <div class="w3-col m4 w3-margin-bottom w3-padding-16">
					      <div class="w3-light-grey">
					        <div class="w3-container" style="padding-bottom: 10px;">
							    <p>Name - <?php echo $data[$i]['name']; ?></p>
							    <p>Tel. number - <?php echo $data[$i]['telnumber']; ?></p>
							    <p>Count of people - <?php echo $data[$i]['people']; ?></p>
							    <p>Date - <?php echo $data[$i]['date']; ?></p>
							    <p>Message - <?php echo $data[$i]['message']; ?></p>
							    <hr>
							    <a href="del.php?from=<?php echo $_GET['selected']; ?>&table=messages&id=<?php echo $data[$i]['id']; ?>" class="w3-button w3-red">Delete</a>
					        </div>
					      </div>
					    </div>
		<?php $i++;}} ?>
		</div>
	</body>
</html>