<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

    <!-- Main jQuery scripts & CSS (unchanging) {{{ -->
	<link rel="stylesheet" type="text/css" href="css/difficulty.css">
	<link rel="stylesheet" href="css/themes/darkTheme.min.css" />
	<link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
	<!-- }}} -->

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

</script>
	<title>Difficult page</title>

</head>
<body>
    <div class="wrapper">
	    <div>
	    	<input type="button" class='menu' onclick="goHome()" value='Menu' />
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
    </div>
</body>
</html>
