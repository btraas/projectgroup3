<?php

// Post achievements (ajax calls)

require_once('config.php');


$mode = @$_REQUEST['m'];

switch($mode)
{
	case 'getachievement' : getAchievement(); exit();
	case 'setachievement' : setAchievement(); exit();
}

exit();

function getAchievement()
{
	$id = clean(intval(@$_REQUEST['id']));
	$q = "SELECT * FROM achievements WHERE achievement_id = $id";
	//echo $q;
	$r = runQ($q);

	//print_r($r);

	$return = array();
	$return['name']		= $r['achievement_name'];
	$return['desc']		= $r['achievement_description'];
	$return['max']		= $r['achievement_max'];
	$return['image']	= $r['achievement_image'];

	$u = getUsername();
	if(empty($u))
	{
		$return['value'] = -1;
		echo json_encode($return);
		exit();
	}

	//echo PHP_EOL."before get create".PHP_EOL;
	$r = getOrCreate($id, $u);

	$return['value'] = $r['achievement_value'];

	echo json_encode($return);

}

function setAchievement()
{
	$id = clean(intval(@$_REQUEST['id']));
	$value = clean(intval(@$_REQUEST['value']));

	$u = getUsername();
    if(empty($u)) exit();
	
	getOrCreate($id, $u);

	$q = "	UPDATE member_achievements 
			SET achievement_value = $value
			WHERE achievement_id = $id AND username = '$u'";
	//echo PHP_EOL.$q.PHP_EOL;
	runQ($q);

	getAchievement();

	exit();
}

function getOrCreate($id, $u)
{
	$q ="SELECT * FROM member_achievements WHERE username = '$u' AND achievement_id = $id";
	//echo PHP_EOL.$q.PHP_EOL;
	$r = runQ($q);
	//echo "before checking....";
	if(!empty($r['username'])) return $r;
	//echo "Not added yet!";
	$q = "INSERT INTO member_achievements (achievement_id, achievement_value, username) VALUES($id, 0, '$u')";
	$r = runQ($q);
	$q = "SELECT * FROM member_achievements WHERE username = '$u' AND achievement_id = $id";
	return runQ($q);

}

function getUsername()
{
	session_start();
	return @$_SESSION['SESS_USERNAME'];
}


?>
