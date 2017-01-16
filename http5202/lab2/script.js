window.onload = function() {
    var form = document.forms[0];
    form.onsubmit = function() {
        var name = form.name.value;
        var email = form.email.value;
        var program = form.program.value;
        var gender = form.gender.value;
        var adult = form.adult.checked;
        
        
        if (name == '') {
            form.name.style.borderColor = 'red';
            return false;
        } else {
            form.name.style.borderColor = 'green';
        }
        
        if (email == '') {
            form.email.style.borderColor = 'red';
            return false;
        } else {
            form.email.style.borderColor = 'green';
        }
        
        if (program == '') {
            form.program.style.borderColor = 'red';
            return false;
        } else {
            form.program.style.borderColor = 'green';
        }
        
        if (gender == '') {
            var genderMsg = document.getElementById('gender-msg');
            genderMsg.style.display = 'inline';
            return false;
        } else {
            genderMsg.style.display = 'none';
        }
        return false;
        if (name != '' && email != '' && program != '' && gender != '') {
            window.location = '/process.php';
        }
        return false;
    };
};