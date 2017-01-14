<?php
    define('DB_HOST', 'memoryswipegame.com:3306');
    define('DB_DATABASE', 'memoryswipe');
    define('DB_USER', 'g3');
    define('DB_PASSWORD', 'c2910WithChiEn');
    define('HOMEURL', 'index.php');

	ini_set('display_errors', 1);

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }

	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    $str = mysqli_real_escape_string($con, $str);
	mysqli_close($con);
	return $str;
}

function runQ($query)
{
    //Connect to mysql server
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    if(!$con) {
        die('Failed to connect to server: ' . mysqli_error());
    }

    $result=mysqli_query($con, $query);
    if(!$result) {
        return false;
    }


    $data = array();
    $i = 0;

    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
    mysqli_close($con);

    //if ($lines == 1) return @$data[0];

    return $data;


}

?>
