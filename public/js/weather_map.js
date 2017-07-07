(function(){
	"use strict";

	//pulling the API GET request for San Antonio Weather
	function getTheWeather(lat, long){
			$.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
			APPID: "fc9caa5abb6e3d03dc633c94d2b4d08a",
			// q: "San Antonio, TX",
			lat: lat,
			lon: long,
			units: "imperial",
			cnt: "3"
		}).done(function(data, status){
			console.log(data);
			satxWeather(data);
		});
	}

	getTheWeather(29.4241, -98.4936);

	//default san antonio
	function satxWeather(data){	
		var forecast = data.list[0];

		//the forecast
		data.list.forEach(function(forecast){
			$("#theGoods").append(
				"<div class='col-sm-4' id='deets'>" + "<p>" + forecast.temp.day + "°F | " + ((parseFloat(forecast.temp.day)-32) * (5/9)).toFixed(2) +"°C" +"</p>" +
				"<img class='icon' src=http://openweathermap.org/img/w/"+ forecast.weather[0].icon +".png>" +
				"<h6> humidity: " + forecast.humidity + "</h6>" +
				"<h6> wind: " + forecast.speed + "</h6>" +
				"<h6> pressure: " + forecast.pressure + "</h6>" + "</div>"
			);
		});

	};



	//click the button, update the location
	$("button").click(function(event){
		event.preventDefault();
		var latitude = $("#latitude").val()
		var longitude = $("#longitude").val()
		console.log(latitude);
		console.log(longitude);
			$.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
			APPID: "fc9caa5abb6e3d03dc633c94d2b4d08a",
			// q: "San Antonio, TX",
			lat: latitude,
			lon: longitude,
			units: "imperial",
			cnt: "3"
		}).done(function(data, status){
			console.log(data);
			$("#theGoods").html("");
			$("#currentCity").html("");
			satxWeather(data);
		});


	});


	//google maps api
	var mapOptions = {
		zoom: 10,

		center: {
			lat: 29.526755,
			lng: -98.566169,
		}
	};

	var mapLat = 29.4241;
	var mapLong = -98.4936
	var startingPoint = new google.maps.LatLng(mapLat, mapLong);

	//initialize the map
	var map = new google.maps.Map(document.getElementById("map"), mapOptions);

	//marker stuff
	var marker = new google.maps.Marker({
		position: startingPoint,
		animation: google.maps.Animation.DROP,
		draggable: true
	});

	//marker animation stuff
	function toggleBounce() {
	  if (marker.getAnimation() !== null) {
	    marker.setAnimation(null);
	  } else {
	    marker.setAnimation(google.maps.Animation.BOUNCE);
	    setTimeout(function(){ marker.setAnimation(null);}, 2750);
	  }
	}

	//receiving new coordinates whenever the marker is dragged
	marker.addListener("dragend", function(){
		mapLat = marker.getPosition().lat();
		console.log(mapLat);
		mapLong = marker.getPosition().lng();
		console.log(mapLong);
		console.log("it was dragged!");
		$("#theGoods").html("");
		getTheWeather(mapLat, mapLong);
	});

	//plugging those coordinates into the weather 

	marker.addListener('click', toggleBounce);
	marker.setMap(map);


})();