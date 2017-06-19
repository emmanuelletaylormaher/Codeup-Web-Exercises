/* Write a function called `identity(input)` that takes in an 
argument called input and returns that input. */

//DONE
function identity(input) {
	return input;
}


/* Write a function called `getRandomNumber(min, max)` that returns 
a random number between min and max values sent to that funciton call. */

//DONE

function getRandomNumber(min, max) {
	var randomNumber = Math.floor((Math.random() * (max - min + 1)) + min);
	return randomNumber;
}

/* Write a function called `first(input)` that returns the first 
character in the provided string. */

//DONE

function first(input) {
	return input.charAt(0);
}


/* Write a fuction called `last(input)` that returns the 
last character of a string */

//DONE

function last(input){
	return input.charAt(input.length-1);
}

/* Write a function called `rest(input)` that returns everything
 but the first character of a string.  */

function rest(input) {
	var restOfWord = input.replace(input.indexOf(1), "");
	return restOfWord;
}

/* Write a function called `reverse(input)` that takes a string and 
returns it reversed.  */

//DONE

function reverse(input) {
	var splitString = input.split("");
	var reverseArray = splitString.reverse();
	var joinArray = reverseArray.join("");
	return joinArray;
}

/* Write a function called `isNumeric(input)` that takes an input and 
returns a boolean if the input is numeric. */

function isNumeric() {
	var input = prompt("Tell me something and I will tell you if it's a number.");
	if (NaN(input)) {
		return "false";
	} else {
		return "true";
	}
}

/* Write a function called `count(input)` that takes in a string and returns the number of characters. */

//DONE

function count(input) {
	return input.length;
}


/* Write a function called `add(a, b)` that returns the sum of a and b */

//DONE

function add(a, b) {
	var addSum = a + b;
	return addSum;
}

/* Write a function called `subtract(a, b)` that return the difference
 between the two inputs. */

//DONE

function subtract(a, b) {
	var functionDifference = a - b;
	return functionDifference;
}

/* Write multiply(a, b) that returns the product */

//DONE

function multiply(a, b) {
	var functionProduct = a * b;
	return functionProduct;
}

/* Write a divide(numerator, denominator) function that returns a 
divided by b */

//DONE

function divide(numerator, denominator) {
	var divideAnswer = numerator/denominator;
	return divideAnswer;
}

/* Write a remainder(number, divisor) function that returns the remainder left over when dividing `number` by the `divisor`  */

/* Write the function `square(a)` that takes in a number and returns the number multiplied by itself.  */

//DONE

function square(a) {
	var squared = a * a;
	return squared;
}

/* # Super Duper Gold-Star Bonus  */

/* Write a function called sumOfSquares(a, b) 
that uses only your add() function and your square function and not + or * operators  */

//DONE

function sumOfSquares(a, b) {
	var squareSum = add(square(a), square(b));
	return squareSum;
}

/* Write a function called doMath(operator, a, b) that takes 3 parameters.
 The first parameter is the name of the math function you want to apply.
  a and b are the two numbers to run that function on. */

function doMath(operator, a, b) {
}

