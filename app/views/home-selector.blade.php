<h2>store number: <input type="text" id="storeno" value="" /></h2>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.js"></script>
<script>
	
	function gotostore(){

		var storeno = document.getElementById("storeno").value;

		//alert(window.location + storeno);

		// if (storeno == null) {
		 //	alert(storeno);
		// } else {

		 	window.location = "/" + storeno;

		// }

	}

	$("input").keypress(function(event) {
	    if (event.which == 13) {
	        event.preventDefault();
	        gotostore();
	    }
	});

</script>