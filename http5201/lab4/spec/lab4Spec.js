describe('Guess Number', function() {
    describe('guessNum Test to Pass', function() {
        it('should return a success message if the guess is correct', function() {
            expect(guessNum('4')).toEqual('You guessed it!');
        });
        
        it('should return a guess again message if the guess within range between 1 and 10', function() {
            expect(guessNum('2')).toEqual('Guess again.');
        });
    });
    
    describe('guessNum Test to Fail', function() {
        it('should return "A number was not input" if the value entered is not a number', function() {
            expect(guessNum('test')).toEqual('A number was not input');
        });
        
        it('should return "A value was not entered" if it receives an empty string', function() {
            expect(guessNum('')).toEqual('A value was not entered.');
        });
    });
    
    describe('GuessNum Boundary test', function() {
        it('should return "Guess again." if the value entered is 1.', function() {
            expect(guessNum(1)).toEqual('Guess again.');
        });
        
        it('should return "Way off! Pick between 1 and 10."', function() {
            expect(guessNum(0)).toEqual('Way off! Pick between 1 and 10.');
        });
        
        it('should return "Guess again." if the value entered is 10.', function() {
            expect(guessNum(10)).toEqual('Guess again.');
        });
        
        it('should return "Way off! Pick between 1 and 10." if the value entered is 11.', function() {
            expect(guessNum(11)).toEqual('Way off! Pick between 1 and 10.');
        });
    });
});