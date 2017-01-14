<?php
	require_once('config.php');

    // Connect to server and select database.
    //mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
    //mysql_select_db(DB_DATABASE)or die("cannot select DB");
    $tb_name="leaderboards"; // Table name
?>
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

						//echo $lb_gameMode."<br />".$gameMode;
					

                        // default for classic mode
                        if(!isset($lb_gameMode)) {
                            $lb_gameMode = $gameMode;
						}
                        // ORDER BY id DESC is order result by descending
						
						$sql="SELECT * FROM $tb_name WHERE gamemode = $lb_gameMode ORDER BY score DESC limit 0,9";
                        // ORDER BY id DESC is order result by descending

                        //echo $sql;

                        $result=runQ($sql);
                        $num = 1;
                        $highlighted = false;

                        $username = $_COOKIE["username"];
                        $rank = @$_COOKIE["rank"];
                        $score = @$_COOKIE["score"];

                        foreach($result AS $row){ // Start looping table row


            ?>


                            <tr <?php if(!$highlighted && $row['username']==$username && $row['score']==$score) { echo "class='highlight'"; $highlighted = true; } ?>>
                                <td><?php echo $num++ ?></td>
                                <td><?php echo ucwords($row['username']); ?></td>
                                <td><?php echo ucwords($row['score']); ?></td>
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
                         //mysql_close(); // close database connection
            ?>
</table>
