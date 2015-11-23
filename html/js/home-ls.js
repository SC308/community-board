$( document ).ready(function() {

	document.oncontextmenu = function () { return false; };

	//$("#scoreboard").load("/scoreboard.html");

    $('.featurecontent').carousel({
        interval: 15000
    });


    $('.featurecontent').on('slide.bs.carousel', function () {
        $( ".carousel-caption" ).animate({
            bottom: "-250px"
        });

    });

    $('.featurecontent').on('slid.bs.carousel', function () {
        $( ".carousel-caption" ).animate({
            bottom: "250px"
        });
    });

    $('.toppicks').carousel({
      interval: 8000
    });

});