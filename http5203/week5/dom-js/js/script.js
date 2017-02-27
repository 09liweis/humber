var xml = new XMLHttpRequest();
var xmldoc;
xml.onload = function() {
	xmldoc = xml.responseXML;
	generateTable(xmldoc);
	
    var btn = document.getElementById('addbtn');
    btn.onclick = function(xmldoc) {
	  var fname = document.getElementById('fname').value;
	  var lname = document.getElementById('lname').value;
	  var position = document.getElementById('position').value;
	  //validations
	  if (fname == '' || lname == '' || position == '') {
		    //I'm going backwards because I want to set focus on the top-most invalid field
			checkInvalid(document.getElementById('position'));
			checkInvalid(document.getElementById('lname'));
			checkInvalid(document.getElementById('fname'));
			return false;
	  }
      createPerson(fname, lname, position);
	  //Clear form
	  document.getElementById('fname').value = '';
	  document.getElementById('lname').value = '';
	  document.getElementById('position').value = '';
	  //Below are two functions which implement two different ways to print the rows
	  //from the XML DOM: (1)regenerate entire table from the DOM, (2)only add the last-added
	  //child to the table from the DOM
	  //Use one or the other method, commenting out the one you don't want to use
	  //I'm using the generateTable() function because it works out with the delete
	  //functionality to ensure row indices are always regenerated.
	  //addLastRow() can only be used if you are only adding to the DOM.
	  generateTable();
	  //addLastRow();
	  return false;
	}	
	
}
function checkInvalid(inputelement) {
	if (inputelement.value == '') {
		inputelement.style.borderColor = 'red';	//make red
		inputelement.focus(); //set focus
	} else {
		inputelement.style.borderColor = ''; //default
	}
}
function createPerson(fnametext, lnametext, position) {
	//create a new <person> element
	var person = xmldoc.createElement('person');
	//create "position" attribute
	person.setAttribute('position', position);
	//create a <name> element
	var name = xmldoc.createElement('name');
	//create a <first> element
	var first = xmldoc.createElement('first');
	var fname = xmldoc.createTextNode(fnametext);
	first.appendChild(fname);
	//create a <last> element
	var last = xmldoc.createElement('last');
	var lname = xmldoc.createTextNode(lnametext);
	last.appendChild(lname);
	//add <first> and <last> to <name>
	name.appendChild(first);
	name.appendChild(last);
	//add <name> to <person>
	person.appendChild(name);
	//add <person> to <people>
	xmldoc.documentElement.appendChild(person);
}
function generateTable() {
	//generate data table rows from the given XML DOM tree
	var table = document.getElementById('result');
	//clear tbody to avoid seeing repeats
	table.innerHTML = '';
	var fnames = xmldoc.getElementsByTagName('first');
	var lnames = xmldoc.getElementsByTagName('last');
	var persons = xmldoc.getElementsByTagName('person');
	for (var i=0; i < fnames.length; i++) {
		//first name, last name, position
		table.innerHTML += '<tr><td>' + fnames[i].textContent + '</td><td>' + 
		  lnames[i].textContent + '</td><td>' + persons[i].getAttribute('position') + 
		  '</td><td><button type="button" class="delbtn">Delete</button></td></tr>';
	}
	
	//Once the table is generated, make sure the event handler for delete clicks is 
	//always there.
	//delete button event handlers
	var delbtns = document.getElementsByClassName('delbtn');
	//console.log(delbtns);
	//add handler for all delete buttons
	for (var i = 0; i < delbtns.length; i++) {
		//add button click handler
		delbtns[i].onclick = function(){
			removePerson(this); //the function to remove from the DOM
			generateTable(); //regenerate table; this also refreshes the row indices
		}
	}
}
function addLastRow() {
	//generate data table row from the given XML DOM tree's last <person> element
	//with this method, you do not need to regenerate the table, but instead just get the
	//last <person> child
	//this function is only for adding a row
	var last = xmldoc.documentElement.lastChild;
	var table = document.getElementById('result');
	table.innerHTML += '<tr><td>' + last.querySelector('first').textContent + '</td><td>' + 
		  last.querySelector('last').textContent + '</td><td>' + last.getAttribute('position') + 
		  '</td><td><button type="button" class="delbtn">Delete</button></td></tr>';
}
function removeRow(row) {
	//remove the row from the table
	var table = document.getElementById('result');
	table.removeChild(row);
	console.log(table.parentElement);
}
function removePerson(btn) {
	//Only remove <person> for the given row, but what if there are multiple rows with
	//the same values?
	//Remove by getting the position of the table row. Because we did not order our
	//XML data via Javascript, the table row position is the same as the position in the
	//XML DOM (i.e. table row 2 is the second person in the DOM).
	var row = btn.parentElement.parentElement; //button > td > tr
	var posIndex = row.rowIndex;
	
	//Remove <person> element from XML DOM at index (posIndex - 1) because 0 is the header
	//row so <tbody> rows start at 1.
	var rem = xmldoc.getElementsByTagName('person')[posIndex - 1];
	xmldoc.documentElement.removeChild(rem);
}
xml.onerror = function() {
	console.log("Error while getting XML...");
}
xml.open("POST", "xml/people.xml");
xml.responseType = "document";
xml.send();