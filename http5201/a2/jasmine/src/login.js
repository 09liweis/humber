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
    
}

function md5Encrypt(password) {
    return CryptoJS.MD5(password)
}