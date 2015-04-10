function hideElementById(id) {
	document.getElementById(id).style.display = "none";
}

function showElementById(id) {
	document.getElementById(id).style.display = "block";
}

var addEvent = function(type, callback) {  
    if (window.attachEvent) { // IE  
        this.attachEvent.call(this, "on" + type, callback);  
    } else if (window.addEventListener) {  
        this.addEventListener.call(this, type, callback, false);  
    } else {  
        alert("无法绑定事件，请反馈给管理员");  
    }  
    return this;  
}  
function delegate(node, childNodeClass, eventType, func) {
    addEvent.call(node, eventType, function(event) {
        var classes = event.target.className.split(" ");
        if(classes.indexOf(childNodeClass) > -1) {
            func(event);
        }
    })
}