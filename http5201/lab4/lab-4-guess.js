//Lab 4 Testing With Jasmine
function guessNum(guess) {
    "use strict";
    var secretGuess = 4;//set value
    //Output messages
    var noNumber = "A number was not input";
    var noInput = "A value was not entered.";
    var correct = "You guessed it!";
    var validIncorrect = "Guess again.";
    var outOfRange = "Way off! Pick between 1 and 10.";

    if (isNaN(guess)) {
        return noNumber;
    }
    if (guess === "") {
        return noInput;
    }
    if (guess < 1 || guess > 10) {
        return outOfRange;
    }
    if (parseInt(guess) === secretGuess) {
        return correct;
    } else {
        return validIncorrect;
    }
}