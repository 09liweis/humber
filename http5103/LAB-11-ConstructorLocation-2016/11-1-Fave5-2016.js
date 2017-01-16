/*LAB 11-1: CONSTRUCTOR FUNCTIONS*/
//FAVE FRIEND CONSTRUCTOR FUNCTION

var Friend = function(name, phone) {
    this.name = name;
    this.phone = phone;
};

window.onload = function(){
	var faveFive = [];//FAVE 5 ARRAY
	var form = document.forms.fave_form;
	form.onsubmit = function() {
	   // var name1 = form.n_1.value;
    // 	var phone1 = form.p_1.value;
    	
    // 	var name2 = form.n_2.value;
    // 	var phone2 = form.p_2.value;
    	
    // 	var name3 = form.n_3.value;
    // 	var phone3 = form.p_3.value;
    	
    // 	var name4 = form.n_4.value;
    // 	var phone4 = form.p_4.value;
    	
    // 	var name5 = form.n_5.value;
    // 	var phone5 = form.p_5.value;
    	
    // 	var friend1 = new Friend(name1, phone1);
    // 	var friend2 = new Friend(name2, phone2);
    // 	var friend3 = new Friend(name3, phone3);
    // 	var friend4 = new Friend(name4, phone4);
    // 	var friend5 = new Friend(name5, phone5);
    	
    // 	faveFive.push(friend1);
    // 	faveFive.push(friend2);
    // 	faveFive.push(friend3);
    // 	faveFive.push(friend4);
    // 	faveFive.push(friend5);
    	
    	for (var i = 1; i <=5; i++) {
    	    var name = document.getElementById('n_' + i).value;
    	    var phone = document.getElementById('p_' + i).value;
    	    var friend = new Friend(name, phone);
    	    faveFive.push(friend);
    	}
    	
    	var friendList = '<ol>';
    	faveFive.map(function(f) {
    	    friendList += '<li>' + f.name + '</li>';
    	});
    	friendList += '</ol>';
    	
    	var faveList = document.getElementById('faveList');
    	faveList.innerHTML = friendList;
    	
    	var faveBlock = document.getElementById('faveBlock');
    	
    	form.style.display = 'none';
    	faveBlock.style.display = 'block';
    	return false;
	}



}//END OF onload FUNCTION