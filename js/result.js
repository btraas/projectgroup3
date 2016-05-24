// result.js

// Posts score to server, also saves user score locally

// direct to other pages accordingly
$(document).on('pageshow', "[data-url='/result.php']", function(){
    // $('.postBtn').attr("src", "resources/images/result_buttons_leaderboards_01.png");
}

function goPost()  {
	// Go to leaderboards if we've posted alreday
	if(getCookie('posted') == 't') {
		$('#leaderboards').click();
		$('.postBtn').attr("src", "resources/images/result_buttons_leaderboards_01.png");
		return true;
	} else {
		var username = prompt('Plese enter your username:',"");
	    var gameMode = getCookie('gameMode');

	    setCookie('rank', rank, 365);
	    setCookie('score', score, 365);
	    setCookie('username', username, 365);
		setCookie('posted', 't', 1);
		
	    window.location = 'post_score.php?username=' + username + "&gameMode=" + gameMode + "&random=" + window.btoa(score);

	    $('.postBtn').attr("src", "resources/images/result_buttons_leaderboards_02.png");
    }
}


