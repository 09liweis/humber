var pfx = ["webkit", "moz", "MS", "o", ""];
function PrefixedEvent(element, type, callback) {
	for (var p = 0; p < pfx.length; p++) {
		if (!pfx[p]) type = type.toLowerCase();
		element.addEventListener(pfx[p]+type, callback, false);
	}
}

var ball = document.getElementById('ball');
ball.onclick = function() {
    var state = ball.style.animationPlayState;
    if (state == "paused") {
        ball.style.animationPlayState = "running";
    } else {
        ball.style.animationPlayState = "paused";
    }
}

PrefixedEvent(ball, "AnimationIteration", function() {
    
});