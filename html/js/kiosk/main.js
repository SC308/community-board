$(document).ready(function(){
	
	var rowId 		= 0;
	

	var getBaseURL = function(currentUrl){

		if (! (/[0-9]{4}$/).test(currentUrl) )
		{
			var modelFromUrl = currentUrl.split(/[0-9]{4}/).pop();
			currentUrl = currentUrl.replace(modelFromUrl, "");
			
		}
		console.log(currentUrl);
		return currentUrl;
	}
	
	$(".weird-class").click(function(){
		
		var currentUrl = getBaseURL(window.location.href);
		
		var model = $(this).parent().parent().attr("id");
		$(this).removeAttr("href");
		$(this).prop("href", currentUrl+"\/"+model);
		$(this).showModel(model, $(this).prop('href'));
	});



	//set href according to the selected submenu option and the the current active panel
	$('.submenu-item').click(function(){

		var currentUrl = window.location.href;
		var model = $(this).parent().attr('data-model');
		var selectedAction = $(this).attr('id');
		if(selectedAction ==  'edit' ){
			alert(model);
			rowId= $(this).attr('data-rowId');
			$(this).prop("href", getBaseURL(currentUrl)+"\/"+model+"\/"+rowId+"/"+selectedAction);
			
		}
		
		if(selectedAction == 'add'){
			
			$(this).prop("href", getBaseURL(currentUrl)+"\/"+model+"\/"+"create");	
 			
		}

		if(selectedAction == 'delete'){
			event.preventDefault();
			rowId= $(this).attr('data-rowId');
			$(this).prop("href", currentUrl+"\/"+rowId);
			console.log($(this).prop("href"));
 			$(this).deleteModel(model, rowId, getBaseURL(window.location.href));
		}

		if(selectedAction == 'view'){
			rowId= $(this).attr('data-rowId');
			$(this).prop("href", getBaseURL(currentUrl)+"\/"+model+"\/"+rowId);
		}
		
		
	});




	$('.image-thumbnail-holder').mouseover(function() {
	    $( this ).find("div").eq(0).fadeTo( 250, 0.25, function() {
	      $( this ).css( "pointer", "" );
	      
	    });
	    $(this).find("img").eq(1).removeClass("hidden");
	    $(this).find("img").eq(1).addClass("visible");
	    $(this).find("img").eq(1).fadeTo( 250, 1, function(){});
	});


	$('.image-thumbnail-holder').mouseout(function() {
	    $( this ).find("div").eq(0).fadeTo( 250, 1, function() {
	      $( this ).css( "pointer", "" );
	    });
	    $(this).find("img").eq(1).removeClass("visible");
	    $(this).find("img").eq(1).addClass("hidden");
	      
	});


	$('.video-thumbnail-holder').mouseover(function() {
	    $( this ).find("div").eq(0).fadeTo( 250, 0.25, function() {
	      $( this ).css( "pointer", "" );
	      
	    });
	    $(this).find("img").eq(0).removeClass("hidden");
	    $(this).find("img").eq(0).addClass("visible");
	    $(this).find("img").eq(0).fadeTo( 250, 1, function(){});
	});


	$('.video-thumbnail-holder').mouseout(function() {
	    $( this ).find("div").eq(0).fadeTo( 250, 1, function() {
	      $( this ).css( "pointer", "" );
	    });
	    $(this).find("img").eq(0).removeClass("visible");
	    $(this).find("img").eq(0).addClass("hidden");
	      
	});


	$('.remove-image-button').click(function(){
		
		var  previouslySelected = $(this).prev().find("img").first().attr('data-remove-image');
		var image = $(this).prev().find("img").first();
		var imageName = $(this).prev().find("img").first().attr('alt');
		var currentValue = $("#removeImages").val();
		if( previouslySelected == 'false'){

			$('#removeImages').val(function(i, currentValue){
				if(currentValue == ''){
					image.attr('data-remove-image', 'true');
					return imageName;
					
				}
				else{
					image.attr('data-remove-image', 'true');
					return currentValue+";"+imageName;
					
				}

			});
			$(this).prev().css({"border-color": "#04B404", 
								"border-width":"1px", 
				                "border-style":"solid"});

		}
		else if(previouslySelected == 'true'){

			$(this).prev().css({"border": "none"});
			image.attr('data-remove-image', 'false');
			var newCurrentValue = currentValue.replace(imageName , '');
			
			
			$('#removeImages').val(function(i, currentValue){
				return newCurrentValue;
			});


		}


		


	});



	$('.remove-video-button').click(function(){
		
		var  previouslySelected = $(this).prev().find("video").first().attr('data-remove-video');
		var video = $(this).prev().find("video").first();
		var videoName = $(this).prev().find("video").first().attr('data-video-name');
		var currentValue = $("#removeVideos").val();
		if( previouslySelected == 'false'){

			$('#removeVideos').val(function(i, currentValue){
				if(currentValue == ''){
					video.attr('data-remove-video', 'true');
					return videoName;
					
				}
				else{
					video.attr('data-remove-video', 'true');
					return currentValue+";"+videoName;
					
				}

			});
			$(this).prev().css({"border-color": "#04B404", 
								"border-width":"1px", 
				                "border-style":"solid"});

		}
		else if(previouslySelected == 'true'){

			$(this).prev().css({"border": "none"});
			video.attr('data-remove-video', 'false');
			var newCurrentValue = currentValue.replace(videoName , '');
			
			
			$('#removeVideos').val(function(i, currentValue){
				return newCurrentValue;
			});


		}


		


	});


    $.fn.deleteModel = function(model, id, href){
        
        if (!confirm('Are you sure you want to delete '+ model + id +' ?')){
          return;
        }  
        console.log($(this).attr('href'));
        $.ajax({
	        url: $(this).attr('href'),
	        type: "DELETE",
	        data: {_method: 'get'},
	        success: function(data, textStatus, jqXHR) {
	             window.location.replace(href+"/"+model);
	        }
	    });
    }

    $.fn.showModel = function(model, href){
          
        $.ajax({
        url: $(this).attr('href'),
        type: "GET",
        data: {},
        success: function(data, textStatus, jqXHR) {
             console.log(data);	
             window.location.replace(href);
        }
    });
    }

     
         	 
    
	

});