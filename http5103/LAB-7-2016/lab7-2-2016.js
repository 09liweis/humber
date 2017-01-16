/* LAB 7.2 - STOP TIME */
var interval;

document.getElementById('btnStart').onclick = function() {
    interval = setInterval(displayTime, 1000);
}

document.getElementById('btnStop').onclick = function() {
    clearInterval(interval);
}

function displayTime() {
    var date = new Date();
    var hour = date.getHours();
    var min = date.getMinutes();
    var sec = date.getSeconds();
    document.getElementById('hoursOut').innerHTML = format(hour) + ':';
    document.getElementById('minsOut').innerHTML = format(min) + ':';
    document.getElementById('secsOut').innerHTML = format(sec);
}

function format(number) {
    if (number < 10) {
        return '0' + number;
    } else {
        return number;
    }
}