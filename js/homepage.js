function resetPassword() {
	console.log("sdfsdf");
	if (localStorage.getItem("password")) {
		localStorage.removeItem("password");
		successmessage("resetSuccess");
	} else {
		emptyPassword();
	}
};

(function checkPassword(){
	if (!localStorage.getItem("password")) {
		emptyPassword();
	}
}());

function successmessage(successcode) {
	if (successcode == "resetSuccess") {
		alert("Pattern Reset Success!");
	}
	location.reload();
};

function emptyPassword() {
	document.getElementById("resetPassword").style.display = "none";	
	document.getElementById("lockScreen").innerHTML = "Set Password";
};