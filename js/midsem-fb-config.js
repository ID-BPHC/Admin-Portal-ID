function changeColor() {
	"use strict";
	if (document.getElementById("flash").style.color === "rgb(128, 0, 0)") {
		document.getElementById("flash").style.color = "rgb(64, 255, 0)";
	} else {
		document.getElementById("flash").style.color = "rgb(128, 0, 0)";
	}
}

if (document.getElementById("flash")) {
	setInterval(function () {
		changeColor();
	}, 500);
	document.getElementById("flash").style.color = "rgb(128, 0, 0)";
}

if (document.getElementById("endDate")) {

	$("#startDate").datepicker();
	$("#endDate").datepicker();

	document.getElementById("startDate").onchange = function () {
		"use strict";
		var dt = $("#startDate").datepicker('getDate');
		dt.setDate(dt.getDate() + 1);
		$("#endDate").datepicker('setStartDate', dt);
	};

}
