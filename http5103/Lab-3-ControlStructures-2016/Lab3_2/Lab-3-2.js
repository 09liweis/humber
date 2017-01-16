//######## LAB 3-2 EMAIL SIGNUP ########
//alert("hey");//COMMENT OUT ONCE CONNECTED TO YOUR HTML PAGE
//VARIABLES
var userChoice = confirm("Sign up for newsletter?");
var yesMessage = "your email has been added to our list";
var noMessage = "we will not bother you again.";
var messageOut;
if (userChoice === true){
	messageOut = yesMessage;
}else{
	messageOut = noMessage;
}
alert("Thank you"+" "+messageOut);



//LOGIC