<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$storedetails[0]->store_number?> Staff</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>

    </head>

    <body>

        <div id="stage">
            <div id="home-header" class="fullwidth">
                <div id="scoreboard" class="floatL"></div>
                <a href="/<?=$storedetails[0]->store_number?>/"><img src="/images/sc-logo.jpg" class="floatR" /></a>
            </div>

            <div id="staff">
                <div id="current-staff">
                    <div id="current-staff-bio">

                        <div id="bio">
                        <div id="store-ribbon">
                            <?=$storedetails[0]->store_name?>
                        </div>
                                <span class="whiteboxtop"></span><h1 class="name"></h1>
                                <span class="whitebox"></span><h2 class="dept"></h2>
                                <p class="bio-text">

                                </p>


                                <p class="sports">
                                    <i class="icon-heart"></i>&nbsp;&nbsp;Sport: <span class="favsport"></span>
                                </p>



                        </div>


                    </div>
<!--                     <div id="arrows"></div> -->
                    <div id="bio-nav" style="overflow: scroll;">

                        @foreach($staff as $s)
                           <a href="javascript:void(0)" onclick="javascript:show_{{$s->id}}();"><img src="/timthumb.php?src=/images/staff/{{ $s->photo }}&w=124&h=158&a=br" /></a>
                        @endforeach

                    </div>

                </div>




            </div>


<!--
            <div id="home-callout" class="fullwidth">
                <img src="images/communityboard-center.jpg" />
            </div>
-->

        @include('includes/nav')

        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number?>" id="sendstorenumber"></script>
<!--         <script src="js/jquery.mobile-1.3.2.min.js"></script> -->

        <script type="text/javascript">


        $('a').click(function (e) {
            if ($(':animated').length) {
                return false;
/*                 e.preventDefault(); */
            }
        });

        $( "#bio-nav" ).on( "swipeleft", swipeHandler );
        $( "#bio-nav" ).on( "swiperight", swipeHandler );

        function swipeHandler( event ){
            $("#arrows").fadeOut("fast");
        }
				<?php
					$i=1; $lowest = 0;
					$staffids = array();
				?>
            @foreach($staff as $s)

				<?php if($i == 1){  $lowest = $s->id; }


					$staffids[] = $s->id;

//					array_push($staffids, $s->id);





				?>

                function show_{{$s->id}}(){
                    resetTimer();
                    // $("#bio").css("left", "-300px");
                    $("#bio").css("opacity", "0");
                    $("#current-staff-bio").css("opacity", "0");

                            $(".name").replaceWith('<h1 class="name"><!--<span class="whitebox"></span>-->{{$s->first}}</h1>');
                            $(".dept").replaceWith('<h2 class="dept"><!--<span class="whitebox"></span>-->{{$s->position}}</h2>');
                            $(".bio-text").replaceWith("<p class='bio-text'>{{{ preg_replace( "/\r|\n/", "", $s->bio) }}}</p>");
							$(".favsport").replaceWith("<span class='favsport'>{{$s->favorite_sport}}</span>");
                            $("#current-staff-bio").css("background", "transparent url('/timthumb.php?src=/images/staff/{{ $s->photo }}&w=1080&h=947') bottom center no-repeat");

                    $( "#bio" ).animate({
                        opacity: 1.0,
                        // left: "+=300"
                        }, 1000, function() {
                    });

                  $( "#current-staff-bio" ).animate({
                        opacity: 1.0
                        }, 1000, function() {
                    });

                  //resetTimer();
                }
                <?php $i++;?>
            @endforeach


        $( document ).ready(function() {





            // $( "#bio" ).animate({
            //     opacity: 1.0,
            //     left: "+=300"
            //     }, 1000, function() {
            //     // Animation complete.
            // });

            $("#scoreboard").load("/scoreboard.html");

		<?php
			$k = array_rand($staffids);

			echo "// random key:" . $k . "\n\n";

			$value = $staffids[$k];
			echo "// random value:". $value . "\n\n";


			echo "// ---------------------\n\n";
			echo "/*";
			print_r($staffids);
			echo "*/";

		?>

            show_{{$value}}();
        });

        </script>


    </body>

</html>
