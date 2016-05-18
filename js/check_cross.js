function showCross(){
	var cross = $('<img id="cross" src="resources/images/cross_mark.png" alt="cross" width="100px" height="100px">');

	//cross.css("position", "fixed");
	console.log("cross");

	$('#topLayer').append(cross);

    cross.animate({opacity: '0.2'}, "slow");
	cross.animate({opacity: '1.0'}, "slow", function(){
		cross.remove();
	});
}

function showCheck(){
	var check = $('<img id="check" src="resources/images/check_mark.png" alt="cross" width="100px" height="100px">');
	
	//check.css("position", "fixed");
	console.log("check");

	$('#topLayer').append(check);

    check.animate({opacity: '0.2'}, "slow");
	check.animate({opacity: '1.0'}, "slow", function(){
		check.remove();
	});

	//not appear
}