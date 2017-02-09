window.onload = function () {
    "use strict";
    var formHandle = document.forms[0];
    function processForm() {
        
        var inputName = formHandle.name.value;
        var inputPassword = formHandle.password.value;
        
        var msg = document.getElementById("msg");
        msg.innerHTML = checkLogin(inputName, inputPassword) === true ? 'Welcome back!' : checkLogin();

        return false;
    }
    
    function md5Encrypt(password) {
        return CryptoJS.MD5(password)
    }
    
    function checkLogin(inputName, inputPassword) {
        const username = 'sam';
        const password = '907134f741df0774ad1e92b67e7d2fb6';
        
        if (inputName === '') {
            return 'No username entered.';
        }
        
        if ( inputPassword === '') {
            return 'No password entered.';
        }
        
        if (inputName == username && md5Encrypt(inputPassword) == password) {
            return true;
        } else {
            return 'Invalid Username or Password.';
        }
        
        
        // if (inputPassword === "" && inputName === "") {
        //     formHandle.password.style.background = "red";
        //     formHandle.name.style.background = "red";
        //     return false;
        // }
        // if (inputName === "") {
        //     formHandle.name.style.background = "red";
        //     return false;
        // }
        // formHandle.name.style.background = "white";
        // if (inputPassword === "") {
        //     formHandle.password.style.background = "red";
        //     return false;
        // }
        // formHandle.password.style.background = "white";
        
        
    }

    formHandle.onsubmit = processForm;
    return false;
};