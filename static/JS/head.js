function showLogin() {
	document.getElementById('login').style.display = "block";
}

function hideLogin() {
	document.getElementById('login').style.display = "none";
}

function init() {
	document.getElementById('button-login').onclick = showLogin;
	//document.getElementById('button-logout').onclick = hideLogin;
}

window.onload = init;