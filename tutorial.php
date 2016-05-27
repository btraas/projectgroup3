<?php 
	include('header.php');
    session_start();
?>
<link rel="stylesheet" href="css/tutorial.css" />
<script>
	BGM.loop('resources/sounds/bgm_nothing.m4a');

	//exit the current bgm when they get out this page
	$(document).on('pagebeforehide', "[data-url='/tutorial.php']", function(){
		BGM.next();
	});
</script>
<?php include('menu_button.php'); ?>
	<div class="tutorial" id="tutorial_video">
    	<iframe src="https://www.youtube.com/embed/fooLol-bUMI"></iframe>
	</div>
<?php include('footer.php'); ?>
