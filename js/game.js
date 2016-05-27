var level = 1; // the level of difficulty
var gameMode = 0; // 0 for classic game, 1 for challenge mode
var fakeNums = 0; // the number of fake numbers

var score = 0; //user score
var buttonRadius = 0; //button radius
var buttonMargin = 0; //button margin
var matrixSize = 320; //physical matrix size
var gridSize = 5; //size of grid 5x5, 4x4
var rowSize = gridSize; //row size
var numberRange = 4; //number of answers
var maxNumber = Math.pow(rowSize, 2);//max number
var progress = [2, 2, 2, 2, 2,
				2, 2, 2, 2, 2]; //user progress 0: off, 1: on, 2:empty
var progressIndex = 0;// user progress index
var lock = null;

var lastGridTime = 0;
var speedDemonMS = 2000;


// get values from cookie based on difficulty level
gridSize = getCookie("gridSize");
numberRange = getCookie("numberRange");
gameMode = getCookie("gameMode");
fakeNums = getCookie("fakeNums");
level = getCookie("level");

// set matrix width / height by window width

// Math to determine elements sizes
buttonRadius = matrixSize / rowSize;
buttonMargin = buttonRadius / 5.4;
buttonRadius = buttonRadius/6;

var grid = {};

//set grid on load
function createGrid() // {{{
{
	// get values from cookie based on difficulty level
	gridSize = getCookie("gridSize");
	numberRange = getCookie("numberRange");
	gameMode = getCookie("gameMode");
	fakeNums = getCookie("fakeNums");
	level = getCookie("level");

	return { // {{{
        matrix : [gridSize, gridSize],
        margin : buttonMargin,
        radius: buttonRadius,
        patternVisible: true,
        lineOnMove: true,
        delimiter: "", // a delimeter between the pattern
        enableSetPattern: false,

        //When user is done drawing(pattern: user input)
        onDraw:function(pattern) {
                var answer = decodeURI(getCookie('answer')).split('|').join('');
        //        console.log("onDraw");
                //when user input is correct
                if(pattern == answer) {
                //Removing pattern from visual
                	showCheck();
            		SFX.play('resources/sounds/sfx_ui_check.ogg');
                	progress[progressIndex++] = 1;

					console.log("Milliseconds: "+(x.time() - lastGridTime));

					// achievement
					if(x.time() - lastGridTime < speedDemonMS)
					{
						// Achievement object #1. 2nd parameter says not to load automatically
					    var a = new Achievement(2, true);
					    // Load, and run the complete() function as a callback
						a.load(a.complete);

					}

					//send to result
					if(progressIndex >= progress.length){
						onResult();
					}

					// Generate new grid
					generateAnswer();

					//Assign new Grid
					console.log("new grid");
					lock = null;
					lock = new PatternLock('#pattern', grid);
					
					//Assign Current status on user progress
					progress[progressIndex] = 2;

					//Show user progress
					showUserProgress();
					
					// for( var i = 0; i < progress.length; i++){
					// 	console.log("progress[" + i + "]: " + progress[i]);
					// }

					//Calc score
					score += calcScore(x.time());
					lastGridTime = x.time();
				} else {
					lock.error();
					//window.setTimeout(function() { lock.reset(); }, 1000);
				}

				//Removing pattern from visual
        }//end of onDraw fucntion
    };//end of grid }}}

} // }}}

function generateAnswer(){ // {{{ Generate the answer
	var answer = []; //answer array
	var next = - 1;
	var valid = false;

	//Assign answer

	// getNextNumber returns 0 if there's no possibilities.
	// End loop if we've filled up the array or there's no more possibilities
	while(answer.length < numberRange && next != 0){

		next= getRandomNum(gridSize * gridSize);

		valid = true;
		for(var i = 0; i < answer.length; i++) {
			if(answer[i] == next) {
				valid = false;
			}
		}

		if(valid) {
			answer[answer.length] = next;
		}
		
	}

	//Save answer in cookie
	setCookie('answer', answer.join('|'), 365);
	console.log(decodeURI(getCookie('answer')).split('|').join('_'));
} // }}}end of generateAnswer()


/* 
//the two functions below to show and reset a circle progress bar
//when user holds on a button

var counts = 0;
var myInterval = null;
function resetCircle() {
        var className = document.getElementById("myID");
        className.className = "c100 small green p0";

        counts = 0;
        if(myInterval != null) {
	        clearInterval(myInterval);
	        myInterval = null;
        }
}

function drawCircle(){
        var className = document.getElementById("myID");
        className.className = "c100 small green p" + counts * 10;
        counts++;
        if(counts == 11) {
            clearInterval(myInterval);
            myInterval = null;
        }
}
*/

