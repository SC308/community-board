$(document).ready(function(){

	$("#postal_code").change(function(){

         $.ajax({
                url: 'https://maps.googleapis.com/maps/api/geocode/json?address='+$(this).val()+'&key=<? echo $_ENV['GOOGLE_MAPS_API_BROWSER_KEY'] ?>',
                data: {},
                success: function(data, textStatus  , jqXHR) {
                    console.log(data);
                    $("#longitude").val( data.results[0].geometry.location.lng);
                    $('#latitude').val( data.results[0].geometry.location.lat );
                }
          });

    


       
	})


})