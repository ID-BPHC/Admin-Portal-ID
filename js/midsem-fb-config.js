$('[data-toggle="datepicker"]').datepicker();

function changeColor()
{
	"use strict";
	//alert(document.getElementById("flash").style.color);
	if(document.getElementById("flash").style.color === "rgb(128, 0, 0)")
		{
			//alert("inside if");
			document.getElementById("flash").style.color = "rgb(64, 255, 0)";
		}
	else
		{
			document.getElementById("flash").style.color = "rgb(128, 0, 0)";
		}
}

setInterval(function(){ changeColor(); }, 500);

if(document.getElementById("flash") !== undefined)
{
		document.getElementById("flash").style.color = "rgb(128, 0, 0)";
}