<?php include "../html/functional.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $name; ?></title>
		<?php include "../html/imports.php" ?>
		<link rel="stylesheet" type="text/css" href="../styles/style.css">
	</head>
	<body style="padding-top: 80px;">
		<div class="w3-card-4" style="width: 40%;margin: auto;">
		  <div class="w3-container w3-green">
		    <h2>Admin Console</h2>
		  </div>
		  <form class="w3-container" action="action.php" method="post">
		  	<?php if (isset($_GET['error'])) { ?>
	     		<div class="w3-panel w3-red"><p><?php echo $_GET['error']; ?></p></div>
	     	<?php } ?>		  	
		    <p>      
		    <label class="w3-text-light-green"><b>Login</b></label>
		    <input class="w3-input w3-border" name="login" type="text" autofocus></p>
		    <p>      
		    <label class="w3-text-light-green"><b>Password</b></label>
		    <input class="w3-input w3-border" name="password" type="Password"></p>
		    <p>
		    <button class="w3-btn w3-light-green">Log In</button></p>
		  </form>
		</div>		
	</body>
</html>