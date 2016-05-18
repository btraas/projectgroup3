<?php include('header.php'); ?>

	<!-- Main jQuery scripts & CSS (unchanging) {{{ -->
	<script src='js/check_cross.js'></script>
	
	<!-- 3rd party and our common scripts / css -->
	<script src='js/patternlock/patternLock.js'></script>
	<link href="js/patternlock/patternLock.css"  rel="stylesheet" type="text/css" />
	<script src='js/stopwatch.js'></script>
	

	<!-- }}} -->
	<script src='js/game.js'></script>

		<?php include('menu_button.php'); ?>

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

		<div id='topLayer'></div>

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

<?php include('footer.php'); ?>
