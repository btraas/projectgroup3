function getCookie(c_name) {
	if (document.cookie.length > 0) {

		c_start = document.cookie.indexOf(c_name + "=");
		if (c_start != - 1) {
			c_start = c_start + c_name.length+1;
			c_end = document.cookie.indexOf(";",c_start);
			if (c_end == - 1) c_end=document.cookie.length;
			return unescape(document.cookie.substring(c_start,c_end));
		}
	}
	return "";
}

function setCookie(c_name, value, expiredays) {
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + expiredays);
	document.cookie = c_name + "=" + escape(value)+ ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString());
}

function checkCookie() {
	var username = getCookie('username');

	alert(username);
	
	if (username != null && username != "") {
		alert('Current username cookie is: ' + username);
	} else {
		username = prompt('No username cookie, enter a new username: ',"");

		if (username != null && username != "") {

			setCookie('username', username, 365);
		}
	}
}

function eraseCookie(name) {
	setCookie(name, "", -1);
}
