<?php include('header.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/difficulty.css">
    
    <script>
        var gridSize = 3;
        var gameMode = 0;
        var numberRange = 4;

        // function that takes users to menu page
        function goHome() {
            window.location = 'index.php';
        }

        // function that takes users to game page
        function goPlay() {
            //alert("game.php?gridSize=" + gridSize + "&numberRange=" + numberRange);
            window.location = "game.php";
        }

        // function that changes images when swiping slider
        function updateImg(val) {
            document.getElementById('lvImg').src = 'resources/level/Lv'+val+'.png';

            switch(val) {
                case '1':
                    gridSize = 2;
                    numberRange = 3;
                    break;
                case '2':
                    gridSize = 3;
                    numberRange = 4;
                    break;
                case '3':
                    gridSize = 3;
                    numberRange = 6;
                    break;
                case '4':
                    gridSize = 4;
                    numberRange = 8;
                    break;
                case '5':
                    gridSize = 4;
                    numberRange = 9;
                    break;
                case '6':
                    gridSize = 4;
                    numberRange = 12;
                    break;
                case '7':
                    gridSize = 5;
                    numberRange = 15;
                    break;
                default:
                    gridSize = 3;
                    numberRange = 4;
            }

            setCookie("gridSize", gridSize, 365);
            setCookie("numberRange", numberRange, 365);
            setCookie("gameMode", gameMode, 365);

        }
     </script>

		<?php include('menu_button.php'); ?>

        <div id="text"><label for="level">Difficulty:</label> </div>

            <fieldset data-role="controlgroup"  data-type="horizontal" data-role="fieldcontain">
            <input type="radio" name="radio-choice-a1" id="radio-choice-a1" value="0" checked="checked" onclick=""/>
			<label for="radio-choice-a1">Classic</label>
			<input type="radio" name="radio-choice-a1" id="radio-choice-b1" value="1"  onclick=""/>
			<label for="radio-choice-b1">Challenge</label>
            </fieldset>
               
	    <div class="lvimg">
        		<img id="lvImg" src="resources/level/Lv1.png" alt="Level Image" height="280" width="280">
		</div>
        <div class="levelselection">
            	<input type="range" name="level" value="1" min="1" max="7" onchange="updateImg(this.value);">
    	</div>

        <!--<button type="button" onclick="goPlay()">Play</button>-->
		<div class='game'>
		    <input type='button' class='gameBtn' value='Play' onclick="$('#game').click()">
		    <!-- just a placeholder (invisible) for jquery mobile transitions -->
		    <a id='game' href='game.php' data-transition='flow'></a>
		</div>


<?php include('footer.php'); ?>
