//#### LAB 5 - FUNCTIONS & OBJECTS ####
//PART 1:  AN AVERAGE FUNCTION
//alert("Connected");//COMMENT OUT AS SOON AS YOU KNOW YOU ARE CONNECTED!!!!

function average(number1, number2, number3, number4, number5){
	var average = ((number1 + number2 + number3 + number4 + number5) / 5);
	return average.toFixed(1);
}
console.log(average(5, 10, 15,20, 25)); 

var projectManage = 90;
var digitalDesign = 80; 
var webProgramming = 70; 
var webApp = 18; 
var dataBase = 9; 
var programAverage = average(projectManage,digitalDesign,webProgramming,webApp,dataBase);

if (programAverage >= 65){
	alert("Congrats! You passed!");
} else { 
	alert("review required");

}