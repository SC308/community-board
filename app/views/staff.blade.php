<!DOCTYPE html>
<html class="no-js">
    <head>
    <meta charset="utf-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$storedetails[0]->store_number;?> Staff</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/lib/bootstrap-combined.no-icons.min.css?<?=time();?>">
        <link rel="stylesheet" href="/css/lib/font-awesome.css?<?=time();?>">
        <link rel="stylesheet" href="/js/lib/fancybox/source/jquery.fancybox.css?<?=time();?>">
        <link rel="stylesheet" href="/css/main.css?<?=time();?>">

		<script src="/js/lib/modernizr.min.js"></script>

    </head>

    <body>

        <div id="stage">
            <div id="home-header" class="fullwidth">
                <iframe style="border: 0;display: inline;" id="scoreboard" class="floatL" src="http://scoreapi.flagshipapps.fglsports.com/flip/{{ $storedetails[0]->timezone_offset }}"></iframe>
                <a href="/<?=$storedetails[0]->store_number;?>/"><img src="/images/sc-logo.jpg" class="floatR" /></a>
            </div>

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
                    <div id="bio-nav" style="overflow: scroll;">

                        @foreach($staff_chunks[$chunkCounter] as $s)
                            <?php  $filename = pathinfo($s->photo)['filename']; ?>
                            <a href="javascript:void(0)" onclick="javascript:extract(this);" data-first= "{{$s->first}}" data-position = "{{$s->position}}" data-bio =  "{{$s->bio}}" data-sport = "{{$s->favorite_sport}}" data-photo = "{{$filename}}">
                                <img src="/images/staff/thumb/{{ $filename }}_124X158.jpg" />
                            </a>
                        @endforeach

                    </div>

                </div>

            </div>


        @include('includes/nav')

        </div>

        <script>
            var staff_data =  {{ json_encode($staff) }}
            var staff_chunks =  {{ json_encode($staff_chunks) }}
            var counter = {{$chunkCounter}}
            var totalChunks = {{$chunkCounterMax}}
        </script>

        <script src="/js/lib/jquery-1.10.2.min.js"></script>
		<script src="/js/timer.js?sendstorenumber=<?=$storedetails[0]->store_number;?>" id="sendstorenumber"></script>
        <script src="/js/staff.js"></script>
        <script src="/js/common.js"></script>
        


    </body>

</html>
