(function(){
	"use strict";

	var mapOptions = {
		zoom: 17,

		center: {
			lat: 29.526755,
			lng: -98.566169,
		}
	};

	//jSON objects of various favorite restaurants

	// favRestaurants = {
		
	// }

	var map = new google.maps.Map(document.getElementById("map"), mapOptions);

	var yellowfish = {lat: 29.526755, lng: -98.566169};

	var marker = new google.maps.Marker({
		position: yellowfish,
		map: map,
		animation: google.maps.Animation.DROP
	});
	
	marker.addListener('click', toggleBounce);

	function toggleBounce() {
		if (marker.getAnimation() !== null) {
			marker.setAnimation(null);
		} else {
			marker.setAnimation(google.maps.Animation.BOUNCE);
			setTimeout(function(){ marker.setAnimation(null);}, 2750);
		}
	}

	var infowindow = new google.maps.InfoWindow({
		content: "Yellowfish Sushi: A neat Japanese-Mexican fusion restaurant."
	});

	marker.addListener('click', function(){
		infowindow.open(map,marker);
	});


})();