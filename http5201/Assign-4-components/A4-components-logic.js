//ASSIGNMENT 4 WEB COMPONENTS
//LOGIC FILE
//IN THIS FILE YOU WILL SIMPLY GRAB YOUR CUSTOM ELEMENT AND ATTACH YOUR METHOD FROM YOUR MODULE TO IT.

window.onload = function() {
    
    var clockTmplt = document.querySelector('#tmplt__clock');
    var clockProto = Object.create(HTMLElement.prototype);

    clockProto.createdCallback = function() {
        var root = this.attachShadow({mode: 'open'});
        root.appendChild(document.importNode(clockTmplt.content, true));
    };
    
    
    var HumberClock = document.registerElement('humber-clock', {prototype: clockProto});
    
    var time = document.getElementById('time');
    time.innerHTML = clock.renderCurrent();
    setInterval(function(){
        time.innerHTML = clock.renderCurrent();
    }, 1000);
};