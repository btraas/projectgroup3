<?php include('header.php'); ?>

<img class='logo' alt="gamelogo" src='resources/images/game_logo3.png' />

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

<div class='play'>
	<input type='button' class='playBtn' value='Play' onclick="$('#play').click()">
	<!-- just a placeholder (invisible) for jquery mobile transitions -->
	<a id='play' href='difficulty.php' data-transition='flow'></a>
</div>

<?php include('footer.php'); ?>
