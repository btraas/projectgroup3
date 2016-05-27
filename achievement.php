<?php
    include('header.php'); 
	//Start session
	session_start();

	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_USERNAME'])) {
		header("location: login.php");
		exit();
	}

	$username = $_SESSION['SESS_USERNAME'];
    session_start();
    
	require_once('config.php');

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	mysql_select_db(DB_DATABASE)or die("cannot select DB");

?>

<link id="loginCSS" rel="stylesheet" type="text/css" href="css/achievement.css">

<?php include('menu_button.php'); ?>


<div class="achievement_wrapper">

<?php
	        $sql="CALL GetAchievements('$username')";

	        $result=mysql_query($sql);
            while($rows=mysql_fetch_array($result)){ // Start looping table row

?>

			<div class="achievement" id="<?php echo $rows['achievement_id']; ?>">
					<div class="achievement_ico"><img alt="achievement" src="<?php echo $rows['achievement_image']; ?>" width="50" height="100%" /></div>
					<div class="achievement_text">
						<div class="achievement_title"><?php echo $rows['achievement_name']; ?></div>
						<div class="achievement_detail"><?php echo $rows['achievement_description']; ?></div>
					</div>
			</div>

			<script>
				    var progress = document.getElementById("<?php echo $rows['achievement_id']; ?>");
				    progress.style.backgroundSize = "<?php echo $rows['percent_complete']; ?> 100%";

			</script>
<?php
	}
?>

</div>

<?php include('footer.php'); ?>
