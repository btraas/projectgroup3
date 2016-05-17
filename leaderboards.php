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
    <link rel="stylesheet" type="text/css" href="assets/css/leaderboards.css">
	<title>Leaderboards</title>

    <script>
        // direct to menu page
        function onMenu() {
            window.location = 'index.html';
        }
    </script>   
    
</head>

<body>

	<div class='wrapper'>
		<input type="button" class='goMenu' value = 'Menu' onclick="onMenu()" />

    <div class="switcher">
            <p class='Leaderboards'>Leaderboards</p>
            <fieldset data-role="controlgroup"  data-type="horizontal" data-role="fieldcontain">
            <input type="radio" name="radio-choice-a1" id="radio-choice-a1" value="Global" checked="checked" />
			<label for="radio-choice-a1">Global</label>
			<input type="radio" name="radio-choice-a1" id="radio-choice-b1" value="Local"  />
			<label for="radio-choice-b1">Local</label>
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
                        $sql="SELECT * FROM $tb_name ORDER BY score DESC limit 0,9";
                        // ORDER BY id DESC is order result by descending
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

                        var username = getCookie('username');
                        if(username != "")

                        
                         mysql_close(); // close database connection
            ?>
        </table>
		</div>

	</div>

</body>

</html>