<?php include('header.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/difficulty.css">
    
    <script>

        // function that takes users to menu page
        function goHome() {
            window.location = 'index.php'
        }

        // function that takes users to game page
        function goPlay() {
            window.location = 'game.php'
        }

        // function that changes images when swiping slider
        function updateImg(val) {
            document.getElementById('lvImg').src = 'resources/level/Lv'+val+'(fake).png';
        }
     </script>

	    <div>
			<?php include('menu_button.php'); ?>
	    </div>

        <div id="text"><label for="level">Difficulty:</label> </div>
               
	    <div class="lvimg">
        		<img id="lvImg" src="resources/level/Lv1(fake).png" alt="Level Image" height="280" width="280">
		</div>
        <div class="levelselection">
            	<input type="range" name="level" value="1" min="1" max="10" onchange="updateImg(this.value);">
    	</div>

        <div class="play">
            <button type="button" onclick="goPlay()">Play</button>
        </div>

<?php include('footer.php'); ?>
