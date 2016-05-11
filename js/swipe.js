var gridSize = 9;

$(document).ready(function(){
	var answerSet = false;
	var getClickStarted = false;
	var errorRaised = false;
	var password;
    var centerX1;
    var centerY1;
    var curX = 0;
    var curY = 0;
    var getClickStarted = false;
    var htmlLine;
    var startpointnumber = 0;
    var endpointnumber = 0;
    //if 4x4
    var gridSize = 25;
    var rowSize = Math.sqrt(gridSize);
	var buttonSize = 0;
	var buttonMargin = 0;
	var containerSize = 280;

	(function generatebuttons(){
		var patterncontainer  = document.getElementById("patterncontainer");
		for (var i = 1; i <= gridSize; i++) {
			var button = document.createElement("div");

			button.className = "button";
			button.id = "button" + i;
			patterncontainer.appendChild(button);

			buttonSize = containerSize / rowSize;
			buttonMargin =	buttonSize / 10;
			buttonSize = buttonSize - (buttonMargin * 2);

			document.getElementById("button"+i).style.width = buttonSize + 'px';
			document.getElementById("button"+i).style.height = buttonSize +'px';
			document.getElementById("button"+i).style.margin = buttonMargin + 'px';

			startposition = document.getElementById("button" + i);


		}
	}());

	(function main(){
		if(!window.navigator.msPointerEnabled) {

			$(".button").on("mousedown", function (event){

				if(!getClickStarted){
					
					getClickStarted = true;
					var offset1 = $("#" + event.target.id).position();

					centerX1 = offset1.left + $("#" + event.target.id).innerWidth()/2 + 20.5; //22.5 is the margin of the button class
					centerY1 = offset1.top + $("#" + event.target.id).innerHeight()/2 + 20.5;

					//console.log("centerX1 " + centerX1);
					//console.log("centerY1 " + centerY1);

					if (event && event.preventDefault){
			               event.preventDefault();
		            }

					$("#" + event.target.id).removeClass("button").addClass("activebutton");

					password = event.target.id.split("button").join("");
					startpointnumber = event.target.id.split("button").join("");

					//console.log("startpointnumber " + startpointnumber);

					addline(startpointnumber, centerX1, centerY1); //initiating a moving line
				}
			});

			$(document).bind("mousemove", function(event) {
			    if (getClickStarted){ //to avoid mousemove triggering before click

			        if (event && event.preventDefault){
			           event.preventDefault();
			        }

			        curX = event.clientX - $("#patterncontainer").offset().left;
			        curY = event.clientY - $("#patterncontainer").offset().top;

			        var width = Math.sqrt(Math.pow(curX - centerX1, 2) + Math.pow(curY - centerY1, 2)); //varying width and slope
			        var slope = Math.atan2(curY - centerY1, curX - centerX1)*180/3.14;

			        //setting varying width and slope to line
			        $("#line" + startpointnumber).css({"width": + width +"px", "height": "4px", "transform": "rotate(" + slope + "deg)", "-webkit-transform": "rotate(" + slope + "deg)", "-moz-transform": "rotate(" + slope + "deg)"});

			        //if button is found on the path
    	    		$(".button").bind("mouseover", function(e) {

    	    			endpointnumber = e.target.id.split("button").join("");

        				if (startpointnumber != endpointnumber) {
							if (e && e.preventDefault){
				               e.preventDefault();
				            }

				            if (e.target.className == "button") {
				            	$("#" + e.target.id).removeClass("button").addClass("activebutton");
							} else {
								$("#" + e.target.id).removeClass("activebutton").addClass("duplicatebutton");
							}

				            password += e.target.id.split("button").join("");
				            // endpointnumber = e.target.id.split("button").join("");

				            $("#line" + startpointnumber).attr("id", "line" + startpointnumber + endpointnumber);

				            var offset2 = $("#" + e.target.id).position();
				            
				            var centerX2 = offset2.left + $("#" + e.target.id).innerWidth()/2 + 20.5;  //20.5 is the margin of activebutton class
				            var centerY2 = offset2.top + $("#" + e.target.id).innerHeight()/2 + 20.5;

				            var linewidth = Math.sqrt(Math.pow(centerX2 - centerX1, 2) + Math.pow(centerY2 - centerY1, 2));
				            var lineslope = Math.atan2(centerY2 - centerY1, centerX2 - centerX1)*180/3.14;

				            $("#line" + startpointnumber + endpointnumber).css({"width": + linewidth +"px", "transform": "rotate(" + lineslope + "deg)", "-webkit-transform": "rotate(" + lineslope + "deg)", "-moz-transform": "rotate(" + lineslope + "deg)"});

				            startpointnumber = endpointnumber;
				            centerX1 = centerX2;
				            centerY1 = centerY2;

				            addline(startpointnumber, centerX1, centerY1);
        				}
    	    		});
			    }
				$("#patterncontainer").on("mouseup", function (event){
					if(getClickStarted) {
						if (event && event.preventDefault){
			               event.preventDefault();
			            }

			            $("#line" + startpointnumber).remove();

					}
					getClickStarted = false;
				});
			});
		} else {
			alert ("INTERNET EXPLORER NOT SUPPORTED!!");
		}
	}());

	function addline(startpointnumber, centerX1, centerY1){
		var htmlLine = "<div id='line" + startpointnumber + "' class='line' style='position: absolute; top: " + centerY1 + "px; \
		            left: " + centerX1 + "px; -webkit-transform-origin: 2px 2px; -moz-transform-origin: 2.5% 50%; background-color: #FFF;'></div>"

		$("#patterncontainer").append(htmlLine);
	}

	function formsubmit(){
	    var digits = getlength(password);

	    if (errorraised == false && answerSet == false) {
			localStorage.setItem("password", password);
			successmessage("patternStored");
	    }
	    else if ( errorraised == false && answerSet == true) {
	    	if (localStorage.getItem("password") == password) {
	    		successmessage("screenUnlocked");
	    		window.location = "./welcome.html";
	    		return false;
	    	}
	    	else {
	    		raiseerror("IncorrectPattern");
	    	}
	    }
	};

	function getlength(number) {
	    return number.toString().length;
	};

	function checkduplicatedigits(number) {
		var digits = getlength(number);
		numberstring = number.toString();
		var numberarray = numberstring.split("");
		var i; var j;
		for (i = 0; i < digits-1; i++) {
			for (j = i+1; j < digits; j++) {
				if(numberarray[i] == numberarray[j]) {
				}
			}
		}
	};
});
