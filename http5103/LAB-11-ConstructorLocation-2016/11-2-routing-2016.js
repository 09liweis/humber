//LAB 11-2: LOCATION OBJECT & ROUTING

//#### CONTENT FOR HOME PAGE ====
var contentHome = "<h3>Welcome to our website!</h3>";
contentHome += "<p>We have many wonderful products that you might be interested in.</p>";
//==== END OF CONTENT FOR HOME PAGE ####

//#### CONTENT FOR PRODUCTS PAGE ==== 
var contentProducts = "<h3>Our Top 5 Products</h3>";
contentProducts += "<ol><li>Computers</li><li>Hard Drives</li><li>USB Drives</li><li>Backup Drives</li><li>Printers</li></ol>";
//==== END OF CONTENT FOR PRODUCTS PAGE #### 

//#### CONTENT FOR ABOUT US PAGE ====
var contentAbout = "<h3>About Computer Corp</h3>";
contentAbout += "<p>We have been around a long time, so we know what we're doing.</p>";
contentAbout += "<p><h4>Customer Feedback</h4><q>You're the only computer company I trust</q>&mdash;Ernst Blofeld</p>";
//==== END OF CONTENT FOR ABOUT US PAGE ####

var output = document.getElementById('output');
var mainContent = document.getElementById('mainContent');
var page = window.location.search;
var result;
switch(page){
    case '?home':
        result = contentHome;
        mainContent.style.background = 'red';
        break;
    case '?products':
        result = contentProducts;
        mainContent.style.background = 'green';
        break;
    case '?about':
        result = contentAbout;
        mainContent.style.background = 'yellow';
        break;
    default:
        result = contentHome;
        mainContent.style.background = 'white';
        break;
}

output.innerHTML = result;