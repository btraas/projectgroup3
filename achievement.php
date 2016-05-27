<?php
    include('header.php'); 
	//Start session
	session_start();

	//Check whether the session variable SESS_USERNAME is present or not
	if(!isset($_SESSION['SESS_USERNAME'])) {
		header("location: login.php");
		exit();
	}

	$username = $_SESSION['SESS_USERNAME'];
    
	require_once('config.php');
	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	mysql_select_db(DB_DATABASE)or die("cannot select DB");

?>


<script src='js/achievement.js'></script>
<link id="loginCSS" rel="stylesheet" type="text/css" href="css/achievement.css">

<?php include('menu_button.php'); ?>


<div class="achievement_wrapper">

<?php
	        $sql="CALL GetAchievements('$username')";

	        $result=mysql_query($sql);
            while($rows=mysql_fetch_array($result)){ // Start looping

?>
			<div class="achievement_row" style="background-size: <?php echo $rows['percent_complete']; ?>% 100% ">
				<div class="achievement_percentage"><?php echo $rows['percent_complete']; ?>%</div>
				<div class="achievement_icon"><img alt="achievement" src="<?php echo $rows['achievement_image']; ?>" width="40" height="100%" /></div>
					<div class="achievement_text">
						<div class="achievement_title"><?php echo $rows['achievement_name']; ?></div>
						<div class="achievement_detail"><?php echo $rows['achievement_description']; ?></div>
					</div>
					
			</div>
<?php
	}
?>

</div>

<?php include('footer.php'); ?>
