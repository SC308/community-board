<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $storedetails[0]->store_number . " - " . $storedetails[0]->store_name;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/lib/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/lib/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" href="/js/lib/fancybox/source/jquery.fancybox.css?<?=time();?>">
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
            	<iframe style="border: 0;display: inline;" height="110" width="1595" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip-ls/{{ $storedetails[0]->timezone_offset }}"></iframe>
                <a href="/<?php echo $storedetails[0]->store_number;?>/ls"><img src="/images/sc-logo-ls.jpg" id="logo" /></a>
            </div>

            @include('includes/nav-ls')

        	<div id="main">


			<div id="staff">
                <div id="current-staff">
                    <div id="current-staff-bio">

                        <div id="bio">
                        <div id="store-ribbon">
                            <?=$storedetails[0]->store_name;?>
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

                        @foreach($staff_chunks[$chunkCounter] as $s)
                            <?php  $filename = pathinfo($s->photo)['filename']; ?>
                            <a href="javascript:void(0)" onclick="javascript:extract(this);" data-first= "{{$s->first}}" data-position = "{{$s->position}}" data-bio =  "{{$s->bio}}" data-sport = "{{$s->favorite_sport}}" data-photo = "{{$filename}}">
                                <img src="/images/staff/thumb/{{ $filename }}_124X158.jpg" />
                            </a>
                        @endforeach

                    </div>


            </div> <!--end staff -->

        	</div>


        </div>

        <script type="text/javascript">
            var staff_data =  {{ json_encode($staff) }}
            var staff_chunks =  {{ json_encode($staff_chunks) }}
            var counter = {{$chunkCounter}}
            var totalChunks = {{$chunkCounterMax}}
        </script>

        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/lib/bootstrap.min.js"></script>
		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>/ls" id="sendstorenumber"></script>
        <script type="text/javascript" src="/js/staff-ls.js"></script>
        <script type="text/javascript" src="/js/common.js"></script>

    </body>

</html>
