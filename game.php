<!DOCTYPE html>
<html>
<head>
	<title>Memory Swipe</title>

	<!-- Main jQuery scripts & CSS (unchanging) {{{ -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src='http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js'></script>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
	<script src='js/stopwatch.js'></script>
	<script src='js/check_cross.js'></script>
	
	<!-- 3rd party and our common scripts / css -->
	<script src='js/patternlock/patternLock.js'></script>
	<link href="js/patternlock/patternLock.css"  rel="stylesheet" type="text/css" />

	<!--Cookie-->
	<script src='js/cookie.js'></script>
	<script src='js/functions.js'></script>

	<!--<link rel="stylesheet" type="text/css" href="css/main.css"/>-->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="css/themes/darkTheme.min.css" />

	<!-- Meta stuff -->
	<link rel="apple-touch-icon" href="resources/images/game_icon.png">
	<link rel="apple-touch-startup-image" href="resources/images/apple-splash.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="initial-scale=1.0"><!-- }}} -->

	<script>
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
						console.log("showcross on check");
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
						console.log("showcross on wrong");
						showCross();
						lock.error();
					}

					//Removing pattern from visual
                    window.setTimeout(function() { lock.reset(); }, 1000);
            }//end of onDraw fucntion
		};//end of grid }}}

	/* GridButton Object
		
		Represents one circle/button on a grid.
		Contains accessor functions to get information about this GridButton

	*/
	/* capital G because we use it as an object */
	function GridButton(value, values, rows, columns) // {{{
	{
		// Ensure there are valid parameters
		if( empty(value) || value < 1 || value > (rows*columns)) 
		{
			alert('Invalid gridButton value: '+value);
			return false;
		}

		this.value = value;
		this.values = values;
		this.index = value-1;
		this.rows = rows;
		this.columns = columns;
		this.numGridButtons = rows*columns;		

		this.nearest = [];

		this.firstRow = function() // returns true if this GridButton is on the first row
		{
			return this.value <= columns;
		}
		this.lastRow = function() // returns true if this GridButton is on the last row
		{
			return this.value > (this.numGridButtons - columns);		
		}
		this.firstColumn = function() // etc.
		{
			return (this.index == 0 || this.index % columns == 0)
		}
		this.lastColumn = function()
		{
			return this.value % columns == 0;
		}
		this.up = function() // returns the position of the GridButton directly above
		{
			return this.value - this.columns;
		}
		this.down = function() // returns the position of the GridButton directly below
		{
			return this.value + this.columns;
		}


		// This function returns all the nearest unique possibilities to this gridButton
		// (Options of the next GridButton to swipe to)
		// If this is the top-left grid button, it will return an array with the positions of
		// the button to the right, bottom-right, and bottom.
		this.getNearest = function()
		{
			/*
			console.log("Previous num: "+this.value);
			console.log("firstRow? "+this.firstRow());
			console.log("lastRow? "+this.lastRow());
			console.log("firstCol? "+this.firstColumn());
			console.log("lastCol? "+this.lastColumn());
			*/

			// If not first row and not first column, 
			// add the circle to the top left as a possibility
			if(!this.firstRow() && !this.firstColumn()) 	this.add(this.up() - 1);

			// If not the first row, add the button directly above as a possibility
			if(!this.firstRow())							this.add(this.up());

			// etc.
			if(!this.firstRow() && !this.lastColumn())		this.add(this.up() + 1);
			if(!this.lastColumn())							this.add(this.value + 1);
			if(!this.lastRow() && !this.lastColumn())		this.add(this.down() + 1);
			if(!this.lastRow())								this.add(this.down());
			if(!this.lastRow() && !this.firstColumn())		this.add(this.down() - 1);
			if(!this.firstColumn())							this.add(this.value - 1);
	
			return this.nearest;
		}

		// Used by getNearest function only, add this button position if it's unique
		this.add = function(val)
		{
			if(this.values.indexOf(val) == -1 && this.nearest.indexOf(val) == -1) 
			{
				this.nearest.push(val);
			}

		}
	} // }}} end of GridButton object

	function getNextNumber(grid) // {{{
	{
		var nextNum = 0;

		if(grid.length == 0)
		{
			nextNum = Math.ceil(Math.random() * (gridSize*gridSize));
		}
		else
		{
			var lastButton = new GridButton(grid[grid.length - 1], grid, gridSize, gridSize);
			var values = lastButton.getNearest();
			//console.log("Button "+grid[grid.length-1]+" values: "+JSON.stringify(values));

			if(values.length == 0) return 0; // return 0 if no possibilities

			nextNum = values[Math.ceil(Math.random() * values.length) - 1];
		}
		return nextNum;
	} // }}} end of getNExtNumber()

	function generateAnswer(){ // {{{ Generate the answer
		var answer = []; //answer array
		var next = - 1;

		//Assign answer

		// getNextNumber returns 0 if there's no possibilities.
		// End loop if we've filled up the array or there's no more possibilities
		while(answer.length < numberRange && next != 0){
			next = getNextNumber(answer);
			if(next != 0) answer[answer.length] = next;
		}

		//print out console
		// for(var i = 0; i < answer.length; i++){
		// 	console.log(answer[i] + " ");
		// }
		
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
	$(document).bind('pageinit', function(){
		//not now
		// // enable vibration support
		// navigator.vibrate = navigator.vibrate || navigator.webkitVibrate || navigator.mozVibrate || navigator.msVibrate;

		// if (navigator.vibrate) {
		// 		// vibration API supported
		// }
		showUserProgress(); //Show progress at firstime
		lock = new PatternLock('#pattern',  grid);// Generate a grid at firs time
	});//end of pageinit(function())

	//Send user to result scene
    function onResult()  {
   		window.location = 'result.php?random='+window.btoa(score);
    }

    //Visualizing user progress
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
			}//end of for
		}//end of showUserProgress()

		//Calculating the scroe based on user progress and time
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
		}//end of caclScore()
	</script>
