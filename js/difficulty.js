var gridSize = 3;
var gameMode = 0;
var numberRange = 4;
var fakeNums = 0;

// load from cookie and set as the default value
$(document).on('pageshow', "[data-url='/difficulty.php']", function(){
        $("#level").val(getCookie('level')).slider('refresh');
        document.getElementById('lvImg').src = 'resources/level/Lv'+getCookie('level')+'.png';

		setText();	

});

function setText()
{
	var classic_html = " <tr style='vertical-align: top;'><td>Drag from 1-x consecutive numbers to complete the grid</p></td></tr>";
	var challenge_html = "<tr style='vertical-align: top;'><td>Drag between even numbers only. Numbers are not consecutive.</td></tr>";
	if($('#classic-mode').is(':checked')) $('#info-table').html(classic_html);
	else $('#info-table').html(challenge_html);
}

// function that changes images when swiping slider
function updateImg(val) {
    document.getElementById('lvImg').src = 'resources/level/Lv'+val+'.png';

    switch(val) {
        case '1':
            gridSize = 2;
            numberRange = 3;

            if(gameMode == 1){
                fakeNums = 0;
            }
            break;
        case '2':
            gridSize = 3;
            numberRange = 4;

            if(gameMode == 1){
                fakeNums = 1;
            }
            break;
        case '3':
            gridSize = 3;
            numberRange = 5;

            if(gameMode == 1){
                fakeNums = 1;
            }
            break;
        case '4':
            gridSize = 3;
            numberRange = 6;

            if(gameMode == 1){
                fakeNums = 1;
            }
            break;
        case '5':
            gridSize = 4;
            numberRange = 6;

            if(gameMode == 1){
                fakeNums = 2;
            }
            break;
        case '6':
            gridSize = 4;
            numberRange = 7;

            if(gameMode == 1){
                fakeNums = 3;
            }
            break;
        case '7':
            gridSize = 4;
            numberRange = 8;

            if(gameMode == 1){
                fakeNums = 4;
            }
            break;
        default:
            gridSize = 2;
            numberRange = 4;
            fakeNums = 0;
    }

    setCookie("gridSize", gridSize, 365);
    setCookie("numberRange", numberRange, 365);
    setCookie("gameMode", gameMode, 365);
	setCookie('leaderboard_gameMode', gameMode, 365);
    setCookie("fakeNums", fakeNums, 365);
    setCookie("level", val, 365);

}

function onRadio(val) {
    gameMode = val;
	setText();
    setCookie("gameMode", gameMode, 365);
	setCookie('leaderboard_gameMode', gameMode, 365);
}
