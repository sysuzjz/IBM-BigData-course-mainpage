window.onload = init;
function init() {
    var node = null; 
    if(node = document.getElementById('button-login')) {
        node.onclick = showLogin;
    }
    if(node = document.getElementById('button-cancel')) {
        node.onclick = hideLogin;
    }
}
function showLogin() {
    showElementById("cover");
    showElementById("login");
}

function hideLogin() {
    hideElementById("cover");
    hideElementById("login");
}



var menuNode = document.getElementById("menu");
delegate(menuNode, "a", "mouseover", function(event) {
    var target = getEventTarget(event);
    var type = target.getAttribute("data-type"),
        submenus = getChildNodes(menuNode.parentNode, ".submenu"),
        offsetLeft = target.offsetLeft,
        menuLiWidth = getWidth(target);
    each(submenus, function() {
        setStyle(this, "display", "none");
        if(this.getAttribute("data-type") == type) {
            setStyle(this, "display", "inline-block");
            var currentWidth = getWidth(this),
                parentWidth = getWidth(this.parentNode),
                left = offsetLeft + menuLiWidth / 2 - currentWidth / 2;
            if(left < 0) { // 超出左侧
                console.log(1);
                setStyle(this, "left", 0);
            } else if(menuLiWidth / 2 + currentWidth / 2 > parentWidth) { // 超出右侧
                console.log("2");
                setStyle(this, "right", 0);
            } else {
                setStyle(this, "left", left);
            }
        }
    })
})
