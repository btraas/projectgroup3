<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');

	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	// create date and time
	$datetime=date("d/m/y H:i:s"); 

	
	//Sanitize the POST values
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['password2']);
	
	// in case page referrer is not register page
	if($_SERVER['HTTP_REFERER'] == '') {
		header("location: ".HOMEURL);
		exit();
	}

	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}

	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	
	//Check for duplicate email address
	if($username != '') {
		$qry = "SELECT * FROM members WHERE username='$username'";

		$result = runQ($qry);
		if(count($result) > 0) {
			$errmsg_arr[] = 'Username already in use';
			$errflag = true;
		}
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: register.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO members(username, passcode, datetime) VALUES('$username','".md5($_POST['password'])."', '$datetime')";
	$result = runQ($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: login_post.php?username=".$username."&password=".$password);
		exit();
	}else {
		die("Query failed");
	}
?>
