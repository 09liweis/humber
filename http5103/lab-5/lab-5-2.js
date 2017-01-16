//#### LAB 5 - FUNCTIONS & OBJECTS ####
//PART 2:  I OBJECT!
//alert("Connected");//COMMENT OUT AS SOON AS YOU KNOW YOU ARE CONNECTED!!!!

var meObject = { 
	name: "Jessica",
	age: 28, 
	job: "server", 
	phone: "iPhone",
	message: function (){
		alert("My name is " + meObject.name + " " + "and I am a " + meObject.job);
	}

};

console.log(meObject.name);

//alert("My name is " + meObject.name + " " + "and I am a " + meObject.job);

meObject.message(); 
