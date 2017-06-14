"use strict";

// Don't change the next two lines!
// These creates two variables for you:
//     one with the colors of the rainbow
//     another with a single random color value
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'red'; // TODO: change this to your favorite color from the list

if (color == 'red') {
	console.log('Red is the Color of Blood');
	alert('Red is the Color of Blood.');
} else if (color == 'orange') {
	console.log('Orange is the color of a fruit I cannot remember the name of.');
	alert('Orange is the color of a fruit I cannot remember the name of.');
} else if (color == 'yellow') {
	console.log ("Yellow is the color of egg yolk");
	alert ("Yellow is the color of egg yolk.");
} else if (color == 'green') {
	console.log("Green is the color of the Hulk.");
	alert("Green is the color of the Hulk");
} else if (color == 'blue') {
	console.log("Blue is the color of my feelings )+:");
	alert("Blue is the color of my feelings. )+:");
} else {
	console.log("I do not know anything by that color.")
	alert("I do not know anything by that color.")
}

(color == favorite) ? "That's my favorite color!" : "That color is ok.";

// TODO: Create a block of if/else statements to check for every color except indigo and violet.
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.