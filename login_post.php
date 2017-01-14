<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	
	//Sanitize the REQUEST values - parameters may come from GET or POST
	$username = clean($_REQUEST['username']);
	$password = clean($_REQUEST['password']);
	
	// in case page referrer is not login page
	if($_SERVER['HTTP_REFERER'] == '') {
		mysql_close();
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

	//If there are input validations, redirect back to the login form
	if($errflag) {  
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login.php");
		exit();
	}

	//Create query
	$qry="SELECT * FROM members WHERE username='$username' AND passcode='".md5($_REQUEST['password'])."'";

	$result=runQ($qry);
	
	//Check whether the query was successful or not
	if($result) {

		if(count($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = $result[0];
			$_SESSION['SESS_USERNAME'] = $member['username'];
//			$_SESSION['SESS_PASSCODE'] = $member['passcode'];
			session_write_close();

			header("location: ".HOMEURL);
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'Username or password wrong.';
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			header("location: login.php");
			exit();
		}
	}else {
		die("Query failed");
	}

?>
