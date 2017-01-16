////LAB 4 - ARRAYS & LOOPS - PART 2
//alert("Part 2");//COMMENT THIS OUT ONCE CONNECTED

var teams = ["Nathan", "Evan", "Ahmed", "Sam", "Chen"];
console.log(teams);

teams.pop();
console.log(teams);

teams.unshift("Sean");
console.log(teams);

teams.sort();
console.log(teams);

console.log("We have " + teams.length + " people in our group.");

for (var i = 0; i < teams.length; i++) {
    console.log(teams[i] + " is # " + (i + 1));
}