//tutorial.js

//exit the current bgm when they get out this page
$(document).on('pagebeforehide', "[data-url='/tutorial.php']", function()
{
    BGM.next();
});
