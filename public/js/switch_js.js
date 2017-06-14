"use strict";

// Don't change the next two lines!
// This creates two variables:
//     one with the colors of the rainbow, and another with a single randome
//     another with a single random color value
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

switch (color) {
	case "red":
		alert("Red is the color of blood!");
		break;
	case "orange":
		alert("Orange is the color of a fruit that I forgot the name of.");
		break;
	case "yellow":
		alert("Yellow is the color of egg yolk.");
		break;
	case "green":
		alert("Green is the color of The Hulk.");
		break;
	case "blue":
		alert("Blue is the color of my feelings. )+:");
		break;
	default:
		alert("I do not know anything by that color.");
		break;
    // TODO: create a case statement that will handle every color except indigo and violet
    // TODO: when a color is encountered log a message that tells the color, and an object of that color
    //       example: Blue is the color of the sky.

    // TODO: create a default case that will catch indigo and violet
    // TODO: for the default case, log: I do not know anything by that color.
}

//conditional exercise # 1

var cameron = 180
var ryan = 250
var george = 320

//conditional exercise #2

var flipACoin = Math.floor(Math.random()* 2)

if (flipACoin == 0) {
	console.log(flipACoin);
	alert("Buy a House!");
} else {
	console.log(flipACoin);
	alert("Buy a car!");
}


//conditional exercise #3

var luckyNumber = Math.floor(Math.random()* 6)

switch (luckyNumber) {
	case 0:
		alert("No discount.");
		break;
	case 1:
		alert("You get a 10% discount!");
		break;
	case 2:
		alert("You get a 25% discount!!");
		break;
	case 5:
		alert("It's free!");
		break;
	default:
		alert("That number is irrelevant.");
		break;
}