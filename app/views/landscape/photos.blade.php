<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $storedetails[0]->store_number . " - " . $storedetails[0]->store_name;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="/css/lib/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" type="text/css" href="/css/lib/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" type="text/css" href="/js/lib/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" type="text/css" href="/js/lib/lightbox/css/lightbox.css?<?=time();?>">
        <link rel="stylesheet" type="text/css" href="/css/main.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>

    </head>

    <body class="landscape">
        <div id="stage">
        	<div id="heading">
             	<iframe style="border: 0;display: inline;" height="110" width="1595" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip-ls/{{ $storedetails[0]->timezone_offset }}"></iframe>
                <a href="/<?php echo $storedetails[0]->store_number;?>/ls"><img src="/images/sc-logo-ls.jpg" id="logo" /></a>
            </div>

            @include('includes/nav-ls')

        	<div id="main" class="photos">

            @foreach($photos[$chunkCounter] as $p)
                <?php  $filename = pathinfo($p->path)['filename']; ?>
	            <a class="fancybox" data-lightbox = "{{ $p->path }}" href="/images/photos/full/{{ $filename }}_800.jpg" title="<strong>{{ $p->title}}</strong><br />{{ $p->description}}<?php if ($p->location != "") {echo '<br /><small class=smaller>Location: ' . $p->location . '</small>';}
?><?php if ($p->photographer_name != "") {echo '&nbsp;&nbsp;&nbsp;<small class=smaller>Photographer: ' . $p->photographer_name . '</small>';}
?>"><img src="/images/photos/thumb/{{ $filename }}_300.jpg" /></a>

            @endforeach

        	</div>

        </div>

        <script>
            var counter = {{$chunkCounter}}
            var totalChunks = {{$chunkCounterMax}}
            var photos = {{json_encode($photos)}};
        </script>

        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/lib/bootstrap.min.js"></script>

        <script src="/js/lib/jquery.grid-a-licious.js"></script>
        <!-- // <script src="/js/fancybox/source/jquery.fancybox-ls.js"></script> -->
        <script type="text/javascript" src= "/js/lib/lightbox/js/lightbox.js"></script>
        <script type="text/javascript" src= "/js/lib/underscore-1.8.3.min.js"></script>
		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>/ls" id="sendstorenumber"></script>
        <script type="text/javascript" src="/js/photos-ls.js"></script>
        <script type="text/javascript" src="/js/common.js"></script>

    </body>

</html>
