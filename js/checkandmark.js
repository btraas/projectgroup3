function showCross(){
	$('body').append('<img id="something" src="resources/images/cross_mark.png" alt="cross" width="100px" height="100px">');

	var div = $('#something');

    div.animate({opacity: '0.2'}, "slow");
	div.animate({opacity: '1.0'}, "slow");
	div.remove();
}

function showCheck(){
	$('body').append('<img id="something" src="resources/images/check_mark.png" alt="cross" width="100px" height="100px">');

	var div = $('#something');

    div.animate({opacity: '0.2'}, "slow");
	div.animate({opacity: '1.0'}, "slow");
	
	div.remove();
}