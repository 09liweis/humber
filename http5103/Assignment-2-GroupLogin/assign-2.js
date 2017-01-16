//My team number is 4
var teamNum = "4";
var teammates = ["Nathan", "Chen", "Sam", "Ahamd", "Sheenam"];

var teamNumInput = prompt("Please enter your team number: ");
if (teamNumInput == teamNum) {
    var memberFirstName = prompt("Please enter your first name: ");
    if (teammates.indexOf(memberFirstName) != -1) {
        alert("Welcome " + memberFirstName);
    } else if (memberFirstName == null || memberFirstName == "") {
        alert("You need to provide correct first name of your team member");
    } else {
        alert("You are denied access");
    }
} else if (teamNumInput == null || teamNumInput == "") {
    alert("You need to provide correct team number");
} else {
    alert("You are denied access");
}