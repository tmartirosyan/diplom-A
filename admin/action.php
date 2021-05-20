<?php 

if (isset($_POST['login']) && isset($_POST['password'])) {
	session_start();
	$_SESSION['logged_in'] = false;
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$login = validate($_POST['login']);
	$password = validate($_POST['password']);

	if (empty($login)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		if ($login == "admin" && $password == "admin") {
			$_SESSION['logged_in'] = true;
			header("Location: home.php?selected=orders");
			exit();
		} else {
			header("Location: index.php?error=Incorect login or password");
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}