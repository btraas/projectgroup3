//achievement.js

//play sounds
$(document).on('pagebeforeshow', "[data-url='/achievement.php']", function()
{
	BGM.loop('resources/sounds/bgm_eastern_valley.mp3');
});

//exit the current bgm when they get out this page
$(document).on('pagebeforehide', "[data-url='/achievement.php']", function()
{
	BGM.next();
});
