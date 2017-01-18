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
        } else {
            form.name.style.borderColor = 'green';
        }
        
        if (email == '') {
            form.email.style.borderColor = 'red';
        } else {
            form.email.style.borderColor = 'green';
        }
        
        if (program == '') {
            form.program.style.borderColor = 'red';
        } else {
            form.program.style.borderColor = 'green';
        }
        
        var genderMsg = document.getElementById('gender-msg');
        if (gender == '') {
            genderMsg.style.display = 'inline';
        } else {
            genderMsg.style.display = 'none';
        }
        
        if (name == '' || email == '' || program == '' || gender == '') {
            return false;
        }

        if (name != '' && email != '' && program != '' && gender != '') {
            window.location = '/process.php';
            return false;
        }
    };
};