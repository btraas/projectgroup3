var score = 0; //user score
var buttonRadius = 0; //button radius
var buttonMargin = 0; //button margin
var matrixSize = 320; //physical matrix size
var gridSize = 5; //size of grid 5x5, 4x4
var rowSize = gridSize; //row size
var numberRange = 4; //number of answers
var maxNumber = Math.pow(rowSize, 2);//max number
var progress = [2, 0, 0, 0, 0,
				0, 0, 0, 0, 0]; //user progress 0: off, 1: on, 2:current
var progressIndex = 0;// user progress index
var lock = null;

// Math to determine elements sizes
buttonRadius = matrixSize / rowSize;
buttonMargin = buttonRadius / 5.4;
buttonRadius = buttonRadius/6;

// Define Grid Object for pattern lock plug-in, answer, user progress
var grid = { // {{{
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
				console.log("onDraw");
				//when user input is correct
                if(pattern == answer) {
                	progress[progressIndex++] = 1;
                	showCheck();

					//send to result
					if(progressIndex >= progress.length - 1){
						onResult();
					}

					// Generate new grid
					generateAnswer();

					//Assign new Grid
					lock = null;
					alert("test");
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
				} else {
					lock.error();
				}

				//Removing pattern from visual
                window.setTimeout(function() { lock.reset(); }, 1000);
        }//end of onDraw fucntion
	};//end of grid }}}

function generateAnswer(){ // {{{ Generate the answer
	var answer = []; //answer array
	var next = - 1;

	//Assign answer

	// getNextNumber returns 0 if there's no possibilities.
	// End loop if we've filled up the array or there's no more possibilities
	while(answer.length < numberRange && next != 0){
		next= getRandomNum(gridSize * gridSize );
		if(next != 0) answer[answer.length] = next;
	}
		//Save answer in cookie
		setCookie('answer', answer.join('|'), 365);
		console.log(decodeURI(getCookie('answer')).split('|').join(''));
} // }}}end of generateAnswer()

	function skip() // {{{ Skip button
	{
		//Direc user to result scene if all progress is done
		if(progressIndex >= progress.length - 1){
			onResult();	
		} 

		//Make current progress Skipped(failed)
		progress[progressIndex++] = 0;

		//show cross
		console.log("showcross on skip");
		showCross();

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

	//When the game is first loaded
	$(document).on('pagebeforeshow', function(){

		// This is a new game. Score has not been posted yet.
		setCookie('posted', 'f', 1);

		generateAnswer();	// generate a new answer
		if(!empty($('#stopWatch').html())) show();				// show stopwatch
		showUserProgress(); // Show progress the first time
		lock = new PatternLock('#pattern',  grid);	// Generate a grid on page load with parameters defined in "grid" above
	});//end of pageinit(function())

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
			}

			//check user progress and visualizing based on userProgress array
			for(var i = 0; i < 10; i++){
				// console.log("showUserProgrss():" + progress[i]);
				if(progress[i] == 0){
			 	document.getElementById("progress" + i).className = "progressButtonOff";
				} else if(progress[i] == 1) {
					document.getElementById("progress" + i).className = "progressButtonOn";
				} else if(progress[i] == 2) {
					document.getElementById("progress" + i).className = "progressButtonCurrent";
				}
			}// end of for
		}// end of showUserProgress() }}}

		// Calculating the scroe based on user progress and time {{{
		function calcScore(time) {
			var h = m = s = ms = 0;
			var newTime = '';

			h = Math.floor( time / (60 * 60 * 1000) );
			time = time % (60 * 60 * 1000);
			m = Math.floor( time / (60 * 1000) );
			time = time % (60 * 1000);
			s = Math.floor( time / 1000 );
			ms = time % 1000;

			var val = 0;
			var timeleft = 120 - m*60 - s;

			if(timeleft >= 0) {
				val += 10 + timeleft;
			} else {
				val += 10;
			}

			return val;
		}//end of caclScore() }}}


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
	SFX.play("resources/sounds/sfx_test.wav");

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

//When the game is first loaded
$(document).on('pagebeforeshow', function(){
	generateAnswer();	// generate a new answer
	if(!empty($('#stopWatch').html())) show();				// show stopwatch
	showUserProgress(); // Show progress the first time
	lock = new PatternLock('#pattern',  grid);	// Generate a grid on page load with parameters defined in "grid" above
});//end of pageinit(function())

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
			document.getElementById("progress" + i).className = "progressButtonCurrent";
		}
	}// end of for

	$('#progressNumber').text( (progressIndex + 1) + "/10");
}// end of showUserProgress() }}}

// Calculating the scroe based on user progress and time {{{
function calcScore(time) {
	var h = m = s = ms = 0;
	var newTime = '';

	h = Math.floor( time / (60 * 60 * 1000) );
	time = time % (60 * 60 * 1000);
	m = Math.floor( time / (60 * 1000) );
	time = time % (60 * 1000);
	s = Math.floor( time / 1000 );
	ms = time % 1000;

	var val = 0;
	var timeleft = 120 - m*60 - s;

	if(timeleft >= 0) {
		val += 10 + timeleft;
	} else {
		val += 10;
	}

	return val;
}//end of caclScore() }}}

