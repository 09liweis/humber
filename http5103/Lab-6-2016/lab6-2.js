//#### LAB 6 - DOM MANIPULATION ####
//PART 2: TOP 5 BOOK OBJECTS
//alert("test");//COMMENT OUT AS SOON AS YOU KNOW YOU ARE CONNECTED!!!!

var book1 = {
    title: "A Picture Book of Dwight D Eisenhower",
    author: "alsdkjf",
    publishDate: "1916"
};
var book2 = {
    title: "Shanghai Shadows",
    author: "alsdkjf",
    publishDate: "2006"
};
var book3 = {
    title: "The Grand Mosque of Paris",
    author: "alsdkjf",
    publishDate: "2013"
};
var book4 = {
    title: "On the Run Signed Copy",
    author: "alsdkjf",
    publishDate: "2011"
};
var book5 = {
    title: "Irena Sendler and Children of the Warsaw Ghetto",
    author: "alsdkjf",
    publishDate: "2000"
};

var books = [book1, book2, book3, book4, book5];

var btnStart = document.getElementById("btn_start");
btnStart.onclick = function() {
    var bookIndex = prompt("Which top 5 book would you like?", "Pick a number: 1-5");
    bookIndex = parseInt(bookIndex);
    
    if ((bookIndex) >= 0 && (bookIndex) <= 5) {
        var book = books[bookIndex - 1];
        
        var outputRow = document.getElementById("outputRow");
        outputRow.innerHTML = '<td id="tdRank"> + bookIndex + </td>'
				+ '<td id="tdTitle"> + book.title + </td>'
				+ '<td id="tdAuthor"> + book.author + </td>'
				+ '<td id="tdPublished"> + book.publishDate +</td>';
        
        var tdRank = document.getElementById("tdRank");
        tdRank.innerHTML = bookIndex;
        var tdTitle = document.getElementById("tdTitle");
        tdTitle.innerHTML = book.title;
        var tdAuthor = document.getElementById("tdAuthor");
        tdAuthor.innerHTML = book.author;
        var tdPublished = document.getElementById("tdPublished");
        tdPublished.innerHTML = book.publishDate;
        
        
    } else {
        alert("You entered the wrong number");
    }
}