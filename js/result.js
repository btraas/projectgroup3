// result.js

// direct to other pages accordingly
$(document).on('pageshow', "[data-url^='/result.php']", function(){
	if(getCookie('posted') == 't'){
		$('.postBtn').attr("src", "resources/images/result_buttons_leaderboards_rank.png");
	} else {
		$('.postBtn').attr("src", "resources/images/result_buttons_leaderboards_post.png");
	}

	// Achievement object #1. 2nd parameter says not to load automatically
	var a = new Achievement(1, true);
	// Load, and run the complete() function as a callback
	a.load(a.complete);

	// Achievement object #4 (large number of grids completed)
	var b = new Achievement(4, true);
	b.load(function() { b.add(pg); });
});


//exit the current bgm when they get out this page
$(document).on('pagebeforehide', "[data-url^='/result.php']", function()
{
	BGM.next();
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
	    window.location = 'score_post.php?username=' + username + "&gameMode=" + gameMode + "&random=" + window.btoa(score);
    }
}
