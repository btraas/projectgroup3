<?php include('header.php'); ?>

	<!-- 3rd party and our common scripts / css -->
    <?php
        // light theme    
        if($_COOKIE['theme'] == 1) {         
    ?>
        <script id="patternLockJS" src='js/patternlock/patternLock_L.js'></script>
    	<link href="js/patternlock/patternLock_L.css"  rel="stylesheet" type="text/css" />
    <?php
        } else { // dark theme
    ?>
        <script id="patternLockJS" src='js/patternlock/patternLock.js'></script>
    	<link href="js/patternlock/patternLock.css"  rel="stylesheet" type="text/css" />
    <?php
        }
    ?>
	<script src='js/stopwatch.js'></script>


	<!-- Javascript and CSS pertaining to this page -->

	<!-- Script for animating check / cross -->
	<script src='js/check_cross.js'></script>

	<script src='js/game.js'></script>
	<!--<script src='js/difficulty.js'></script>-->    
    <?php
        // light theme    
        if($_COOKIE['theme'] == 1) {         
    ?>
	        <link id="gameCSS" href="css/game_L.css" rel='stylesheet' type='text/css' />
    <?php
        } else { // dark theme
    ?>
        <link id="gameCSS" href="css/game.css" rel='stylesheet' type='text/css' />
    <?php
        }
    ?>

	
	<link href="css/circle.css" rel='stylesheet' type='text/css' />

		<?php include('menu_button.php'); ?>

		<div id='topLayer'>
			<!-- <img id="cross" class='feedback' src="resources/images/cross_mark.png" alt="cross"> -->
			<img id="check" class='feedback' src="resources/images/check_mark.png" alt="check" >
		</div>
		
		<!--Progress Bar-->
		<div id="progressBar">
		</div>

		<!--Stop Watch-->
		<div id="stopWatch">

                <div id = "myID">
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>

			<span id="time"></span>
		</div>

		<!--Pattern Grid-->
	    <div id="pattern" style='position: relative;'>
	    </div>
		<!-- Skip Button -->
		<div class='bottom skip'>
			<input type='button' class='btn skipBtn' value='Skip' onclick='skip()'>
		</div>

<?php include('footer.php'); ?>
