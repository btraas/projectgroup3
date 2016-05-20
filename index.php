<?php include('header.php'); ?>

<div class='logo_container' >
<img class='logo' alt="gamelogo" src='resources/images/game_logo3.png' />
</div>

<div class='mainmenu'>
    <input type="image" src="resources/images/menu_settings.png" onclick="$('#settings').click()" class="icon settings">
	<!-- just a placeholder (invisible) for jquery mobile transitions -->
	<a id='settings' href='settings.php' data-transition='flow'></a>

    <input type="image" src="resources/images/menu_leaderboards.png" value="Leaderboards" onclick="$('#leaderboards').click()" class="icon leaderboards">
	<!-- just a placeholder (invisible) for jquery mobile transitions -->
	<a id='leaderboards' href='leaderboards.php' data-transition='flow'></a>

    <input type="image" src="resources/images/menu_info.png" onclick="$('#about').click()" class="icon about">
	<!-- just a placeholder (invisible) for jquery mobile transitions -->
	<a id='about' href='aboutus.php' data-transition='flow'></a>
</div>

<div class='bottom'>
	<input type='button' class='playBtn' value='Play' onclick="$('#difficulty').click(); SFX.play('resources/sounds/sfx_test.wav');">
	<!-- just a placeholder (invisible) for jquery mobile transitions -->
	<a id='difficulty' href='difficulty.php' data-transition='flow'></a>
</div>

<?php include('footer.php'); ?>
