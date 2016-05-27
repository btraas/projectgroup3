//achievement.js
//exit the current bgm when they get out this page
$(document).on('pagebeforehide', "[data-url='/achievement.php']", function()
{
	BGM.next();
});
