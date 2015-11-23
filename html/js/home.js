$( document ).ready(function() {

	//document.oncontextmenu = function () { return false; };

    $('.toppicks').carousel({
	  interval: 8000
	});

	$('.featurecontent').carousel({
		interval: 15000
	});


	$('.featurecontent').on('slide.bs.carousel', function () {
		$( ".carousel-caption" ).animate({
        	right: "1500px"
        });

	});

	$('.featurecontent').on('slid.bs.carousel', function () {
		$( ".carousel-caption" ).animate({
        	right: "0px"
        });
	});

    $('#home-bio').animate({
        opacity: 1.0
    }, 1000, function() {

    });
    $( "#feature-bio" ).animate({
        opacity: 1.0,
        left: "+=75"
        }, 1000, function() {
    });

});
