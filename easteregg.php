<?php include('header.php'); ?>

<link rel="stylesheet" type="text/css" href="css/settings.css">
<link rel='stylesheet' type='text/css' href='css/crawl.css'>

<script>
		$(document).on('pagebeforeshow', "[data-url='/easteregg.php']", function()
		{
            //easter egg scroll text
			var scrolltext = "<div id='titles'><div id='titlecontent'>"+
							"<p class='center'>EPISODE IV<br />"+
      						"A NEW HOPE FOR MEMORY RETENTION</p>"+

    						"<p>Memory Swipe will improve and/or retain your memory by playing a simple game.</p>"+
    						"<p>To play Memory Swipe, simply remember the order of numbers when they appear. After the numbers disappear, swipe from one number to the next.</p>"+

    						"<p>As you improve, you can increase the difficulty the next time you play, and have to remember more numbers to swipe.</p>"+

    						"<p>This game was created by Shawn Kim, Benjamin Hao, Kelvin Zheng, Brayden Traas, and Yoshiaki Murakami.</p>"+

    						"<p>This game was inspired by the Android pattern lockscreen. We are in no way affiliated with Android, Google, or Star Wars in any way.</p>"+

    "</div></div>";
			
			// add HTML text, and remove jquery mobile styling
			$('#starwars').html(scrolltext).removeClass('ui-body-a');
			
			// Bring all buttons above the text
			$('.ui-btn').css('z-index', 200);
			
			// Load and play music
			BGM.play('resources/sounds/starwars.mp3');


		});


		// Go to the next playlist song when leaving this page.
		$(document).on('pagebeforehide', "[data-url='/easteregg.php']", function() 
		{
			BGM.next();
		});

</script>
        
<?php include('menu_button.php'); ?>

		<div id='starwars' class="credits" data-role="content" data-theme="a">
		</div>
       
<?php include('footer.php'); ?>
