var book1 = "A Picture Book of Dwight D Eisenhower";
var book2 = "Shanghai Shadows";
var book3 = "The Grand Mosque of Paris";
var book4 = "On the Run Signed Copy";
var book5 = "Irena Sendler and Children of the Warsaw Ghetto";
var book6 = "The Ultimate Weapon";
var book7 = "A Picture Book of Anne Frank";
var book8 = "The 79th Fighter Group";
var book9 = "Beware the Thunderbolt";
var book10 = "Protect and Avenge";

var books = [book1, book2, book3, book4, book5, book6, book7, book8, book9, book10];
var pickNum = prompt("Whick top 10 book would you like? Pick a number: 1-10");
while (pickNum == null || pickNum == "" || isNaN(pickNum) || parseInt(pickNum) < 1 || parseInt(pickNum) > 10) {
    pickNum = prompt("please enter a number between 1 and 10!");
}
alert("Number " + pickNum + " on the list is " + books[parseInt(pickNum) - 1]);
for (var i = 0; i < books.length; i++) {
    console.log("Book " + (i + 1) + ": " + books[i]);
}