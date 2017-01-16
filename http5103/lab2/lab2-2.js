//#### LAB 2.2 OPERATORS WITH VARIABLES AT A RESTAURANT ####
var varItem1 = 9.99; //CHICKEN PASTA
var varItem2 = 14.50; //STEAK
var varItem3 = 7.85; //GARLIC BREAD
var varSubtotal = varItem1 + varItem2 + varItem3; //TOTAL OF BILL BEFORE DISCOUNT AND TAX
var varDiscount = 5; //FIVE BUCKS OFF COUPON
var varSubAfterDiscount = varSubtotal - varDiscount;  //TOTAL AFTER COUPON AND BEFORE TAX
var varTax = 1.13;  //HST
var varTotal = varSubAfterDiscount * varTax; //TOTAL AFTER TAX
var varDiners = 2;//NUMBER OF PEOPLE AT A TABLE
var varEach = varTotal / varDiners; //TOTAL FOR EACH CUSTOMER (TWO CUSTOMERS)
var varBillMessage = "You each owe $ " + varEach.toFixed(2);  //OUTPUT MESSAGE FOR ALERT BOX
alert(varBillMessage);
