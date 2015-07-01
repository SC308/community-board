$(document).ready(function(){


	//  If inactive for 10s, reset to sport page
	var timeout= setTimeout(function() {
	      // Do something after 3 seconds
	      // This can be direct code, or call to some other function

      	var store = $(".store").html();
	    var activity = $(".default-activity").html();
	    
	    window.location.href= "/store/"+store+"/activity/"+activity;   
     }, 30000);
	
	$('*').bind('mousemove keydown scroll', function () {

		clearTimeout(timeout);


	});
        
        

	$('#body-activity, #body-sport, #body-content').on('swipeleft', function () {
	    parent.history.go(-1);
        return false;
        
	});

	

	$("#enterActivity").on('tap', function(){
		var store = $(this).attr('data-store');
		$(this).attr('href', '/store/'+store+'/activity/');
		
	});

	
	$(".activity").on('tap',function(){
		var activity = $(this).attr('data-activity');
		var store = $(".store").html();
		//$(this).attr('href', '/sport/'+activity);
		$(this).attr('href', "/store/"+store+'/activity/'+activity);
		

	});

	 $(".sport").on('tap',function(){
	 	var store = $(".store").html();
	 	var sport = $(this).attr('data-sport');
	 	$(this).attr('href', '/store/'+store+'/content/'+sport);
	 	

	 });

	 //make the rows in activity/sport page hidden/visible
	 $(".rows-set").addClass('hidden');
	 $(".rows-set:first").removeClass('hidden');
	 $(".rows-set:first").addClass('visible');
	 
	 //display next set of rows on clicking "next" on activity/sport page
	 $(".next").click(function(){
	 	var current_row_set = $(this).attr('id');
	 	var current_row_set_number = parseInt(current_row_set.substring(4,5));
	 	var next_row_set_number = current_row_set_number + 1;
	 	$('#rows-set'+ current_row_set_number).slideOut();
	 	$('#rows-set'+next_row_set_number).removeClass('hidden');
	 	$('#rows-set'+next_row_set_number).slideIn();
	 	

	 });

	 //display previous set of rows on clicking "previous" on activity/sport page
	 $(".previous").click(function(){
	 	var current_row_set = $(this).attr('id');
	 	var current_row_set_number = parseInt(current_row_set.substring(8,9));
	 	var previous_row_set_number = current_row_set_number - 1;
	 	$('#rows-set'+ current_row_set_number).slideOut();
	 	$('#rows-set'+previous_row_set_number).removeClass('hidden');
	 	$('#rows-set'+previous_row_set_number).slideIn();
	 	
	 });

	 //animation while clicking "next"/"previous" buttons
	 $.fn.slideIn = function(){
	 	$(this).show( "fast" );
	 	
	 }
	 $.fn.slideOut = function(){
	 	$(this).hide( "1000" );
	 	
	 }


	 //background image slideshown 
	 var backgroundImages = $("[name=Images]").data('backgrounds');
	 //$.backstretch(backgroundImages, {duration: 3000, fade: 3000});

	 //going to home on clicking sportchek logo
	 $(".home").click(function(){
	 	var store = $(".store").html();
	 	window.location.replace('/'+store);

	 });


});