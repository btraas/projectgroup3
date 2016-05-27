// load from cookie and set as the default value
$(document).bind('pageinit', function(){
        $("#bgm").val(getCookie('bgm')).slider('refresh');
        $("#sfx").val(getCookie('sfx')).slider('refresh');
});

// set cookie for bgm
function showVal_bgm(val) {
	setCookie('bgm', val, 365);	// save setting
	BGM.volume(val);			// set volume now
}

// set cookie for sfx
function showVal_sfx(val) {
	setCookie('sfx', val, 365); // save setting
	SFX.volume(val);			// set volume now
	SFX.play("resources/sounds/sfx_test.wav");
}

