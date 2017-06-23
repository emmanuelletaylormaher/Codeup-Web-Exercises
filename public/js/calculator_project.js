'use strict';

/*******************VARIABLE DECLARATION********************/

var inputView = document.getElementsByTagName("input");
var firstOperand = document.getElementById("firstOperand");
var operator = document.getElementById("operator");
var secondOperand = document.getElementById("secondOperand");
	//first operand [0]
	//operator [1]
	//second operand [2]

/* all html buttons retrieved and declared as a 
javaScript variable */
var buttonOperand = document.getElementsByClassName("buttonOperand");
	//numbers [including index]
		//one [0]
		//two [1]
		//three [2]
		//four [3]
		//five[4]
		//six[5]
		//seven[6]
		//eight[7]
		//nine[8]
		//zero[9]

var operatorButton = document.getElementsByClassName("operatorButton");
	//operators [including index]
		//plus [0]
		//minus [1]
		//multiply [2]
		//clear [3]
		//equals [4]
		//divide [5]


/*variables for javaScript recognizing and logging each button press into
respective inputs*/

/***********************OPERAND FUNCTIONALITY****************************/

document.getElementById('clickOne').addEventListener('click', function() {
    if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += 1;
    } else {
    	firstOperand.value += 1;
    } 
});

document.getElementById('clickTwo').addEventListener('click', function(){
	if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += 2;
    } else {
    	firstOperand.value += 2;
    }
});

document.getElementById('clickThree').addEventListener('click', function(){
	if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += 3;
    } else {
    	firstOperand.value += 3;
    }
});

document.getElementById('clickFour').addEventListener('click', function(){
	if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += 4;
    } else {
    	firstOperand.value += 4;
    }
});

document.getElementById('clickFive').addEventListener('click', function(){
	if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += 5;
    } else {
    	firstOperand.value += 5;
    }
});

document.getElementById('clickSix').addEventListener('click', function(){
	if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += 6;
    } else {
    	firstOperand.value += 6;
    }
});

document.getElementById('clickSeven').addEventListener('click', function(){
	if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += 7;
    } else {
    	firstOperand.value += 7;
    }
});

document.getElementById('clickEight').addEventListener('click', function(){
	if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += 8;
    } else {
    	firstOperand.value += 8;
    }
});

document.getElementById('clickNine').addEventListener('click', function(){
	if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += 9;
    } else {
    	firstOperand.value += 9;
    }
});
document.getElementById('clickZero').addEventListener('click', function(){
	if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += 0;
    } else {
    	firstOperand.value += 0;
    }
});

document.getElementById('clickDecimal').addEventListener('click', function(){
	if (operator.value !== "" || operator.value.length > 0) {
    	secondOperand.value += ".";
    } else {
    	firstOperand.value += ".";
    }
});

/************************OPERATORS************************/

document.getElementById('clickPlus').addEventListener('click', function(){
	operator.value = "+";
});

document.getElementById('clickMinus').addEventListener('click', function(){
	operator.value = "-";
});

document.getElementById('clickMultiply').addEventListener('click', function(){
	operator.value = "*";
});

document.getElementById('clickDivide').addEventListener('click', function(){
	operator.value = "/";
});



/********************************MISC OPERATORS************************************/
document.getElementById("clickEquals").addEventListener('click', function(){
	if (operator.value == "+") {
		firstOperand.value = parseFloat(firstOperand.value) + parseFloat(secondOperand.value);
	} else if (operator.value == "-") {
		firstOperand.value = firstOperand.value - secondOperand.value;
	} else if (operator.value == "*") {
		firstOperand.value = firstOperand.value * secondOperand.value;
	} else if (operator.value == "/") {
		firstOperand.value = firstOperand.value / secondOperand.value;
	}

	operator.value= "";
	secondOperand.value = "";
});

document.getElementById("clickSquared").addEventListener('click', function(){
	firstOperand.value = Math.pow(firstOperand.value, 2);
	operator.value="";
	secondOperand.value="";
});

document.getElementById("clickRoot").addEventListener('click', function(){
	firstOperand.value = Math.sqrt(firstOperand.value);
	operator.value="";
	secondOperand.value="";
});

document.getElementById("clickSwitch").addEventListener('click', function(){
	firstOperand.value = firstOperand.value * (-1);
	operator.value="";
	secondOperand.value="";
});



//clear
document.getElementById('clickClear').addEventListener('click', function(){
	firstOperand.value = "";
	operator.value = "";
	secondOperand.value = "";
});

/***********MAKE SOME NOISE**********/
// document.getElementsByTagName('button').addEventListener('click', function(){
// 	document.getElementById("buttonClick").play();
// });
