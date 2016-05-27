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

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
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

		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Username already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
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
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: login_post.php?username=".$username."&password=".$password);
		exit();
	}else {
		die("Query failed");
	}
?>
