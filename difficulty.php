<?php include('header.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/difficulty.css">
    
    <script>
        var gridSize = 3;
        var gameMode = 0;
        var numberRange = 4;
        var fakeNums = 0;

        // load from cookie and set as the default value
        $(document).bind('pageinit', function(){
                $("#level").val(getCookie('level')).slider('refresh');
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
                        fakeNums = 0;
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


     </script>

		<?php include('menu_button.php'); ?>

        <div id="text"><label for="level">Difficulty:</label> </div>

            <fieldset data-role="controlgroup"  data-type="horizontal" data-role="fieldcontain">
            <input type="radio" name="radio-choice-a1" id="radio-choice-a1" value="0" checked="checked" onclick="onRadio(this.value)"/>
			<label for="radio-choice-a1">Classic</label>
			<input type="radio" name="radio-choice-a1" id="radio-choice-b1" value="1"  onclick="onRadio(this.value)"/>
			<label for="radio-choice-b1">Challenge</label>
            </fieldset>
               
	    <div class="lvimg">
        		<img id="lvImg" src="resources/level/Lv1.png" alt="Level Image" >
		</div>
        <div class="levelselection">
            	<input type="range" name="level" id ="level" value="1" min="1" max="7" onchange="updateImg(this.value);">
    	</div>

        <!--<button type="button" onclick="goPlay()">Play</button>-->
		<div class='bottom'>
		    <input type='button' class='gameBtn' value='Play' onclick="$('#game').click()">
		    <!-- just a placeholder (invisible) for jquery mobile transitions -->
		    <a id='game' href='game.php' data-transition='flow'></a>
		</div>


<?php include('footer.php'); ?>
