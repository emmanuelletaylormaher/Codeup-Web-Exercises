"use strict";


/**
 * TODO:
 * Create a function called 'sayHello' that takes a parameter 'name'.
 * When called, the function should return a message that says hello to the passed in name.
 *
 * Example
 *  > sayHello("codeup") // returns "Hello, codeup!"
 */

 function sayHello(name) {
 	var name = prompt("What is your name?");
 	var helloResponse = "Hello, " + name + "!!";
 	return helloResponse;
 }



/**
 * TODO:
 * Call the function 'sayHello' passing the variable 'myNameIs' as a parameter.
 * Store the result of the function call in a variable named 'helloMessage'.
 * console.log 'helloMessage' to check your work
 */



// Don't modify the following line, it generates a random number between 1 and
// 100 and stores it in a variable named random
var random = Math.floor((Math.random() * 100) + 1);

//DONE

/**
 * TODO:
 * Create a function called 'isOdd' that takes a number as a parameter.
 * The function should use the ternary operator to return a message.
 * The message should contain the number being checked, and whether or not the
 * number is odd

 *
 * Example
 *  > isOdd(42) // returns "42 is not odd!"
 *
 * Call the function 'isOdd' passing the variable 'random' as a parameter.
 * console.log *outside of the function* to check your work
 */

function isOdd(number) {
	var number;
	(number %2 === 1) ? console.log(number + " is odd!") : console.log(number + "is NOT odd!");
}



//DONE
/**
 * TODO: Create a function named 'calculateTip' to calculate a tip on a bill at a
 * restaurant
 *
 * the function should accept a tip percentage and the total of the bill, and
 * return the amount to tip
 *
 * Example
 *  > calculateTip(0.20, 20) // returns 4
 */

 function calculateTip(a, b) {
 	var tipAnswer = a * b;
 	return tipAnswer;
 }


//DONE
/**
 * TODO: use prompt and alert in combination with your calculateTip function to
 * prompt the user for the bill total and a percentage they would like to tip,
 * then display the dollar amount they should tip
 */

 var bill = prompt("What is the total of your bill?");
 var percentage = prompt("what percentage would you like to tip?");
 var tip = (percentage/100);
 console.log("The tip you should leave behind is $" + calculateTip(bill, tip));
