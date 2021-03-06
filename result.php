<!DOCTYPE html>
<html>

<?php
	require_once('config.php');

	// Connect to server and select database.
	//mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	//mysql_select_db(DB_DATABASE)or die("cannot select DB");
	$tb_name="leaderboards"; // Table name

	// base 64 so user doesn't try to cheat
	$score=base64_decode(@$_GET['random']);
	if($score==0 || $score == null) {
		$score = 0;
	}

	$progress = intval(base64_decode(@$_GET['pg']));

	$gm = @$_COOKIE['gameMode'];

	$score = clean($score);
	$sql = "SELECT COUNT(*) + 1 AS rank FROM $tb_name WHERE gamemode = $gm AND $score <= score ;";

	//$result=mysql_query($sql);
	//$rows=mysql_fetch_array($result);
	//mysql_close();
	$rows = runQ($sql);

	$rank = empty(@$_COOKIE['rank']) ? @$rows['rank'] : @$_COOKIE['rank'];


    include('header.php');
?>

<!-- This needs to be in this PHP file to set these variables -->
<script>
	//loop result BGM for result
	BGM.loop('resources/sounds/bgm_scoreboard.mp3');
	var rank = <?php echo $rank; ?>;
	var score = <?php echo $score; ?>;
	var pg = <?php echo $progress ?>;
</script>

<?php
        // light theme    
        if($_COOKIE['theme'] == 1) {         
    ?>
    	 <link id="resultCSS" rel="stylesheet" type="text/css" href="css/result_L.css">
    <?php
        } else { // dark theme
    ?>
	    <link id="resultCSS" rel="stylesheet" type="text/css" href="css/result.css">
    <?php
        }
    ?>
    <script src='js/result.js'></script>

    	<div id='topMargin'>
    	</div>
		<div class='scoreArea'>
			<div class='score' id="score"> <?php echo $score;?> </div>
		</div>
		
		<div class='ranking'>
			Congratulations!<br>
			Rank: 

			<?php
				echo $rank;
			?>

		</div>

		<div class='result_menu'>
			<!-- the first row of bottons -->
			<div class='firstRow'>
				<input type="image" src="resources/images/result_buttons_home.png" onclick="$('#home').click()" class="homeBtn">
				<a id='home' href='./index.php' data-transition='flow' data-direction='reverse'></a>
                <input type="image" src="resources/images/result_buttons_leaderboards_post.png" value="Post Score" onclick="goPost()" class="postBtn">
				<a id='leaderboards' href='./leaderboards.php' data-transition='flow' data-direction='reverse'></a>
			</div>

			<div class='secondRow'>
                <input type="image" src="resources/images/result_buttons_level.png" onclick="goSelect()" class="selectBtn">
				<a id='difficulty' href='./difficulty.php' data-transition='flow' data-direction='reverse'></a>
                <input type="image" src="resources/images/result_buttons_retry.png" onclick="goPlay()" class="replayBtn">
				<a id='game' href='./game.php' data-transition='flow' data-direction='reverse'></a>
			</div>
		</div>

<?php include('footer.php');
