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
});