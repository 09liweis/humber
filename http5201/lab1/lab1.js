window.onload = function () {
    "use strict";
    var formHandle = document.forms[0];
    function processForm() {
        var name = formHandle.name.value;
        var password = formHandle.password.value;
        if (password === "" && name === "") {
            formHandle.password.style.background = "red";
            formHandle.name.style.background = "red";
            return false;
        }
        if (name === "") {
            formHandle.name.style.background = "red";
            return false;
        }
        formHandle.name.style.background = "white";
        if (password === "") {
            formHandle.password.style.background = "red";
            return false;
        }
        formHandle.password.style.background = "white";
        var msg = document.getElementById("msg");
        msg.innerHTML = "The name is :" + name + "<br>" + "The password is :" + password;
        formHandle.name.value = "";
        formHandle.password.value = "";
        return false;
    }
    formHandle.onsubmit = processForm;
    return false;
};