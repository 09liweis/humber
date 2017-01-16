function whichTransitionEvent(){
    var t;
    var el = document.createElement("fakeelement");
    var transitions = {
      'transition':'transitionend',
      'OTransition':'oTransitionEnd',
      'MozTransition':'transitionend',
      'WebkitTransition':'webkitTransitionEnd'
    }

    for(t in transitions){
        if( el.style[t] !== undefined ){
            return transitions[t];
        }
    }
}

function startball() {
  var transitionEvent = whichTransitionEvent();
  
  var launcher = document.getElementById("launcher");
  launcher.classList.add("launch");
  var ball = document.getElementById("ball-wrap");
  ball.classList.add("animate");
  var transitionEvent = whichTransitionEvent();
  transitionEvent && launcher.addEventListener(transitionEvent, function() {
	this.classList.remove("launch");
  });
  transitionEvent && ball.addEventListener(transitionEvent, function() {
	//on end, return ball to original position
	this.classList.remove("animate");
  });
}