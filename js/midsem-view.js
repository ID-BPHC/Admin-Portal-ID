var selector = document.getElementById("instructors");
var i;

function getContents(currentPage) {
	"use strict";
	var j = -1;
	var tableContent = "<tr><th>Course</th><th>Section</th><th>Instructor Name</th><th>Answer 1</th><th>Answer 2</th><th>Answer 3</th><th>Time</th></tr>";
	var xhttp = new XMLHttpRequest();
	document.getElementById("response").innerHTML = "";
	xhttp.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {

			var response = JSON.parse(this.responseText);
			document.getElementById("pages").innerHTML = "";
			var totalPages = response.totalPages;
			for (i = 1; i <= totalPages; i += 1) {
				if (i === currentPage) {
					document.getElementById("pages").innerHTML += "<li class=\"active\"><a href=\"javascript:void(0)\" onclick=\"getContents(" + i + ")\">" + i + "</a></li>";
				} else {
					document.getElementById("pages").innerHTML += "<li><a href=# onclick=\"getContents(" + i + ")\">" + i + "</a></li>";

				}
			}
			for (i in response) {
				if (response[i].Course && response[i].Course !== "undefined") {
					j = 1;
					tableContent += "<tr>";
					tableContent += ("<td>" + response[i].Course + "</td>");
					tableContent += ("<td>" + response[i].Section + "</td>");
					tableContent += ("<td>" + response[i].InsName + "</td>");
					tableContent += ("<td><p>" + response[i].ans1 + "</p></td>");
					tableContent += ("<td><p>" + response[i].ans2 + "</p></td>");
					tableContent += ("<td><p>" + response[i].ans3 + "</p></td>");
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
	xhttp.open("GET", "./controllers/midsem-feedback-controller.php?perPage=20&currentPage=" + currentPage + "&instructor=" + selector.value, true);
	xhttp.send();
}

selector.onchange = function () {
	"use strict";
	getContents(1);
};
