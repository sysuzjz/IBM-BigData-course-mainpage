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

function getEventTarget(event) {
    return event.target || event.srcElement;
}
function addEvent(node, type, callback) {  
    if (window.attachEvent) { // IE  
        console.log(node);
        node.attachEvent("on" + type, callback);  
    } else if (window.addEventListener) {  
        node.addEventListener( type, callback, false);  
    } else {  
        alert("无法绑定事件，请反馈给管理员");  
    }
    return node;  
}
function delegate(node, childNodeSelector, eventType, func) {
    addEvent(node, eventType, function(event) {
        var target = getEventTarget(event);
        if(isClassSelector(childNodeSelector)) {
            var className = splitSelector(childNodeSelector)["className"];
            if(hasClass(target, className)) {
                func(event);
            }
        } else if(isIdSelector(childNodeSelector)) {
            var id = splitSelector(childNodeSelector)["id"];
            if(target.id == id) {
                func(event);
            }
        } else {
            if(target.nodeName.toLowerCase() == childNodeSelector.toLowerCase()) {
                func(event);
            }
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
    } else if(isClassSelector(selector)) {
        // tags with class        
        var temp = splitSelector(selector),
            tagName = temp["tagName"],
            className = temp["className"];
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



function isClassSelector(selector) {
    return selector.indexOf(".") > -1;
}
function isIdSelector(selector) {
    return selector.indexOf("#") > -1;
}
function splitSelector(selector) {
    if(isClassSelector(selector)) {
        var arr = selector.split(".");
        return {
            "tagName": arr[0],
            "className": arr[1]
        };
    } else if(isIdSelector(selector)) {
        var arr = selector.split("#");
        return {
            "tagName": arr[0],
            "id": arr[1]
        };
    } else {
        return selector;
    }
}



function each(nodeArr, func) {
    if(!(nodeArr instanceof Array)) {
        return;
    }
    for(var i = 0, len = nodeArr.length; i < len; i++) {
        func.call(nodeArr[i]);
    }
}

function getWidth(node) {
    var width = getStyle(node, "width");
    if(width === "auto") {
        width = node.offsetWidth;
    }
    return parseInt(width);
}

function getStyle(node, styleName) {
    var computedStyle = null;
    if(node.currentStyle) {
        computedStyle = node.currentStyle;
    } else {
        computedStyle = window.getComputedStyle(node, null);
    }
    return computedStyle[styleName];
}

function setStyle(node, styleName, styleValue) {
    var pxArr = ["width", "height", "lineHeight", "left", "top", "padding", "paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "fontSize"];
    var unit = inArray(pxArr, styleName) ? "px" : "";
    node.style[styleName] = styleValue + unit;
}

function inArray(arr, value) {
    if(!(arr instanceof Array) || !arr || !value) {
        return false;
    }
    for(var i = 0, len = arr.length; i < len; i++) {
        if(arr[i] === value) {
            return true;
        }
    }
    return false;
}