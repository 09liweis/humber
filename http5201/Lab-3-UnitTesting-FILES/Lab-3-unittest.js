function checkHumbrId(id) {
    "use strict";
    var pattern = /^(N|n)[0-9]{8}$/;
    return pattern.test(id);
}

function test__checkHumbrId(valueIn, expectation) {
    "use strict";
    var result = checkHumbrId(valueIn);
    var passOrFail = (result === expectation) ? "<span class='pass'>==PASS==</span>" : "<span class='fail'>xxFAILxx</span>";
    var msg = "Value tested: " + valueIn + " Expected result: " + result + " " + passOrFail;
    
    var msgBox = document.getElementById("data");
    msgBox.innerHTML += (msg + "<br /><br />") ;
}

test__checkHumbrId("n01197743", true);
test__checkHumbrId("N39393939", true);
test__checkHumbrId("k011234554", false);
test__checkHumbrId("n0203202", false);
test__checkHumbrId("893798343", false);
test__checkHumbrId("nn2323232", false);

test__checkHumbrId("n020320212123", true);
test__checkHumbrId("8937983a43", true);
test__checkHumbrId("nn2323232nnn", true);