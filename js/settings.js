// load from cookie and set as the default value
$(document).bind('pageinit', function(){
        $("#bgm").val(getCookie('bgm'));
        $("#sfx").val(getCookie('sfx'));
});

// set cookie for bgm
function showVal_bgm(val) {
	setCookie('bgm', val, 365);
}

// set cookie for sfx
function showVal_sfx(val) {
	setCookie('sfx', val, 365);
}

