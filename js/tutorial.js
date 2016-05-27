//tutorial.js
BGM.volume(0);

//exit the current bgm when they get out this page
$(document).on('pagebeforehide', "[data-url='/tutorial.php']", function(){
    BGM.volume(getCookie('bgm'));
});
