////LAB 4 - ARRAYS & LOOPS - PART 3
//alert("Part 3");//COMMENT THIS OUT ONCE CONNECTED

/*
Step 1: create an empty array for holding cart items
Step 2: 
*/


var items = [];
var threshold = 35;
var shoppingAmount = 0;

while (shoppingAmount <= threshold) {
    var item = prompt("Put the dollar value of new item", "dollar value");
    shoppingAmount += parseInt(item);
    items.push(item);
}

alert("Your shipping for this order will be free! Your total price is $" + shoppingAmount + ".");
console.log("Free Shipping Items: " + items.join(" | "));