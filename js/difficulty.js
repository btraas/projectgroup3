var gridSize = 3;
var gameMode = 0;
var numberRange = 4;
var fakeNums = 0;

// load from cookie and set as the default value
$(document).bind('pageinit', function(){
        $("#level").val(getCookie('level')).slider('refresh');
        document.getElementById('lvImg').src = 'resources/level/Lv'+getCookie('level')+'.png';
});

// function that takes users to menu page
function goHome() {
    window.location = 'index.php';
}

// function that takes users to game page
function goPlay() {
    window.location = "game.php";
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
            numberRange = 3;

            if(gameMode == 1){
                fakeNums = 1;
            }
            break;
        case '3':
            gridSize = 3;
            numberRange = 4;

            if(gameMode == 1){
                fakeNums = 1;
            }
            break;
        case '4':
            gridSize = 4;
            numberRange = 5;

            if(gameMode == 1){
                fakeNums = 1;
            }
            break;
        case '5':
            gridSize = 4;
            numberRange = 7;

            if(gameMode == 1){
                fakeNums = 2;
            }
            break;
        case '6':
            gridSize = 5;
            numberRange = 6;

            if(gameMode == 1){
                fakeNums = 3;
            }
            break;
        case '7':
            gridSize = 5;
            numberRange = 8;

            if(gameMode == 1){
                fakeNums = 4;
            }
            break;
        default:
            gridSize = 3;
            numberRange = 4;
            fakeNums = 0;
    }

    setCookie("gridSize", gridSize, 365);
    setCookie("numberRange", numberRange, 365);
    setCookie("gameMode", gameMode, 365);
    setCookie("fakeNums", fakeNums, 365);
    setCookie("level", val, 365);

}

function onRadio(val) {
    gameMode = val;
    setCookie("gameMode", gameMode, 365);
}