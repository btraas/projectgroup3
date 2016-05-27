//tutorial.js

$(document).on('pageshow', "[data-url='/tutorial.php']", function(){
    BGM.pause();
});


//exit the current bgm when they get out this page
$(document).on('pagebeforehide', "[data-url='/tutorial.php']", function()
{
    BGM.next();
});
