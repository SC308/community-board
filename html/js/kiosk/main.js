$(document).ready(function(){
	
	var rowId 		= 0;
	

	
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
 			$(this).deleteModel(model, rowId, getBaseURL(window.location.href));
		}

		if(selectedAction == 'view'){
			rowId= $(this).attr('data-rowId');
			$(this).prop("href", getBaseURL(currentUrl)+"\/"+model+"\/"+rowId);
		}
		
		
	});





	$("#filterBySport").on('change', function(){

		var model 		= $(this).attr('data-model');
		var currentUrl 	= window.location.href;
		var redirectUrl = getBaseURL(currentUrl)+"/"+ model;
		
		var existingFilter = filterExists (currentUrl);
		
		if(/sport/.test(existingFilter)){
			var filter2 	= new RegExp(getExistingFilterFromUrl(currentUrl, "sport"));
			// redirectUrl  = currentUrl.replace(filter2, getExistingFilterFromUrl(currentUrl, "sport")+","+this.value);
			redirectUrl  = currentUrl.replace(filter2, "sport="+this.value);

		}
		else{
			if(/store/.test(existingFilter)){
				redirectUrl  += "?"+getExistingFilterFromUrl(currentUrl, "store")+ "&sport=" +this.value;
			}
			else{
				redirectUrl +="?sport="+ this.value;  
			}
		}
		window.location.replace(redirectUrl);

	})




	$("#filterByStore").on('change', function(){

		var model 		= $(this).attr('data-model');
		var currentUrl 	= window.location.href;
		var redirectUrl = getBaseURL(currentUrl)+"/"+ model;
		
		var existingFilter = filterExists (currentUrl);
		
		if(/store/.test(existingFilter)){
			var filter2 	= new RegExp(getExistingFilterFromUrl(currentUrl, "store"));
			// redirectUrl  = currentUrl.replace(filter2, getExistingFilterFromUrl(currentUrl, "store")+","+this.value);
			redirectUrl     = currentUrl.replace(filter2, "store="+this.value);
			  
		}
		else{
			if(/sport/.test(existingFilter)){
				redirectUrl  += "?"+getExistingFilterFromUrl(currentUrl, "sport")+ "&store=" +this.value;

			}
			else{
				redirectUrl +="?store="+ this.value;  
			}
		}
		window.location.replace(redirectUrl);

	})





	$("#sortBy").on('change', function(){

		var model 		= $(this).attr('data-model');
		var currentUrl 	= window.location.href;
		var sportFilter = getExistingFilterFromUrl(currentUrl,"sport");
		var storeFilter = getExistingFilterFromUrl(currentUrl,"store");
		var sort        = getExistingSortFromUrl(currentUrl);
		console.log(sort)
		var redirectUrl = getBaseURL(currentUrl)+"/"+ model;
		if (sportFilter != null || storeFilter != null){
			if(/sort/.test(currentUrl)){
				redirectUrl = currentUrl.replace(sort[0], "sort="+this.value);
			}
			else{
				redirectUrl = currentUrl+"&sort="+(this.value);
			}
		}

		else{
			redirectUrl += "?sort="+(this.value);
		}
		window.location.replace(redirectUrl);

	})


	$('.image-thumbnail-holder div').on("click", function(){
		
		var  previouslySelected = $(this).find("img").first().attr('data-remove-image');
		var image = $(this).find("img").first();
		var imageName = $(this).find("img").first().attr('alt');
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
			$(this).css({"border-color": "#cf1d1d", 
								"border-width":"1px", 
				                "border-style":"solid"});
			$(this).next().removeClass("hidden");
			$(this).next().addClass("visible");

		}
		else if(previouslySelected == 'true'){

			$(this).css({"border": "none"});
			image.attr('data-remove-image', 'false');
			var newCurrentValue = currentValue.replace(imageName , '');
			
			
			$('#removeImages').val(function(i, currentValue){
				return newCurrentValue;
			});

			$(this).next().removeClass("visible");
			$(this).next().addClass("hidden");

		}

	})

	$('.video-thumbnail-holder div').on("click", function(){
		
		var previouslySelected = $(this).find("video").first().attr('data-remove-video');
		var video = $(this).find("video").first();
		var videoName = $(this).find("video").first().attr('data-video-name');
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
			$(this).css({"border-color": "#cf1d1d", 
								"border-width":"1px", 
				                "border-style":"solid"});
			$(this).next().removeClass("hidden");
			$(this).next().addClass("visible");

		}
		else if(previouslySelected == 'true'){

			$(this).css({"border": "none"});
			video.attr('data-remove-video', 'false');
			var newCurrentValue = currentValue.replace(videoName , '');
			
			
			$('#removeVideos').val(function(i, currentValue){
				return newCurrentValue;
			});

			$(this).next().removeClass("visible");
			$(this).next().addClass("hidden");

		}

	})

	


    $.fn.deleteModel = function(model, id, href){
        
        if (!confirm('Are you sure you want to delete the '+ model +' ?. This would mean deleting all the content for this sport.')){
          return;
        }  
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
             window.location.replace(href);
        }
    });
    }

     
    var getQueryFromUrl = function(url){
    	
    	if((/[?]/).test(url)){
    		var query = url.split('?').pop()
    	}
    	if(query != null){
    		return query;
    	}
    	else return null;
    	
    } 
    var getExistingFilterFromUrl = function(url, filterName){
    	
    	var query = getQueryFromUrl(url);
    	if( query != null )
    	{
    		var pattern = new RegExp(filterName+"=[\\d]+(,[\\d]+)*");

    		filter = query.match(pattern); 

    		if( filter != null ){
    			return(filter[0]);
    		} 
    	}
    	
    	
    }    	 	 
    var getExistingSortFromUrl = function(url){
    	
    	var query = getQueryFromUrl(url);
	    if( query != null ){
    		sort = query.match(/sort=[a-z]+([:]desc)?/) 
    		return sort;
    	}

    	
    }  

    var filterExists   = function(url){
    	var returnString = "";
    	if(url.match(/sport=[\d]+(,[\d]+)*/)){
    		returnString += "sport;";
    	}
    	if(url.match(/store=[\d]+(,[\d]+)*/)){
    		returnString +="store"
    	}
    	console.log(returnString)
    	return returnString;

    }

    var getBaseURL = function(currentUrl){

		if (! (/[0-9]{4}$/).test(currentUrl) )
		{
			var modelFromUrl = currentUrl.split(/[0-9]{4}/).pop();
			currentUrl = currentUrl.replace(modelFromUrl, "");
			
		}
		
		return currentUrl;
	}
	
	

});