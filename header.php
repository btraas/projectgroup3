<!-- This is a header file for all our pages, to load common JS & CSS files -->

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <link id="menuCSS" rel="stylesheet" type="text/css" href="css/menu.css">
    <title>Memory Swipe</title>

    <!-- Main jQuery scripts & CSS (unchanging) {{{ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src='http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js'></script>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>

    <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
    <link id="mainCSS" rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <link id="theme" rel="stylesheet" href="css/themes/darkTheme.min.css" />

    <?php
        // light theme    
        if($_COOKIE['theme'] == 1) {         
    ?>
	        <link id="difficultyCSS" rel="stylesheet" type="text/css" href="css/difficulty_L.css">
    <?php
        } else { // dark theme
    ?>
            <link id="difficultyCSS" rel="stylesheet" type="text/css" href="css/difficulty.css">
    <?php
        }
    ?>


    <!--Cookies-->
    <script src='js/cookie.js'></script>
    <script src='js/sounds.js'></script>
    <script src='js/functions.js'></script>
    <script src='js/theme.js'></script>
	<script src='js/achievements.js'></script>
	<script>
		$(document).on('pagebeforeshow', pageShow);

		function pageShow()
		{
			SFX.play("resources/sounds/sfx_test.wav");

			//if(getCookie('')) // set light or dark theme on page load

        }

        {
            // decide to use which theme
            if (getCookie("theme") == 0){
                Dtheme();
            }
            else {
              Ltheme();
            }
        }
	</script>
    <!-- Meta stuff -->
    <link rel="apple-touch-icon" href="resources/game_icon.png">
    <link rel="apple-touch-startup-image" href="resources/apple-splash.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1.0"><!-- }}} -->

</head>

<body>
    <div class='maincontainer' id="maincontainer">


