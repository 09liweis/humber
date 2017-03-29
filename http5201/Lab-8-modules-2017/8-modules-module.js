//LAB 8 - MODULES - MODULE FILE
//THIS FILE CONTAINS YOUR CUSTOM MODULE.
var nameTag = (function(){
    var devName = "Sam";
    var modName = "Name Tag";
    var cite = function() {
        alert(devName + " created this " + modName + " model!");
    };
    
    var module = {
        citeMe: cite
    };
    return module;
})();