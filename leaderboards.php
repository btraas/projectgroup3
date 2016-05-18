<?php
    require_once('config.php');

    // Connect to server and select database.
    mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
    mysql_select_db(DB_DATABASE)or die("cannot select DB");
    $tb_name="leaderboards"; // Table name
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
<!--Theme css-->
    <link rel="stylesheet" href="themes/darkTheme.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/css/leaderboards.css">
    <script src='js/cookie_load_write.js'></script>

	<title>Leaderboards</title>


<script>

    function radioClick(val){
            setCookie('gamemode', val , 365);
            location.reload();
    }

</script>
</head>

<body>

	<div class='wrapper'>
		<input type="button" class='goMenu' value = 'Menu' onclick="$('#menu').click()" />
	    <!-- just a placeholder (invisible) for jquery mobile transitions -->
		<a id='menu' class='' href='index.html' data-transition='flow' data-direction='reverse'></a>

    <div class="switcher">
            <p class='Leaderboards'>Leaderboards</p>
            <fieldset data-role="controlgroup"  data-type="horizontal" data-role="fieldcontain">
            <input type="radio" name="radio-choice-a1" id="radio-choice-a1" value="0" checked="checked" onclick="radioClick(this.value);"/>
			<label for="radio-choice-a1">Classic</label>
			<input type="radio" name="radio-choice-a1" id="radio-choice-b1" value="1"  onclick="radioClick(this.value);"/>
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
                        $gamemode = $_COOKIE['gamemode'];

                        // default for classic mode
                        if($gamemode == "") {
                            $gamemode = 0;
                        }

                        $sql="SELECT * FROM $tb_name WHERE gamemode = $gamemode ORDER BY score DESC limit 0,9";
                        // ORDER BY id DESC is order result by descending
                        echo $sql;
                        $result=mysql_query($sql);
                        $num = 1;
                        while($rows=mysql_fetch_array($result)){ // Start looping table row
            ?>

                            <tr>
                                <td><?php echo $num++ ?></td>
                                <td><?php echo ucwords($rows['username']); ?></td>
                                <td><?php echo ucwords($rows['score']); ?></td>
                            </tr>

            <?php
                        }

                        $username = $_COOKIE["username"];
                        $rank = $_COOKIE["rank"];
                        $score = $_COOKIE["score"];

                        if($rank != "" && $score != "" && $username != "") {
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

	</div>

</body>

</html>
