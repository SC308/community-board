$(document).ready(function(){

	$("#postal_code").change(function(){
		
        

         $.ajax({
                url: 'https://maps.googleapis.com/maps/api/geocode/json?address='+$(this).val()+'&key=AIzaSyCRLbHzG7lL-Ia4ml1yWY-mvuGpYYozZV8',
                data: {},
                success: function(data, textStatus  , jqXHR) {
                    $("#longitude").val( data.results[0].geometry.location.lng);
                    $('#latitude').val( data.results[0].geometry.location.lat );
                }
          });

    


       
	})


})