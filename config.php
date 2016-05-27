<?php
    define('DB_HOST', 'memoryswipegame.com:3306');
    define('DB_DATABASE', 'memoryswipe');
    define('DB_USER', 'g3');
    define('DB_PASSWORD', 'c2910WithChiEn');
    define('HOMEURL', 'index.php');


//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}

function runQ($query)
{
    //Connect to mysql server
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if(!$link) {
        die('Failed to connect to server: ' . mysql_error());
    }

    //Select database
    $db = mysql_select_db(DB_DATABASE);
    if(!$db) {
        die("Unable to select database");
    }

    $result=mysql_query($query);
	if(!$result) die('Query failed');

	$arr = mysql_fetch_assoc($result);
	mysql_close();

	return $arr;


}


?>
