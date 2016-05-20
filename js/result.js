// result.js

// Posts score to server, also saves user score locally

// direct to other pages accordingly
function goPost()  {


	// Go to leaderboards if we've posted alreday
	if(getCookie('posted') == 't')
	{
		$('#leaderboards').click();
		return true;
	}

	var username = prompt('Plese enter your username:',"");
    var gameMode = getCookie('gameMode');

    setCookie('rank', rank, 365);
    setCookie('score', score, 365);
    setCookie('username', username, 365);
	setCookie('posted', 't', 1);
	

    window.location = 'post_score.php?username=' + username + "&gamemode=" + gameMode + "&random=" + window.btoa(score);
}


