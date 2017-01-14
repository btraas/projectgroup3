<?php
    require_once('config.php');

    // Connect to server and select database.
    //mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
    //mysql_select_db(DB_DATABASE)or die("cannot select DB");
    $tb_name="leaderboards"; // Table name

	include('header.php');
?>

 <?php
        // light theme    
        if($_COOKIE['theme'] == 1) {         
    ?>
        <link id="leaderboardsCSS" rel="stylesheet" type="text/css" href="css/leaderboards_L.css">
    <?php
        } else { // dark theme
    ?>       
        <link id="leaderboardsCSS" rel="stylesheet" type="text/css" href="css/leaderboards.css">
    <?php
        }
    ?>


<script src='js/leaderboards.js'></script>

<?php include('menu_button.php'); ?>

    <div class="leader_switcher">
            <div class='Leaderboards' id="leaderboards_text">Leaderboards</div>
            <fieldset data-role="controlgroup"  data-type="horizontal" data-role="fieldcontain">
            <input type="radio" name="radio-choice-a3" id="radio-choice-e1" value="0" <?php if(@$_COOKIE['leaderboard_gameMode']!=1) echo "checked" ?> onclick="radioClick(this.value);"/>
			<label for="radio-choice-e1">Classic</label>
			<input type="radio" name="radio-choice-a3" id="radio-choice-f1" value="1" <?php if(@$_COOKIE['leaderboard_gameMode']==1) echo "checked" ?> onclick="radioClick(this.value);"/>
			<label for="radio-choice-f1">Challenge</label>
            </fieldset>
    </div>

	<div class='list' onLoad="$('.list').load('leaderboards_table.php');">
	</div>

<?php include('footer.php'); ?>
