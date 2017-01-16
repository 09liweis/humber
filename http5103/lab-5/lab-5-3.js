//#### LAB 5 - FUNCTIONS & OBJECTS ####
//PART 3:  MAKE THE BANK
//

var bankCustomer = {
	lastName: "Li",
	branchNumber: "010",
	accountBalance: 2000.00,
	interestRate: 0.03,
	multipleAccounts: false,
	makeDeposit: function(amount) {
		bankCustomer.accountBalance += amount;
		console.log("Thank you, your current balance is now $ " + bankCustomer.accountBalance.toFixed(2));
		return "Thank you, your current balance is now $ " + bankCustomer.accountBalance.toFixed(2);
	},
	makeWithDrawal: function(amount) {
		bankCustomer.accountBalance -= amount;
		console.log("Thank you, your current balance is now $ " + bankCustomer.accountBalance.toFixed(2));
		return "Thank you, your current balance is now $ " + bankCustomer.accountBalance.toFixed(2);
	},
	addInterest: function() {
		if (bankCustomer.multipleAccounts === true) {
			bankCustomer.interestRate += 0.005;
		}
		bankCustomer.accountBalance += (bankCustomer.accountBalance * bankCustomer.interestRate);
		console.log("Thank you, your current balance is now $ " + bankCustomer.accountBalance.toFixed(2));
		return "Thank you, your current balance is now $ " + bankCustomer.accountBalance.toFixed(2);
	}
};

bankCustomer.makeDeposit(1000);

bankCustomer.makeWithDrawal(500);

bankCustomer.addInterest();