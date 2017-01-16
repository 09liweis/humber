//#### ASSIGNMENT 4 - VETERINARY CLINIC ####
//pet objects
var pet1 = {
    type: "dog",
    name: "Wow Wow",
    breed: "Golden Retrievers",
    age: 4,
};

var pet2 = {
    type: "cat",
    name: "Mew Mew",
    breed: "Ragdoll",
    age: 3,
};

//client Object
var client = {
    clientName: "Sam",
    phone: "6477601452",
    pets: [pet1, pet2],
    address: "1209 Huntingwood Drive",
};

var clientName = document.getElementById("clientName");
clientName.innerHTML = client.clientName;

var clientBtn = document.getElementById("clientBtn");
var pet1Container = document.getElementById("pet1");
var pet2Container = document.getElementById("pet2");

clientBtn.onclick = function() {
    pet1Container.innerHTML = pet1.name + " (" + pet1.type + ")";
    pet2Container.innerHTML = pet2.name + " (" + pet2.type + ")";
}