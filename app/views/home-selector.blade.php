<form id="storeselector" onsubmit="gotostore()">
<h2>Store Number: <input type="text" id="storeno" value="" /></h2>
<h2>Landscape: <input type="checkbox" id="ls" value="1" /></h2>
<button type="submit" class="btn btn-default">Submit</button>
</form>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.js"></script>
<script>
	
	$("#storeselector").submit(function(e){
    	e.preventDefault();
  	});	

	function gotostore(){

		//alert('something happened!');

		var storeno = document.getElementById("storeno").value;

		//alert(storeno);
	
		if(document.getElementById("ls").checked == true){
			window.location = "/" + storeno + "/ls";				
		} else {
			window.location = "/" + storeno;				
		}
	

	}

	// $("input").keypress(function(event) {
	//     if (event.which == 13) {
	//         event.preventDefault();
	//         gotostore();
	//     }
	// });

</script>