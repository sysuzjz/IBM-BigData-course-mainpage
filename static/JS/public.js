function hideElementById(id) {
	document.getElementById(id).style.display = "none";
}

function showElementById(id) {
	document.getElementById(id).style.display = "block";
}

function showLogin() {
	showElementById("cover");
	showElementById("login");
}

function hideLogin() {
	hideElementById("cover");
	hideElementById("login");
}

function init() {
	document.getElementById('button-login').onclick = showLogin;
	document.getElementById('button-cancel').onclick = hideLogin;
}

window.onload = init;