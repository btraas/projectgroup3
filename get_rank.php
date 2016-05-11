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
echo $rows['rank'];

mysql_close();
?>

