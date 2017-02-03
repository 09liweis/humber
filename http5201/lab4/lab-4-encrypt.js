//LAB 4 - JS ENCRYPTION
var form = document.forms[0];
form.onsubmit = function() {
    var output = document.getElementById('getMD5__output');
    var text = document.getElementById('md5form_txt').value;
    if (text === '') {
        output.innerHTML = 'Empty Password not valid';
        return false;
    }
    var hash = CryptoJS.MD5(text);
    
    output.innerHTML = 'Hash Password: ' + hash;
    return false;
};