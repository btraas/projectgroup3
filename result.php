<!DOCTYPE html>
<html>

<?php
	require_once('config.php');

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	mysql_select_db(DB_DATABASE)or die("cannot select DB");
	$tb_name="leaderboards"; // Table name

	$score=base64_decode(@$_GET['random']);
	if($score==0 || $score == null) {
		$score = 0;
	}

	$gm = $_COOKIE['gameMode'];

	$score = mysql_real_escape_string($score);
	$sql = "SELECT COUNT(*) + 1 AS rank FROM $tb_name WHERE gamemode = $gm AND $score < score ;";

	$result=mysql_query($sql);
	$rows=mysql_fetch_array($result);

	include('header.php');
?>

<!-- This needs to be in this PHP file to set these variables -->
<script>
	BGM.play('resources/sounds/bgm_scoreboard.mp3');

	var rank = <?php echo $rows['rank']; ?>;
	var score = <?php echo $score; ?>;
</script>

	<link rel="stylesheet" type="text/css" href="css/result.css">
    <script src='js/result.js'></script>
    	<div id='top-margin'>
    	</div>
		<div class='scoreArea'>
			<div class='score'> <?php echo $score; ?> </div>
		</div>
		
		<div class='ranking'>
			Congratulations!<br>
			Rank: 

			<?php
				echo $rows['rank'];
				mysql_close();
			?>

		</div>

		<div class='menu'>
			<!-- the first row of bottons -->
			<div class='firstRow'>
				<input type="image" src="resources/images/result_buttons_home.png" onclick="$('#home').click()" class="homeBtn">
				<a id='home' href='./index.php' data-transition='flow' data-direction='reverse'></a>
                <input type="image" src="resources/images/result_buttons_leaderboards.png" value="Post Score" onclick="goPost()" class="postBtn">
				<a id='leaderboards' href='./leaderboards.php' data-transition='flow' data-direction='reverse'></a>
			</div>

			<div class='secondRow'>
                <input type="image" src="resources/images/result_buttons_level.png" onclick="goSelect()" class="selectBtn">
				<a id='difficulty' href='./difficulty.php' data-transition='flow' data-direction='reverse'></a>
                <input type="image" src="resources/images/result_buttons_retry.png" onclick="goPlay()" class="playBtn">
				<a id='game' href='./game.php' data-transition='flow' data-direction='reverse'></a>
			</div>
		</div>

<?php include('footer.php');
