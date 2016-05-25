function radioClick(val){
        setCookie('leaderboard_gameMode', val , 365);
        //location.reload();

		$.mobile.changePage(
		window.location.href,
		{
	  		allowSamePageTransition : false,
	  		transition              : 'none',
	  		showLoadMsg             : false,
	  		reloadPage              : true
		});
}