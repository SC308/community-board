<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $storedetails[0]->store_number . " - " . $storedetails[0]->store_name ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>">  
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">
        
		<script src="/js/lib/modernizr.min.js"></script>       
		
		<style>
			.featurecontent .item {-webkit-transition: opacity 3s; -moz-transition: opacity 3s; -ms-transition: opacity 3s; -o-transition: opacity 3s; transition: opacity 3s;}
			.featurecontent .active.left {left:0;opacity:0;z-index:2;}
			.featurecontent .next {left:0;opacity:1;z-index:1;}			

          /*  #main{ background-color: #fff; }*/
		</style> 
    </head>

    <body class="landscape">
        <div id="stage">
        	<div id="heading">
            
                <a href="/<?php echo $storedetails[0]->store_number ?>/ls"><img src="/images/sc-logo-ls.jpg" id="logo" /></a>
            </div>


        	<div id="nav">
        		<!-- <a href="/<?php echo $storedetails[0]->store_number ?>/ls/staff"/><img src="/images/nav-ls-staff.jpg" /></a> -->
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/flyer-int"/><img src="/images/nav-ls-flyer.jpg" /></a>
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/calendar"/><img src="/images/nav-ls-calendar.jpg" /></a>
        		<a href="/<?php echo $storedetails[0]->store_number ?>/ls/photos"/><img src="/images/nav-ls-photos.jpg" /></a>
                <a href="/<?php echo $storedetails[0]->store_number ?>/ls/jumpstart"/><img src="/images/nav-ls-jumpstart.jpg" /></a>
        	</div>

        	<div id="main">


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


                </div>

                    <div id="bio-nav" style="overflow: scroll;">

                        @foreach($staff as $s)
                           <a href="javascript:void(0)" onclick="javascript:show_{{$s->id}}();"><img src="/timthumb.php?src=/images/staff/{{ $s->photo }}&w=124&h=158&a=br" /></a>
                        @endforeach

                    </div>
                

            </div> <!--end staff -->


                
        	</div>


        </div>	


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>


        <script> 

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
				<?php $i=1; $lowest = 0;?>
            @foreach($staff as $s)
			
							<?php if($i == 1){  $lowest = $s->id; }?>
					
                function show_{{$s->id}}(){

                    // $("#bio").css("left", "-300px");
                    $("#bio").css("opacity", "0");
                    $("#current-staff-bio").css("opacity", "0");

                            $(".name").replaceWith('<h1 class="name"><!--<span class="whitebox"></span>-->{{$s->first}} {{$s->last}}</h1>');
                            $(".dept").replaceWith('<h2 class="dept"><!--<span class="whitebox"></span>-->{{$s->position}}</h2>');
                            $(".bio-text").replaceWith("<p class='bio-text'>{{{ preg_replace( "/\r|\n/", "", $s->bio) }}}</p>");
							$(".favsport").replaceWith("<span class='favsport'>{{$s->favorite_sport}}</span>");
                            $("#current-staff-bio").css("background", "transparent url('/timthumb.php?src=/images/staff/{{ $s->photo }}&w=1180&h=947') bottom left no-repeat");

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
        
        	//document.oncontextmenu = function () { return false; };
        	
			//$("#scoreboard").load("/scoreboard.html"); 

			show_{{$lowest}}();

        });
        </script>          
    </body>

</html>