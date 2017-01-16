//LAB 9 - COOKIES
function makeCookie(cookieName, cookieValue, lifespan) {
    document.cookie = cookieName + "=" + cookieValue + ";max-age=" + lifespan;
}

window.onload = function() {
    var newMsgBox = document.getElementById("newMsgBox");
    var body = document.body;
    var cookieArray = document.cookie.split(";");
    
    if (cookieArray.length > 1) {
        var nameValue = cookieArray[0].split("=")[1];
        var colorValue = cookieArray[1].split("=")[1];
        
        newMsgBox.innerHTML = "Welcome " + nameValue + "!";
        body.style.background = colorValue;
        
    }
    
    
    var form = document.forms.infoForm;
    
    form.onsubmit = function() {
        //validation for name
        var nameValue = form.f_name.value;
        var colorValue = form.f_color.value;
        
        makeCookie("name", nameValue, 1000);
        makeCookie("color", colorValue, 1000);
        
        //localStorage.setItem("name", nameValue);
        
        newMsgBox.innerHTML = "Welcome " + nameValue + "!";
        body.style.background = colorValue;
        
        return false;
    }
    
    var btnDel = document.getElementById("btnDel");
    btnDel.onclick = function() {
        //document.cookie = "name=;color=;";
    }
    
}