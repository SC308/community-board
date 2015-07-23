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
			.featurecontent .item {-webkit-transition: opacity 3s; -moz-transition: opacity 3s; -ms-transition: opacity 3s; -o-transition: opacity 3s; transition: opacity 3s;}
			.featurecontent .active.left {left:0;opacity:0;z-index:2;}
			.featurecontent .next {left:0;opacity:1;z-index:1;}
		</style>
    </head>

    <body class="landscape">
        <div id="stage">
        	<div id="heading">
                <iframe style="border: 0;display: inline;" height="110" width="1595" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip-ls"></iframe>
             	{{-- <div id="scoreboard" class="floatL"></div> --}}
                <a href="/<?php echo $storedetails[0]->store_number;?>/ls"><img src="/images/sc-logo-ls.jpg" id="logo" /></a>
            </div>

            @include('includes/nav-ls')

        	<div id="main" class="home">

                <div id="landscape-feature">


                    <div id="" class="carousel slide featurecontent" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php $i = 1;?>
                        @foreach($feature as $f)

                        @if($i==1)
                        <div class="item active">
                            <?php $filename = pathinfo( $f->path ,PATHINFO_FILENAME) ?>
                            <img src="/timthumb.php?src=/images/feature/{{$f->path}}&w=1200&h=860.jpg" alt="">
                            <div class="carousel-caption caption-right">
                                <span class="caption-title">{{$f->title}}</span>
                                <span class="caption-content">{{$f->content}}</span>
                            </div>
                        </div>
                        @else
                        <div class="item">
                            <?php $filename = pathinfo( $f->path ,PATHINFO_FILENAME) ?>
                            <img src="/timthumb.php?src=/images/feature/{{$f->path}}&w=1200&h=860.jpg" alt="">
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


                <div id="landscape-sidebar">

<!--                     <a href="/<?=$storedetails[0]->store_number;?>/ls/flyer-int"> -->
	                <a href="/<?=$storedetails[0]->store_number;?>/ls/flyer">
                    <div id="flyerpreview">
                        <img src="/images/flyer-callout-ls2.png" id="flyer-title">

                       <!--  <img class="miniflyer" src="/timthumb.php?src=/images/flyer/{{$flyer[0]->path}}&w=306&h=400.jpg" /> -->
                       <?php $filename = pathinfo( $flyer[0]->path ,PATHINFO_FILENAME) ?>
					   <img id="miniflyer" src="/images/flyer/thumb/ls/{{$filename}}_175X204.jpg" style="position: relative; top: -10px; left: 110px;" />

                    </div>
                    </a>


                    <div id="toppicks">

                        <div id="" class="carousel slide toppicks" data-ride="carousel">

                              <!-- Wrapper for slides -->
                              <div class="carousel-inner">
                                <?php $i = 1;?>
                                @foreach($toppicks as $tp)

                                    @if($i==1)
                                    <div class="item active">
                                      <?php $filename = pathinfo( $tp->path ,PATHINFO_FILENAME) ?>
                                      <img src="/images/flyer/toppick/ls/{{$filename}}_418X277.jpg" alt="">
                                      <div class="carousel-caption"></div>
                                    </div>
                                    @else
                                    <div class="item">
                                      <?php $filename = pathinfo( $tp->path ,PATHINFO_FILENAME) ?>
                                      <img src="/images/flyer/toppick/ls/{{$filename}}_418X277.jpg" alt="">
                                      <div class="carousel-caption"></div>
                                    </div>
                                    @endif

                                <?php $i++;?>

                                @endforeach

                              </div>


                        </div> <!-- //end carousel -->

                    </div> <!-- //end toppicks -->


                </div>


            </div>


        </div>


        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>


        <script>
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
        </script>
    </body>

</html>
