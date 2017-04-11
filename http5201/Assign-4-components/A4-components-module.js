//ASSIGNMENT 4 WEB COMPONENTS
//MODULE FILE
//IN THIS FILE YOU WILL CREATE YOUR CUSTOM MODULE FOR YOUR REQUIRED FUNCTIONALITY AND EXPOSE IT THROUGH A 'PUBLICLY' ACCESSIBLE METHOD.

var clock = (function(){
    var renderTime = function() {
        var date = new Date();
        var hour = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();
        return hour + ' : ' + (min < 10 ? '0' + min : min) + ' : ' + ((sec < 10) ? '0' + sec : sec);
    };
    
    var module = {
        renderCurrent: renderTime
    };
    return module;
})();