//When the game is first loaded
$(document).on('pageshow', "[data-url='/game.php']", function(){

	progress = [2, 2, 2, 2, 2,
				2, 2, 2, 2, 2]; //user progress 0: off, 1: on, 2:empty
	progressIndex = 0;
	// set sizes

	var matrixMultiplier = 1.3;

	
	// set matrix width / height by window width
	var minHeightWidth = $(window).width();

	if(minHeightWidth > 1000){
		minHeighWidth = 1000;
	}

	if(($(window).height() - 100) < minHeightWidth) {
		minHeightWidth = $(window).height() - 100;
		matrixSize = minHeightWidth * matrixMultiplier;
	}
	//if($('#maincontainer').width() > 1000) matrixSize = 1000 * matrixMultiplier;

	// Math to determine elements sizes
	buttonRadius = matrixSize / rowSize;
	buttonMargin = buttonRadius / 5.4;
	buttonRadius = buttonRadius/6;
	
	grid = createGrid();

	// This is a new game. Score has not been posted yet.
	setCookie('posted', 'f', 1);

	generateAnswer();	// generate a new answer

	if(!empty($('#stopWatch').html())) show();				// show stopwatch

	showUserProgress(); // Show progress the first time

	lock = new PatternLock('#pattern',  grid);	// Generate a grid on page load with parameters defined in "grid" above
});//end of pageinit(function())


// generates random numbers within the range(1-range)
// 
function getRandomNum(range) {
	return Math.ceil(Math.random() * range);
}


//generates only even numbers within the range(1-range)
function getRandomEven(range) {
	var val;
	do{
		val = Math.ceil(Math.random() * range);
	} while(val % 2 != 0);

	return val;
}

//generates only odd numbers within the range(1-range)
function getRandomOdd(range) {
	var val;
	do{
		val = Math.ceil(Math.random() * range);
	} while(val % 2 == 0);

	return val;
}


function skip() // {{{ Skip button
{
	SFX.play('resources/sounds/sfx_ui_skip.ogg');

	lastGridTime = x.time();
	

	//Direc user to result scene if all progress is done
	if(progressIndex >= progress.length - 1){
		onResult();	
	} 

	//Make current progress Skipped(failed)
	progress[progressIndex++] = 0;

	//Genearte newAnswer
	generateAnswer();

	//Assgin into new grid
	lock = null;
	lock = new PatternLock('#pattern', grid);

	//Make new progress in curretn
	progress[progressIndex] = 2;

	//show user progress
	showUserProgress();
} // }}} end of skip()

//Send user to result scene
function onResult()  {
		window.location = 'result.php?random='+window.btoa(score); // "random" is the post key, score is the value, in base64
}

//Visualizing user progress {{{
function showUserProgress(){
	$('#overlay').css('z-index', 100);
	window.setTimeout(function() {$('#overlay').css('z-index', -100)}, 3000)
	var progressBar = document.getElementById("progressBar");

	//generating progress buttons
	if(empty(document.getElementById("progress0"))){
		for(var i = 0; i < 10; i++){
			var button = document.createElement("div");
			button.className = "progressButtonOff";
			button.id = "progress" + i;
			progressBar.appendChild(button);
		}
		var progressNum = document.createElement("div");
		progressNum.id = "progressNumber";
		progressBar.appendChild(progressNum);
	}

	//check user progress and visualizing based on userProgress array
	for(var i = 0; i < 10; i++){
		// console.log("showUserProgrss():" + progress[i]);
		if(progress[i] == 0){
	 		document.getElementById("progress" + i).className = "progressButtonOff";
		} else if(progress[i] == 1) {
			document.getElementById("progress" + i).className = "progressButtonOn";
		} else if(progress[i] == 2) {
			document.getElementById("progress" + i).className = "progressButtonEmpty";
		}
	}// end of for

	if(progressIndex < 10){
		$('#progressNumber').text( (progressIndex + 1) + "/10");
	} else {
		$('#progressNumber').text( (10) + "/10");
	}
}// end of showUserProgress() }}}

// Calculating the scroe based on user progress and time {{{
function calcScore(time) {
	var mins = secs = 0;
	var newTime = '';

	time = time % (60 * 60 * 1000);
	mins = Math.floor( time / (60 * 1000) );
	time = time % (60 * 1000);
	secs = Math.floor( time / 1000 );

	var score = 0;
	var timeleft = 120 - mins*60 - secs;

	if(timeleft >= 0) {
		score += 10 + timeleft;
	} else {
		score += 10;
	}

	return score;
}//end of caclScore() }}}

