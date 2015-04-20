// 绑定删除按钮函数
var tableNode = document.getElementById('table-container');
if(tableNode) {
    delegate(tableNode, ".delete-btn", "click", function(event) {
        event.preventDefault();
        var target = getEventTarget(event);
        var func = tableNode.getAttribute("data-func"),
            id = target.getAttribute("data-id");
        var form = createForm(func, id);
        form.submit();
    })
}

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