/*
$( "html" ).click(function() {
	resetTimer();
});
*/

$(document).click(function(e) {
	resetTimer();
});

var totalSeconds = 0;
setInterval(setTime, 1000);

function setTime() {
	
	//var storeno = get('store');
	var storeno = document.getElementById("sendstorenumber").src.split("sendstorenumber=")[1];
	
	++totalSeconds;
	//console.clear();
	console.log(totalSeconds);
	

	if(totalSeconds == 120){
		window.location.href = "/"+storeno+"/";
		//window.location.href = "../";

	}
}

function resetTimer(){
	totalSeconds = 0;

}


