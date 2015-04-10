function showLogin() {
    showElementById("cover");
    showElementById("login");
}

function hideLogin() {
    hideElementById("cover");
    hideElementById("login");
}

function init() {
    var node = null; 
    if(node = document.getElementById('button-login')) {
        node.onclick = showLogin;
    }
    if(node = document.getElementById('button-cancel')) {
        node.onclick = hideLogin;
    }
}

window.onload = init;