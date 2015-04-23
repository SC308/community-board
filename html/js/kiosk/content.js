
$(document).ready(function(){

   

    //  If inactive for 10s, reset to sport page
    var timeout= setTimeout(function() {
          // Do something after 3 seconds
          // This can be direct code, or call to some other function
        var store = $(".store").html();
        var sport = $(".default-activity").html();

        alert(store);
        alert(sport);
        
        window.location.href= "/"+store;   
     }, 30000);
    
    $('*').bind('mousemove keydown scroll', function () {

        clearTimeout(timeout);


    });


	
    $('#body-content').on('swipeleft', function () {
        parent.history.go(-1);
        return false;
        
    });

    var options = { $AutoPlay: true };
	if($( "#slider1_container" ).length){
		var jssor_slider1 = new $JssorSlider$('slider1_container', options);
	}
	if($( "#slider2_container" ).length){
		var jssor_slider2 = new $JssorSlider$('slider2_container', options);
	}
	if($( "#slider3_container" ).length){
		var jssor_slider3 = new $JssorSlider$('slider3_container', options);	
	}
	if($( "#slider4_container" ).length){
		var jssor_slider4 = new $JssorSlider$('slider4_container', options);	
	}


    

   

    $(".go-fullscreen").click(function() {
        $(".close-fullscreen").show();
        $(this).parent().addClass("fullscreen");
        $(this).hide();

        
    });



    $(".close-fullscreen").click(function(){
        
        $(".close-fullscreen").hide();
        $('.go-fullscreen').show();
        $(this).parent().removeClass("fullscreen");
        $(this).parent().addClass("inner-container");
        
    });



    //going to home on clicking sportchek logo
     $(".home").click(function(){
         var store = $(".store").html();
        window.location.replace('/'+store);

     });


});
	