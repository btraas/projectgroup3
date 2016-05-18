<?php include('header.php'); ?>

<link rel="stylesheet" type="text/css" href="css/settings.css">
<link rel='stylesheet' type='text/css' href='css/crawl.css'>

<script>
		$(document).bind('pageinit', function()
		{
            //easter egg scroll text
			var scrolltext = "<div id='titles'><div id='titlecontent'>"+
							"<p class='center'>EPISODE IV<br />"+
      						"A NEW HOPE FOR MEMORY RETENTION</p>"+

    						"<p>Memory Swipe will improve and/or retain your memory by playing a simple game.</p>"+
    						"<p>To play Memory Swipe, simply remember the order of numbers when they appear. After the numbers disappear, swipe from one number to the next.</p>"+

    						"<p>As you improve, you can increase the difficulty the next time you play, and have to remember more numbers to swipe.</p>"+

    						"<p>This game was created by Shawn Kim, Benjamin Hao, Kelvin Zheng, Brayden Traas, and Yoshiaki Murakami.</p>"+

    						"<p>This game was inspired by the Android pattern lockscreen. We are in no way affiliated with Anroid, Google, or Star Wars in any way.</p>"+

    "</div></div>";
			
			// If we are loading this page with the easteregg hash, replace contents with scrolltext.
			if(window.location.hash === '#easteregg')
			{
				// add HTML text, and remove jquery mobile styling
				$('.credits').html(scrolltext).removeClass('ui-body-a');
				
				// Bring all buttons above the text
				$('.ui-btn').css('z-index', 200);
				
				// Load and play music
				playBGM('sounds/starwars.mp3');
			}


			// When the user clicks the lightsaber, reload the page with the easteregg enabled
			$('#lightsaber').click(function() 
			{
				location.href = 'aboutus.php#easteregg';
				location.reload();
			});
		});

</script>
        
<?php include('menu_button.php'); ?>

		<div class="credits" data-role="content" data-theme="a">
            <img src="resources/images/game_logo3.png" alt="game_logo" width="250px">
			<h3>Code,Design,Development</h3>
			<p>Brayden Traas</p>
			<p>Shawn Kim</p>
			<p>Kelvin Zhong</p>
			<p>Benjamin Hao</p>
			<img src='resources/images/lightsaber.png' id='lightsaber' />
		</div>
       
<?php include('footer.php'); ?>
