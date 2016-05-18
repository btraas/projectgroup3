function showCross(){
	$('body').append('<img id="cross" src="resources/images/cross_mark.png" alt="cross" width="100px" height="100px">');

	var cross = $('#cross');
	//cross.css("position", "fixed");
	console.log("cross");
    cross.animate({opacity: '0.2'}, "slow");
	cross.animate({opacity: '1.0'}, "slow");
}

function showCheck(){
	$('body').append('<img id="check" src="resources/images/check_mark.png" alt="cross" width="100px" height="100px">');

	var check = $('#check');
	//check.css("position", "fixed");
	console.log("check");
    check.animate({opacity: '0.2'}, "slow");
	check.animate({opacity: '1.0'}, "slow");
}