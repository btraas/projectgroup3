<?php
    require_once('config.php');

    // Connect to server and select database.
    mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
    mysql_select_db(DB_DATABASE)or die("cannot select DB");
    $tb_name="leaderboards"; // Table name

	include('header.php');
?>

<link id="leaderboardsCSS" rel="stylesheet" type="text/css" href="css/leaderboards.css">


<script>

    function radioClick(val){
            setCookie('leaderboard_gameMode', val , 365);
            //location.reload();

			$.mobile.changePage(
    		window.location.href,
    		{
    	  		allowSamePageTransition : false,
    	  		transition              : 'none',
    	  		showLoadMsg             : false,
    	  		reloadPage              : true
    		});
    }

</script>

<?php include('menu_button.php'); ?>

    <div class="switcher">
            <div class='Leaderboards' id="leaderboards_text">Leaderboards</div>
            <fieldset data-role="controlgroup"  data-type="horizontal" data-role="fieldcontain">
            <input type="radio" name="radio-choice-a1" id="radio-choice-a1" value="0" <?php if(@$_COOKIE['leaderboard_gameMode']!=1) echo "checked" ?> onclick="radioClick(this.value);"/>
			<label for="radio-choice-a1">Classic</label>
			<input type="radio" name="radio-choice-a1" id="radio-choice-b1" value="1" <?php if(@$_COOKIE['leaderboard_gameMode']==1) echo "checked" ?> onclick="radioClick(this.value);"/>
			<label for="radio-choice-b1">Challenge</label>
            </fieldset>
    </div>

	<div class='list'>

		<table>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Score</th>
            </tr>
            <!-- PHP showing user scores -->
            <?php
                        $lb_gameMode = $_COOKIE['leaderboard_gameMode'];
						$gameMode = $_COOKIE['gameMode'];
						
                        // default for classic mode
                        if(empty($lb_gameMode)) {
                            $lb_gameMode = 0;
                        }

                        $sql="SELECT * FROM $tb_name WHERE gamemode = $lb_gameMode ORDER BY score DESC limit 0,9";
                        // ORDER BY id DESC is order result by descending

						//echo $sql;

                        $result=mysql_query($sql);
                        $num = 1;
						$highlighted = false;

						$username = $_COOKIE["username"];
					    $rank = $_COOKIE["rank"];
						$score = $_COOKIE["score"];

                        while($rows=mysql_fetch_array($result)){ // Start looping table row


            ?>


                            <tr <?php if(!$highlighted && $rows['username']==$username && $rows['score']==$score) { echo "class='highlight'"; $highlighted = true; } ?>>
                                <td><?php echo $num++ ?></td>
                                <td><?php echo ucwords($rows['username']); ?></td>
                                <td><?php echo ucwords($rows['score']); ?></td>
                            </tr>

            <?php
                        }

                        if(!$highlighted && $gameMode == $lb_gameMode && $rank != "" && $score != "" && $username != "") {
            ?>
                            <tr class = 'highlight'>
                                <td><?php echo $rank; ?></td>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $score; ?></td>
                            </tr>
            <?php         
                        }

                         mysql_close(); // close database connection
			?>
	</table>
</div>

<?php include('footer.php'); ?>
