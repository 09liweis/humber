window.onload = function () {
    "use strict";
    var formHandle = document.forms[0];
    function processForm() {
        
        var inputName = formHandle.username.value;
        var inputPassword = formHandle.password.value;
        
        var msg = document.getElementById("msg");
        var result = checkLogin(inputName, inputPassword);
        msg.innerHTML = result  === true ? 'Welcome back!' : result;

        return false;
    }
    
    function md5Encrypt(password) {
        return CryptoJS.MD5(password)
    }
    
    function checkLogin(inputName, inputPassword) {
        console.log(inputName);
        console.log(inputPassword);
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
        } 
        
        if (inputName != username || md5Encrypt(inputPassword) != password) {
            return 'Invalid Username or Password.';
        }
    }

    formHandle.onsubmit = processForm;
    return false;
};