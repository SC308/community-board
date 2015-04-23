$(document).ready(function(){

	$("#PostalCode").change(function(){
		$.ajax({
        url: 'https://maps.googleapis.com/maps/api/geocode/json?address='+$(this).val()+'&key=AIzaSyCRLbHzG7lL-Ia4ml1yWY-mvuGpYYozZV8',
        data: {},
        success: function(data, textStatus  , jqXHR) {
            console.log(data.results[0].geometry.location.lng)
            $("#Longitude").val( data.results[0].geometry.location.lng);
            $('#Latitude').val( data.results[0].geometry.location.lat );
        }
    });
	})


});