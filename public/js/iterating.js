(function(){
    "use strict";

    // TODO: Create an array of 4 people's names 
    //using literal array notation, in a variable called 'names'. 

    var names = ["Ness", "Paula", "Jeff", "Poo"];

    // TODO: Create a log statement that will log the 
    //number of elements in the names array.

    console.log("There are " + names.length + " names.");

    // TODO: Create log statements that will print each 
    //of the names array elements individually.

     for (var i = 0; i < names.length; i++) {
   		console.log('The name at index ' + i + " is " + names[i] + ".")
   	}


   	names.forEach(function (element, index, array) {
   		console.log("The name at index " + index + " is " + element + ".");
   	});


    //BONUS exercise -- Mad Libs

   /* var libs = new Array();

    libs[0] = prompt("Give me a Name.");
    libs[1] = prompt("Give me an adjective.");
    libs[2] = prompt("Give me an -ing verb.");
    libs[3] = prompt("Give me an object.");


    alert("Hello! My name is " + libs[0] + " and I am a " + libs[1] + " grandpa.");
    alert("My hobbies include " + libs[2] + " some " + libs[3] + ".");
    */


})();
