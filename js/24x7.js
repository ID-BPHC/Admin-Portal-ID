var insSelector = document.getElementById("instructors");
var pageSelector = document.getElementById("perPage");
var i;

function getContents(currentPage, perPage) {
	"use strict";
	document.getElementById("response").innerHTML = "<h4>Loading...</h4>";
	var j = -1;
	var tableContent = "<tr><th>Course</th><th>Section</th><th>Instructor Name</th><th>Feedback</th><th>Time</th></tr>";
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
			
			document.getElementById("response").innerHTML = "";
			var response = JSON.parse(this.responseText);
			document.getElementById("pages").innerHTML = "";
			var totalPages = response.totalPages;
			for (i = 1; i <= totalPages; i += 1) {
				if (i === currentPage) {
					document.getElementById("pages").innerHTML += "<li class=\"active\"><a href=\"javascript:void(0)\" onclick=\"getContents(" + i + "," + perPage + ")\">" + i + "</a></li>";
				} else {
					document.getElementById("pages").innerHTML += "<li><a href=# onclick=\"getContents(" + i + "," + perPage + ")\">" + i + "</a></li>";

				}
			}
			for (i in response) {
				if (response[i].Course && response[i].Course !== "undefined") {
					j = 1;
					tableContent += "<tr>";
					tableContent += ("<td>" + response[i].Course + "</td>");
					tableContent += ("<td>" + response[i].Section + "</td>");
					tableContent += ("<td>" + response[i].InsName + "</td>");
					tableContent += ("<td><p>" + response[i].Feedback + "</p></td>");
					tableContent += ("<td>" + response[i].time + "</td>");
					tableContent += "</tr>";
				}
			}
			if (j === -1) {
				tableContent = "<h4>No Feedbacks !</h4>";
			}
			document.getElementById("response").innerHTML = tableContent;

		}
	};
	xhttp.open("GET", "./controllers/24x7-feedback-controller.php?perPage=" + perPage + "&currentPage=" + currentPage + "&instructor=" + insSelector.value, true);
	xhttp.send();
}

insSelector.onchange = function () {
	"use strict";
	getContents(1, document.getElementById("perPage").value);
};

pageSelector.onchange = function()
{
	"use strict";
	getContents(1, document.getElementById("perPage").value);
};

getContents(1, document.getElementById("perPage").value);