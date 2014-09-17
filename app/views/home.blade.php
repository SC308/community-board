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
		</style> 
    </head>

    <body>
        <div id="stage">
            <div id="home-header" class="fullwidth">
                <div id="scoreboard" class="floatL"></div>              
                <img src="/images/sc-logo.jpg" class="floatR" />
            </div>
            
            <div id="home-bio" class="fullwidth">
            
            
				<div id="" class="carousel slide featurecontent" data-ride="carousel">
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<?php $i=1 ?>
					@foreach($feature as $f)
					
					@if($i==1)
					<div class="item active">
						<img src="/timthumb.php?src=/images/feature/{{$f->path}}&w=1080&h=600.jpg" alt="">
						<div class="carousel-caption caption-right">
							<span class="caption-title">{{$f->title}}</span>
							<span class="caption-content">{{$f->content}}</span>
						</div>
					</div>
					@else
					<div class="item">
						<img src="/timthumb.php?src=/images/feature/{{$f->path}}&w=1080&h=600.jpg" alt="">
						<div class="carousel-caption caption-left">
							<span class="caption-title">{{$f->title}}</span>
							<span class="caption-content">{{$f->content}}</span>
						</div>
					</div>					    
					@endif
					
					<?php $i++; ?>    
					
					@endforeach	    
				
				</div>  
				

				</div> <!-- //end carousel -->

<!--
                <div id="feature-bio">
                    <img src="/images/feature-bio.png" />
                </div>
-->

            </div>
            <div id="home-callout" class="fullwidth">
                <img src="/images/communityboard-center.jpg" />
            </div>

            <div id="nav" class="fullwidth">
<!--                 <a href="/<?=$storedetails[0]->store_number?>/staff"><img src="/images/nav-staff.png" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/calendar"><img src="/images/nav-calendar.png" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/photos"><img src="/images/nav-photos.png" /></a> -->

                <a href="/<?=$storedetails[0]->store_number?>/staff"><img src="/images/nav-staff-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/jumpstart"><img src="/images/nav-js-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/calendar"><img src="/images/nav-cal-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/photos"><img src="/images/nav-photos-sm.jpg" /></a>
            </div>

            <div id="home-flyer" class="fullwidth">
            	<div id="toppicks">
            	
            	<div id="" class="carousel slide toppicks" data-ride="carousel">

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				  	<?php $i=1 ?>
				  	@foreach($toppicks as $tp)
				  	
					  	@if($i==1)
					    <div class="item active">
					      <img src="/timthumb.php?src=/images/flyer/{{$tp->path}}&w=836&h=553.jpg" alt="">
					      <div class="carousel-caption"></div>
					    </div>
					    @else
					    <div class="item">
					      <img src="/timthumb.php?src=/images/flyer/{{$tp->path}}&w=836&h=553.jpg" alt="">
					      <div class="carousel-caption"></div>
					    </div>					    
					    @endif
					
					<?php $i++; ?>    
		
				  	@endforeach	    
				    
				  </div>  
				

				</div> <!-- //end carousel -->
            	
            	
            	</div> <!-- //end toppicks -->
            	
            	<a href="/<?=$storedetails[0]->store_number?>/flyer-int">
            	<div id="flyerpreview">
	                	@foreach($flyer as $f)
		                <img id="miniflyer" src="/timthumb.php?src=/images/flyer/{{$f->path}}&w=155&h=367.jpg" />
		                @endforeach
	             	            	
            	</div>
            	</a>


            </div>

        </div>

        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

        <script> 
        $( document ).ready(function() {
        
        	document.oncontextmenu = function () { return false; };
        	
	        $('.toppicks').carousel({
			  interval: 8000
			});
			
			$('.featurecontent').carousel({
				interval: 15000
			});
        
            $('#home-bio').animate({
                opacity: 1.0
            }, 1000, function() {

            });
            $( "#feature-bio" ).animate({
                opacity: 1.0,
                left: "+=75"
                }, 1000, function() {
            // Animation complete.
            });

          // $('#home-callout').animate({ boxShadow : "0 0 5px 3px rgba(100,100,200,0.4)" });

             $("#scoreboard").load("/scoreboard.html"); 
          

            
        });
        </script>          
    </body>

</html>