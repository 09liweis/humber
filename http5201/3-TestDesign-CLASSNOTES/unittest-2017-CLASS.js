//LESSON 3 - UNIT TESTING
//BELOW, IS THE FUNCTION I WISH TO TEST...
/**
 * Validate age is between 18 & 25 years old.
 * Returns true if age validates.
 * @param {integer} ageIn
 */
function checkAge(ageIn) {
    "use strict";
    var ageTest = false;
    if (!isNaN(ageIn)) {
        parseInt(ageIn);
    }
    if (ageIn >= 18 && ageIn <= 25) {
        ageTest = true;
    }
    return ageTest;
}

//NOW, WE WILL CREATE A TEST FOR IT...
/*  Unit Test for checkAge()
*/
//This function will have 2 parameters: the value we want to test, and the boolean value that we expect the function will return based on the value we want to test.
function test__checkAge(valueIn, expected) {
    "use strict";

//Create a variable to hold the result of calling our function with the provided value.
    var result = checkAge(valueIn);

//Print out value we are testing, and result of the function, and our expectation.
    var msg = "Value: " + valueIn + " | Result: " + result + " | Expected: " + expected + "<br />";

//So we can see the result, let's grab the output element from the html.
    var msgBox = document.getElementById("msgs");
    msgBox.innerHTML += msg;
}

//TIME TO RUN OUR UNIT TEST FUNCTION ON OUR checkAge FUNCTION...
//LET'S APPLY SOME TESTING STRATEGIES...
test__checkAge(22, true);//TEST TO PASS WITH KNOWN PASSING VALUE
test__checkAge(300, false);//TEST TO FAIL WITH KNOWN FAILING VALUE
test__checkAge(18, true);//BOUNDARY TESTING (BOTTOM OF RANGE)
test__checkAge(17, false);//BOUNDARY TESTING (BOTTOM OF RANGE)
test__checkAge(25, true);//BOUNDARY TESTING (TOP OF RANGE)
test__checkAge(25, false);//BOUNDARY TESTING (TOP OF RANGE)