
delegate(document, ".delete-btn", "click", function(event) {
    event.preventDefault();
    if(!confirm("确定删除吗？")) {
        return false;
    }
    var target = getEventTarget(event),
        tableNode = closestNode(target, ".table-container");
    var func = tableNode.getAttribute("data-func"),
        id = target.getAttribute("data-id");
    var form = createForm(func, id);
    form.submit();;
})

function createForm(func, id) {
    var form = document.createElement("form");
    form.action = "../presenter/admin.action.php";
    form.method = "post";
    var content =   '<input type="hidden" name="id" value="' + id + '" /> \
                     <input type="hidden" name="func" value="' + func + '" /> \
                     <input type="submit" value="submit" /> \
                    ';
    form.innerHTML = content;
    return form;
}

var bodyboxNode = document.getElementById("bodybox");
delegate(bodyboxNode, ".edit-btn", "click", function(event) {
    event.preventDefault();
    hideElementById("content-container");
    showElementById("edit-container");
})