<!-- Just a button to take the user back to the menu -->
<!-- Includes both an input tag and a tag to use jQuery transitions -->
<input type="button" class='goMenu' value = 'Menu' onclick="$('#menu').click(); SFX.play('resources/sounds/sfx_test.wav');" />
<!-- just a placeholder (invisible) for jquery mobile transitions -->
<a id='menu' class='' href='index.php' data-transition='flow' data-direction='reverse'></a>
