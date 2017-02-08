var xml = new XMLHttpRequest();
xml.onload = function() {
  var xmldoc = xml.responseXML;
  console.log(xmldoc.documentElement.nodeName);
  
  //create a new <person> element
  var person = xmldoc.createElement('person');
  var pos = xmldoc.createAttribute('position');
  pos.value = 'Private Investigator';
  person.setAttributeNode(pos);
  //create a <name> element
  var name = xmldoc.createElement('name');
  //create a <first> element
  var first = xmldoc.createElement('first');
  var fname = xmldoc.createTextNode('Sterling');
  first.appendChild(fname);
  //create a <last> element
  var last = xmldoc.createElement('last');
  var lname = xmldoc.createTextNode('Archer');
  last.appendChild(lname);
  //add <first> and <last> to <name>
  name.appendChild(first);
  name.appendChild(last);
  //add <name> to <person>
  person.appendChild(name);
  //add <person> to <people>
  xmldoc.documentElement.appendChild(person);
  
  //print out first name of every person
  var fnames = xmldoc.getElementsByTagName('first');
  var div = document.getElementById('result');
  for (var i=0; i < fnames.length; i++) {
	div.innerHTML += fnames[i].textContent + '<br />';
	/* div.innerHTML += fnames[i] + '<br />';
	console.log(fnames[i]); */
  }
}
xml.onerror = function() {
  console.log('Error while getting XML...');
}
xml.open("GET", "xml/people.xml");
xml.responseType = "document";
xml.send();