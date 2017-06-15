

//Times Table Problem ((DONE))

var numberPrompt 

do {
	numberPrompt = parseInt(prompt("Give me a number between 1-10."));
} while (isNaN(numberPrompt) || (numberPrompt <1 || numberPrompt > 10));


for (var i = 1; i < 11; i++) {
	var timesTable = numberPrompt * i
	console.log(numberPrompt + "X" + i  + "=" + timesTable);
}

//10 random numbers between 20 and 200
var min = 20;
var max = 200;
var random;


for (i = random; i <= 10; i++) {
	random = Math.floor(Math.random() * (max-min)) +min;
	if (i %2 === 0) {
		console.log(i + " is even!");
	} else {
		console.log(i + " is odd.");
	}
}


//for loop number pyramid is inline on loops.html ((DONE))

//for loop console.log 100-5 ((DONE))

for (var i = 100; i >= 5; i = i - 5) {
	console.log(i);
}