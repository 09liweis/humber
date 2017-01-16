//######## LAB 3-3 EMAIL SIGNUP EXTENDED ########
//alert("hey");//COMMENT OUT ONCE CONNECTED TO YOUR HTML PAGE
//VARIABLES
var userChoice = confirm("Sign up for newsletter?");
var messageOut;
var messageNo = "Thank you, we will not bother you again.";
var messageYes = "Thank you, our next newsletter will be sent to ";

//check if user agree to sign up
// if user agree to sign up, provide popup textbox where user types email 

// if user input is empty/ not provided, we provide message that says "thank you but your email was not valid"

//if user hits cancel, message says "thank you we will not bother you again"


//LOGIC
if (userChoice === true) {
	var email = prompt("Please enter your email as format me@example.com?");
	if (email === "" || email == null) {
		alert("Thank you, but your email was not valid.");
	} else {
		alert(messageYes + " " + email);
	}
} else {
	alert(messageNo);
}
