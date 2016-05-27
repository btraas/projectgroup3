<?php 
	include('header.php');
    session_start();
?>

<div class='logo_container' id="logocontainer" >
<img class='logo' alt="gamelogo" src='resources/images/game_logo3.png' onClick="jGrowl('test message', {theme: 'jGrowl-info'});"/>
</div>

<div class='mainmenu'>

	<div class='main_menu_row'>
	    <input type="image" src="resources/images/menu_settings.png" onclick="$('#settings').click()" class="icon settings">
		<!-- just a placeholder (invisible) for jquery mobile transitions -->
		<a id='settings' href='settings.php' data-transition='flow'></a>
	<!-- </div> -->

	<!-- <div class='main_menu_row'> -->
	    <input type="image" src="resources/images/menu_leaderboards.png" value="Leaderboards" onclick="$('#leaderboards').click()" class="icon leaderboards">
		<!-- just a placeholder (invisible) for jquery mobile transitions -->
		<a id='leaderboards' href='leaderboards.php' data-transition='flow'></a>
	<!-- </div> -->

	<!-- <div class='main_menu_row'>	 -->
	    <input type="image" src="resources/images/menu_info.png" onclick="$('#about').click()" class="icon about">
		<!-- just a placeholder (invisible) for jquery mobile transitions -->
		<a id='about' href='aboutus.php' data-transition='flow'></a>
	</div>

	<div class='main_menu_row'>
	    <input type="image" src="resources/images/menu_achievement.png" onclick="$('#achievement').click()" class="icon achievement">
		<!-- just a placeholder (invisible) for jquery mobile transitions -->
		<a id='achievement' href='achievement.php' data-transition='flow'></a>
	<!-- </div> -->

	<!-- <div class='main_menu_row'> -->
	    <input type="image" src="resources/images/menu_sign_up.png" onclick="$('#register').click()" class="icon signUp">
		<!-- just a placeholder (invisible) for jquery mobile transitions -->
		<a id='register' href='register.php' data-transition='flow'></a>
	<!-- </div> -->
	<?php
		if(trim($_SESSION['SESS_USERNAME']) == '') {
	?>	<!--<div class='main_menu_row'>-->

	    <input type="image" src="resources/images/menu_sign_in.png" onclick="$('#login').click()" class="icon signIn">
		<!-- just a placeholder (invisible) for jquery mobile transitions -->
		<a id='login' href='login.php' data-transition='flow'></a>
		</div>

	<?php
		} else {
	?>	<!--<div class='main_menu_row'>-->
	    <input type="image" src="resources/images/menu_sign_out.png" onclick="$('#logout').click()" class="icon signOut">
		<!-- just a placeholder (invisible) for jquery mobile transitions -->
		<a id='logout' href='logout.php' data-transition='flow'></a>
		</div>

	<?php
		}
	?>

</div>

<div class='bottom play'>
	<input type='button' class='playBtn' value='Play' onclick="$('#difficulty').click()">
	<!-- just a placeholder (invisible) for jquery mobile transitions -->
	<a id='difficulty' href='difficulty.php' data-transition='flow'></a>
</div>

<?php include('footer.php'); ?>
