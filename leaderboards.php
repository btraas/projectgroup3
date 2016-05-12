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
	<link rel="stylesheet" type="text/css" href="assets/css/leaderboards.css">
	<title>Leaderboards</title>

    <script>
        function onMenu() {
            window.location = 'menu.html'
        }
    </script>   
    
</head>

<body>

	<div class='wrapper'>

		<input type="button" class='menu' value = 'Menu' onclick='onMenu()'/>

		<div class='leaderboards'>Leaderboards</div>

    <div class='buttons'>
        <input type="button" class='global' value='Global'>
        <input type="button" class='local' value='Local'>
    </div>

		<div class='list'>

          <table>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Score</th>
            </tr>

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
             mysql_close(); // close database connection
?>



        </table>
		</div>

	</div>

</body>

</html>