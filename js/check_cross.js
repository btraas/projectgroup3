// not using anymore due to the discussion that it causes users' anxiety
// function showCross(){
// 	//cross.css("position", "fixed");
// 	console.log("cross");
//
// 	cross = $('#cross');
// 	cross.animate({opacity: '1.0'}, "slow", function(){
// 		check.animate({opacity:'0.0'}, "slow");
// 	});
// }
function showCheck(){
	//check.css("position", "fixed");
	console.log("check");

	check = $('#check');
	check.animate({opacity: '1.0'}, "slow", function(){
		check.animate({opacity:'0.0'}, "slow");
	});
	//not appear
}