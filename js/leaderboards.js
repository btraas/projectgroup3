//$('.list').load('leaderboards_table.php');

$(document).on('pageshow', "[data-url='/leaderboards.php']", function()
{
	$('.list').load('leaderboards_table.php');
});

function radioClick(val){
        setCookie('leaderboard_gameMode', val , 365);
        //location.reload();

		$('.list').load('leaderboards_table.php');
}
