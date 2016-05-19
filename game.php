<?php include('header.php'); ?>

	<!-- 3rd party and our common scripts / css -->
	<script src='js/patternlock/patternLock.js'></script>
	<link href="js/patternlock/patternLock.css"  rel="stylesheet" type="text/css" />
	<script src='js/stopwatch.js'></script>
	

	<!-- Javascript and CSS pertaining to this page -->

	<!-- Script for animating check / cross -->
	<script src='js/check_cross.js'></script>

	<script src='js/game.js'></script>
	<link href="css/game.css" rel='stylesheet' type='text/css' />

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
		<input type='button' class='btn skipBtn' value='Skip' onclick='skip()'>

		<div id='topLayer'>
			<img id="cross" class='feedback' src="resources/images/cross_mark.png" alt="cross">
			<img id="check" class='feedback' src="resources/images/check_mark.png" alt="cross" >
		</div>
<<<<<<< HEAD
<<<<<<< HEAD
<style type="text/css">
	body{
		background-color:#232323;
	}

	.feedback {
		width: 100px;
		height: 100px;
		
		/* IE 8 */
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";

		/* IE 5-7 */
		filter: alpha(opacity=0);

		opacity: 0;

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
	
	#topLayer {
		position: absolute;
		z-index: 999;
		pointer-events: none;
	}

</style>
=======
>>>>>>> a6750202cc6aaa148a3e1914367a9eea11dbaa24
=======
>>>>>>> a6750202cc6aaa148a3e1914367a9eea11dbaa24

<?php include('footer.php'); ?>
