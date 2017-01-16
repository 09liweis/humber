//######## LAB 3-1 LOGIN ########
alert("hey");//COMMENT OUT ONCE CONNECTED TO YOUR HTML PAGE
//VARIABLES
var username = "monkey";
var password = "banana";
var name = prompt("Please enter Username");
console.log(name);
var secretCode = prompt("Please enter Password");
console.log(secretCode);
if (name == username && secretCode == password){ 
	alert("Welcome back"+ " "+ username);
	console.log("Login Successful");
}else{
	alert("invalid username/password");
	console.log ("Login Fail");
}







//LOGIC