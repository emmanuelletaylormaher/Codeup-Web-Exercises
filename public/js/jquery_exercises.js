"use strict";

$(document).ready(function () {
	alert("The DOM has finished loading!");
});

$('h1').click(function(){
	$('h1').css("background-color", "green");
});

$('p').dblclick(function() {
	$('p').css("font-size", "18px");
});

$("li").hover(function (){
		$(this).css("color", "red");
});

$("li").mouseleave(function(){
	$(this).css("color", "white");
});