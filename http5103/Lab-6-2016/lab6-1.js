//#### LAB 6 - DOM MANIPULATION ####
//PART 1: MYSTERY BOX
//alert("test");//COMMENT OUT AS SOON AS YOU KNOW YOU ARE CONNECTED!!!!

var mysteryBox = document.getElementById("mysteryBox");
var buttonBox = document.getElementById("buttonBox");

mysteryBox.addEventListener("mouseover", dostuff);

function dostuff() {
    var confirmation = confirm("Do you want to see something?");
    if (confirmation == true) {
        mysteryBox.style.display = "none";
        buttonBox.style.display = "block";
    }
}

buttonBox.onclick = clickMe;

function clickMe() {
    buttonBox.style.width = "600px";
    buttonBox.style.backgroundColor = "orange";
    var head2 = document.getElementById("header");
    head2.innerHTML = "Surprise me!";
}