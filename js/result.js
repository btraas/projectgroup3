// result.js

// Posts score to server, also saves user score locally

// direct to other pages accordingly
$(document).on('pageshow', "[data-url^='/result.php']", function(){
	if(getCookie('posted') == 't'){
		$('.postBtn').attr("src", "resources/images/result_buttons_leaderboards_rank.png");
	} else {
		$('.postBtn').attr("src", "resources/images/result_buttons_leaderboards_post.png");
	}
    
});

function goPost()  {
	// Go to leaderboards if we've posted alreday
	if(getCookie('posted') == 't') {
		$('#leaderboards').click();
		$('.postBtn').attr("src", "resources/images/result_buttons_leaderboards_rank.png");
		return true;
	} else {
		var username = prompt('Plese enter your username:',"");
	    var gameMode = getCookie('gameMode');

	    setCookie('rank', rank, 365);
	    setCookie('score', score, 365);
	    setCookie('username', username, 365);
		setCookie('posted', 't', 1);
		
		$('.postBtn').attr("src", "resources/images/result_buttons_leaderboards_rank.png");
	    window.location = 'post_score.php?username=' + username + "&gameMode=" + gameMode + "&random=" + window.btoa(score);
    }
}

// function that takes users to menu page
function goHome() {
    window.location = 'index.php';
}

// function that takes users to game page
function goPlay() {
    window.location = "game.php";
}