function showCross(){
	$('.maincontainer').append('<img id="cross" src="resources/images/cross_mark.png" alt="cross" width="100px" height="100px">');

	var div = $('#cross');
	console.log("cross");
    div.animate({opacity: '0.2'}, "slow");
	div.animate({opacity: '1.0'}, "slow");

	div.remove();
}

function showCheck(){
	$('.maincontainer').append('<img id="check" src="resources/images/check_mark.png" alt="cross" width="100px" height="100px">');

	var div = $('#check');
	console.log("check");
    div.animate({opacity: '0.2'}, "slow");
	div.animate({opacity: '1.0'}, "slow");


	div.remove();
}