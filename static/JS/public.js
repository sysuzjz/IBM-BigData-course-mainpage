function hideElementById(id) {
	document.getElementById(id).style.display = "none";
}

function showElementById(id) {
	document.getElementById(id).style.display = "block";
}

function addClassName(node, className) {
    if(node.classList) {
        node.classList.add(className);
    } else {
        var classNameList = node.className.split(" ");
        classNameList.push(className);
        node.className = classNameList.join(" ");
    }
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

function getChildNodes(node, selector) {
    var childNodes = node.childNodes,
        len = childNodes.length,
        result = Array(),
        nodeType = 1; // nodetype of tag is 1, text's is 3
    if(!selector) {
        // all tags
        result = getAllChildNodes(node);
    } else if(selector.indexOf(".") > -1) {
        // tags with class        
        var temp = selector.split("."),
            tagName = temp[0],
            className = temp[1];
        result = getChildNodesByClassName(node, className, tagName);
    } else {
        result = getChildNodesByTagName(node, selector);
    }
    return result;
}

function getAllChildNodes(node) {
    var childNodes = node.childNodes;
    var len = childNodes.length,
        result = Array(),
        nodeType = 1; // nodetype of tag is 1, text's is 3
    for (var i = 0; i < len; i++) {
        if(childNodes[i].nodeType == nodeType) {
            result.push(childNodes[i]);
        }
    }
    return result;
}

function getChildNodesByTagName(node, tagName) {
    var childNodes = getAllChildNodes(node),
        result = Array();
    for(var i = 0, len = childNodes.length; i < len; i++) {
        if(childNodes[i].nodeName.toLowerCase() == tagName.toLowerCase()) {
            result.push(childNodes[i]);
        }
    }
    return result;
}

function getChildNodesByClassName(node, className, tagName) {
    var childNodes = Array(),
        result = Array();
    if(!tagName) {
        childNodes = getAllChildNodes(node);
    } else {
        childNodes = getChildNodesByTagName(node, tagName);
    }
    for(var i = 0, len = childNodes.length; i < len; i++) {
        if(hasClass(childNodes[i], className)) {
            result.push(childNodes[i]);
        }
    }
    return result;
}

function hasClass(node, className) {
    if(node.classList) {
        return node.classList.contains(className);
    } else {
        var classList = node.className.split(" ");
        for(var i = 0, len = classList.length; i < len; i++) {
            if(classList[i] === className) {
                return true;
            }
        }
        return false;
    }
}