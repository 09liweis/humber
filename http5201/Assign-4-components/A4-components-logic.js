//ASSIGNMENT 4 WEB COMPONENTS
//LOGIC FILE
//IN THIS FILE YOU WILL SIMPLY GRAB YOUR CUSTOM ELEMENT AND ATTACH YOUR METHOD FROM YOUR MODULE TO IT.

window.onload = function() {
    var time = document.getElementById('time');
    renderTime();
    setInterval(renderTime(), 1000);
    
    function renderTime() {
        var date = new Date();
        var hour = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();
        time.innerHTML = hour + ' : ' + min + ' : ' + sec;
    }
};