<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $storedetails[0]->store_number . " - " . $storedetails[0]->store_name;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>

		<style>
			#home-callout{ z-index: 999 !important;}
			.featurecontent .item {-webkit-transition: opacity 3s; -moz-transition: opacity 3s; -ms-transition: opacity 3s; -o-transition: opacity 3s; transition: opacity 3s;}
			.featurecontent .active.left {left:0;opacity:0;z-index:2;}
			.featurecontent .next {left:0;opacity:1;z-index:1;}
		</style>
    </head>

    <body>
        <div id="stage">
            <div id="home-header" class="fullwidth">
            	<iframe style="border: 0;display: inline;" id="scoreboard" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip"></iframe>
                <!-- <div id="scoreboard" class="floatL"></div> -->
                <img src="/images/sc-logo.jpg" class="floatR" />
            </div>

            <div id="home-bio" class="fullwidth">


				<div id="" class="carousel slide featurecontent" data-ride="carousel">

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<?php $i = 1;?>
					@foreach($feature as $f)

					@if($i==1)
					<div class="item active">
                        <?php $filename = pathinfo( $f->path ,PATHINFO_FILENAME) ?>
						<img src="/images/feature/p/{{$filename}}_1080X795.jpg" alt="">
						<div class="carousel-caption caption-right">
							<span class="caption-title">{{$f->title}}</span>
							<span class="caption-content">{{$f->content}}</span>
						</div>
					</div>
					@else
					<div class="item">
                        <?php $filename = pathinfo( $f->path ,PATHINFO_FILENAME) ?>
						<img src="/images/feature/p/{{$filename}}_1080X795.jpg" alt="">
						<div class="carousel-caption caption-left">
							<span class="caption-title">{{$f->title}}</span>
							<span class="caption-content">{{$f->content}}</span>
						</div>
					</div>
					@endif

					<?php $i++;?>

					@endforeach

				</div>


				</div> <!-- //end carousel -->


            </div>

            @include('includes/nav')


            <div id="home-flyer" class="fullwidth">
            	<div id="toppicks">

            	<div id="" class="carousel slide toppicks" data-ride="carousel">

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				  	<?php $i = 1;?>
				  	@foreach($toppicks as $tp)

					  	@if($i==1)
					    <div class="item active">
					    	<?php $filename = pathinfo( $tp->path ,PATHINFO_FILENAME) ?>
					      <img src="/images/flyer/toppick/p/{{$filename}}_836X553.jpg" alt="">
					      <div class="carousel-caption"></div>
					    </div>
					    @else
					    <div class="item">
					    	<?php $filename = pathinfo( $tp->path ,PATHINFO_FILENAME) ?>
					      <img src="/images/flyer/toppick/p/{{$filename}}_836X553.jpg" alt="">
					      <div class="carousel-caption"></div>
					    </div>
					    @endif

					<?php $i++;?>

				  	@endforeach

				  </div>


				</div> <!-- //end carousel -->


            	</div> <!-- //end toppicks -->

            	<!-- <a href="/<?=$storedetails[0]->store_number;?>/flyer-int"> -->
            	<a href="/<?=$storedetails[0]->store_number;?>/flyer">
            	<div id="flyerpreview">

		                <!-- <img id="miniflyer" src="/timthumb.php?src=/images/flyer/{{$flyer[0]->path}}&w=155&h=202.jpg" /> -->
		                <?php $filename = pathinfo( $flyer[0]->path ,PATHINFO_FILENAME) ?>
						<img id="miniflyer" src="/images/flyer/thumb/p/{{$filename}}_175X204.jpg" />

            	</div>
            	</a>


            </div>

        </div>

        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

        <script>



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

          // $('#home-callout').animate({ boxShadow : "0 0 5px 3px rgba(100,100,200,0.4)" });

           //  $("#scoreboard").load("http://scoreapi.flagshipapps.fglsports.com/flip");



        });
        </script>
    </body>

</html>
