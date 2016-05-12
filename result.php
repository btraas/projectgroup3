<!DOCTYPE html>
<html>

<?php
require_once('config.php');

// Connect to server and select database.
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
mysql_select_db(DB_DATABASE)or die("cannot select DB");
$tb_name="leaderboards"; // Table name

$score=$_GET['score'];

$score = mysql_real_escape_string($score);
$sql = "SELECT 1 + (SELECT count( * ) FROM $tb_name a WHERE a.score > b.score ) AS rank FROM
$tb_name b WHERE score = $score ORDER BY rank LIMIT 1 ;";

$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<link rel="stylesheet" type="text/css" href="assets/css/result.css">
	<title>result page</title>
    <script>
        function goHome()  {
       		window.location = 'menu.html'
        }
        function goPost()  {
       		window.location = 'postscore.html'
        }
        function goSelect()  {
       		window.location = 'difficulty.html'
        }
        function goPlay()  {
       		window.location = 'play.html'
        }
     </script>
</head>

<body>
	<div class='wrapper'>

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
			<div class='firstRow'>
				<input type="image" src="resources/result_buttons_home.png" onclick="goHome()" class="homeBtn">
                <input type="image" src="resources/result_buttons_leaderboards.png" value="Post Score" onclick="goPost()" class="postBtn">
			</div>

			<div class='secondRow'>
                <input type="image" src="resources/result_buttons_level.png" onclick="goSelect()" class="selectBtn">
                <input type="image" src="resources/result_buttons_retry.png" onclick="goPlay()" class="playBtn">
			</div>

		</div>

	</div>
</body>



</html>