//#### ASSIGNMENT 5 - STORE HOURS ####
window.onload = function() {
    
    function getTextFile(value) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    schedTbl.innerHTML = xhr.responseText;
                } else {
                    alert("Connection was unsuccessfuly");
                }
            }
        }
        var fileName = "sched" + value + ".txt";
        xhr.open("GET", fileName, true);
        xhr.send(null);
    }
    var schedTbl = document.getElementById("schedTbl");
    var options = document.forms.siteHours.routeRb;
    
    for (var i = 0; i < options.length; i++) {
        options[i].onclick = function() {
            getTextFile(this.value);
        }
    }
    
}