</head>

<body onload="show();">
	<div class="maincontainer">
		<div>
			<input type="button" class='btn menu' value = 'Menu' onclick='location.href = "index.html"'/>
		</div>
		<!--Progress Bar-->
		<div id="progressBar">
		</div>

		<!--Stop Watch-->
		<div id="stopWatch">
			<span id="time"></span>
		</div>

		<!--Pattern Grid-->
	    <div id="pattern" style='position: relative;'>
	    </div>
		<!-- Skip Button -->
	    <div class="button">
				<input type='button' class='btn skipBtn' value='Skip' onclick='skip()'>
	    </div>
	</div>
	
</body>

<style type="text/css">
	body{
		background-color:#232323;
	}

	.maincontainer {
	  margin: 0 auto;
	  right: auto;
	  bottom: auto;
	  width: 320px;
	  height: 100%;
	  background-color: #232323;
	  color: #FFF;
	  text-align: center;
	  /* border-radius: 10px; */
	  overflow: none;
	}

	#progressBar {
		height: 30px;
		background-color: #404040;
		margin-bottom: 1%;
	}	

	.progressButtonCurrent {
		float:left;
		width: 25px;
		height: 25px;
		margin: 2.5px 2.5px 2.5px 4px;
		border-radius:15px;
		background-color:#00FF90;
	}

	.progressButtonOff {
		float:left;
		width: 25px;
		height: 25px;
		margin:2.5px 2.5px 2.5px 4px;
		border-radius:15px;
		background-color:#fff;
	}

	.progressButtonOn {
		float:left;
		width: 25px;
		height: 25px;
		margin: 2.5px 2.5px 2.5px 4px;
		border-radius:15px;
		background-color:#EC7822;
	}

	#stopWatch{
		text-align: right;
		font-size: 170%;
		padding-right: 1%;
		margin:0;
	}

	#pattern{
		background-color: #404040;
		margin-bottom:5%;
	}
</style>


</html>
