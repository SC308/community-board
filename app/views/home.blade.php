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
			#home-callout{ z-index: 999 !important;}
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
						<img src="/timthumb.php?src=/images/feature/{{$f->path}}&w=1080&h=795.jpg" alt="">
						<div class="carousel-caption caption-right">
							<span class="caption-title">{{$f->title}}</span>
							<span class="caption-content">{{$f->content}}</span>
						</div>
					</div>
					@else
					<div class="item">
						<img src="/timthumb.php?src=/images/feature/{{$f->path}}&w=1080&h=795.jpg" alt="">
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

            <div id="nav">
                <div class="nav-callout">
                    <img src="/images/touch-an-area.jpg" />
                </div>
                <div class="nav-row">
                    <a href="#" class="nav-item green nav-noise nav-shadow" >
                            <div class="nav-content">
                                <i class="fa fa-calendar nav-icon"></i>
                                <span class="nav-text">Community Calendar</span>
                            </div>
                            <div class="nav-desc-bar">
                                this is the description bar
                            </div>


                    </a>

                    <a href="#" class="nav-item yellow nav-noise nav-shadow" >
                            <div class="nav-content">
                                <i class="fa fa-camera-retro nav-icon"></i>
                                <span class="nav-text">Community Photos</span>
                            </div>
                            <div class="nav-desc-bar">
                                this is the description bar
                            </div>


                    </a>

                    <a href="#" class="nav-item blue nav-noise nav-shadow" >
                            <div class="nav-content">
                                <i class="fa fa-users nav-icon"></i>
                                <span class="nav-text">Employee<br />Bios</span>
                            </div>
                            <div class="nav-desc-bar">
                                this is the description bar
                            </div>


                    </a>


                    <a href="#" class="nav-item red nav-noise nav-shadow">
                        <img src="/images/jumpstart-nav.png" style="position: relative; top: 20px; left: 30px;"/>
                    </a>

                    <a href="#" class="nav-item green nav-noise nav-shadow" >
                            <div class="nav-content">
                                <i class="fa fa-bicycle nav-icon"></i>
                                <span class="nav-text">Activity Advice</span>
                            </div>
                            <div class="nav-desc-bar">
                                this is the description bar
                            </div>


                    </a>

                    <!-- <div class="nav-item yellow nav-noise nav-shadow ">item 3</div> -->

                </div>


                <!-- <div class="nav-row">
                    <a href="#" class="nav-item red nav-noise nav-shadow">
                            <div class="nav-content">
                                <i class="fa fa-bicycle nav-icon"></i>
                                <span class="nav-text" style="padding-left: 30px; width: 140px;">Activity Advice</span>
                            </div>
                            <div class="nav-desc-bar">
                                this is the description bar
                            </div>
                    </a>

                    <a href="#" class="nav-item blue nav-noise nav-shadow">
                            <div class="nav-content">
                                <i class="fa fa-facebook-square nav-icon"></i>
                                <span class="nav-text">Social Media</span>
                            </div>
                            <div class="nav-desc-bar">
                                this is the description bar
                            </div>
                    </a>

                    <a href="#" class="nav-item yellow nav-noise nav-shadow">
                            <div class="nav-content">
                                <i class="fa fa-shopping-cart nav-icon"></i>
                                <span class="nav-text">Product Catalogue</span>
                            </div>
                            <div class="nav-desc-bar">
                                this is the description bar
                            </div>
                    </a>


                    <a href="#" class="nav-item green nav-noise nav-shadow">
                            <div class="nav-content">
                                <i class="fa fa-newspaper-o nav-icon"></i>
                                <span class="nav-text" style="padding-left: 30px; width: 140px;">Latest Flyer</span>
                            </div>
                            <div class="nav-desc-bar">
                                this is the description bar
                            </div>
                    </a>
                </div> -->
            </div>
            <!-- <div id="home-callout" class="fullwidth" style="z-inxex: 99 !important;">
                <img src="/images/communityboard-center259.jpg" style="z-inxex: 99 !important;" />
            </div> -->

            <!-- <div id="nav" class="fullwidth"> -->
<!--                 <a href="/<?=$storedetails[0]->store_number?>/staff"><img src="/images/nav-staff.png" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/calendar"><img src="/images/nav-calendar.png" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/photos"><img src="/images/nav-photos.png" /></a> -->

                <!-- <a href="/<?=$storedetails[0]->store_number?>/staff"><img src="/images/nav-staff-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/jumpstart"><img src="/images/nav-js-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/calendar"><img src="/images/nav-cal-sm.jpg" /></a>
                <a href="/<?=$storedetails[0]->store_number?>/photos"><img src="/images/nav-photos-sm.jpg" /></a>
            </div> -->

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

            	<!-- <a href="/<?=$storedetails[0]->store_number?>/flyer-int"> -->
            	<a href="/<?=$storedetails[0]->store_number?>/flyer">
            	<div id="flyerpreview">

		                <!-- <img id="miniflyer" src="/timthumb.php?src=/images/flyer/{{$flyer[0]->path}}&w=155&h=202.jpg" /> -->
						<img id="miniflyer" src="/timthumb.php?src=/images/flyer/{{$flyer[0]->path}}&w=172&h=400.jpg" />

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

             $("#scoreboard").load("/scoreboard.html");



        });
        </script>
    </body>

</html>
