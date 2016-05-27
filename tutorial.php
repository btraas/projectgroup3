<?php 
	include('header.php');
    session_start();
?>
<link rel="stylesheet" href="css/tutorial.css" />
<script>
	BGM.loop('resources/sounds/bgm_nothing.m4a');

	//exit the current bgm when they get out this page
	$(document).on('pagebeforehide', "[data-url='/tutorial.php']", function(){
	    BGM.volume(getCookie('bgm'));
	});
</script>
<?php include('menu_button.php'); ?>
	<div class="tutorial" id="tutorial_video">
    	<iframe src="https://www.youtube.com/embed/OXWrjWDQh7Q"></iframe>
	</div>
<?php include('footer.php'); ?>
