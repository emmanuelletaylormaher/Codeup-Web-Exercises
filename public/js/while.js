

//first while loop problem ((DONE))

var i = 1

while (i < 65537) {
	console.log("while loop iteration #" + i);
	i = i * 2
}

//ice cream do while loop problem ((DONE))


 // This is how you get a random number between 50 and 100
var allCones = Math.floor(Math.random() * 50) + 50;
// This is how you get a random number between 1 and 5

console.log("I have " + allCones + " to sell!");

do {
	var cones = Math.floor(Math.random() * 5) + 1;

		if (cones > allCones) {
			console.log("I can't sell you " + cones + " cones. I only have " + allCones + ".");
			continue;
		}

		allCones = allCones - cones;
		console.log("Thanks for ordering " + cones + " cones!!!");
		console.log("I have " + allCones + " left!");

} while (allCones > 0);

console.log("No more cones today!");
