$(document).on('pagebeforeshow', "[data-url='/easteregg.php']", function()
{
    //easter egg scroll text
    // add HTML text, and remove jquery mobile styling
    $('#starwars').removeClass('ui-body-a');

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

