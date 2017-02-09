describe('Assignment 2 Test', function() {
    describe('Login Test', function() {
        it('should return true if the given username and password are correct ', function() {
            expect(checkLogin('sam', 'kanamemadoka2017')).toEqual(true);
        });
        
        it('should return a message "Invalid Username or Password." if given username or password are not correct ', function() {
            expect(checkLogin('sm', 'kandoka2017')).toEqual('Invalid Username or Password.');
        });
        
        it('should return a message "No username entereded." if given username is empty', function() {
            expect(checkLogin('', 'kandoka2017')).toEqual('No username entered.');
        });
        
        it('should return a message "No password entereded." if given password is empty', function() {
            expect(checkLogin('sam', '')).toEqual('No password entered.');
        });
    });
    
    describe('MD5 Encrytion', function() {
        it('should return a 32 character string', function() {
            expect(md5Encrypt('asfdasd')).toMatch(/[\w|\d]{32}/);
        });
    });
    
    // describe('guessNum Test to Fail', function() {
    //     it('should return "A number was not input" if the value entered is not a number', function() {
    //         expect(guessNum('test')).toEqual('A number was not input');
    //     });
        
    //     it('should return "A value was not entered" if it receives an empty string', function() {
    //         expect(guessNum('')).toEqual('A value was not entered.');
    //     });
    // });
    
    // describe('GuessNum Boundary test', function() {
    //     it('should return "Guess again." if the value entered is 1.', function() {
    //         expect(guessNum(1)).toEqual('Guess again.');
    //     });
        
    //     it('should return "Way off! Pick between 1 and 10."', function() {
    //         expect(guessNum(0)).toEqual('Way off! Pick between 1 and 10.');
    //     });
        
    //     it('should return "Guess again." if the value entered is 10.', function() {
    //         expect(guessNum(10)).toEqual('Guess again.');
    //     });
        
    //     it('should return "Way off! Pick between 1 and 10." if the value entered is 11.', function() {
    //         expect(guessNum(11)).toEqual('Way off! Pick between 1 and 10.');
    //     });
    // });
});