<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $storedetails[0]->store_number . " - " . $storedetails[0]->store_name;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/cashwall.css?<?=time();?>">
    </head>

    <body>

        <!-- <div class="debug"></div> -->

        <div id="stage">


            <div class="region double top-left">
                <h1>Community Photos</h1>
                <ul class="polaroids">
                <?php
                $i = 0;
                foreach ($photos as $p) {
                ?>
                    <li class="commphoto" id="pic_<?=$i;?>"><a href="#"><img id="img_<?=$i;?>" src="/timthumb.php?src=/images/photos/{{ $p->path }}&w=500h=333&a=c" /></a></li>
                <?php
                $i++;
                }
                ?>
                </ul>

            </div>

            <div class="region single top-middle">

            
            	<video width="1920" height="1080" autoplay="autoplay" loop="true" loop>
                  <source src="/video/SC_BTS_FY16_Landscape.mp4?<?=time();?>" type="video/mp4" />
                </video>
            

                <div id="" class="carousel slide singlepics" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $i = 1;
                    foreach ($singles as $s) {

                        if ($i == 1) {
                        ?>
                        <div class="item active">
                             <img src="/images/cash/{{$s->path}}" />
                        </div>
                        <?php } else {?>
                        <div class="item">
                             <img src="/images/cash/{{$s->path}}" />
                        </div>
                        <?php }

                        $i++;
                    }
                    ?>


                </div>


                </div> <!-- //end carousel -->

            </div>
            <div class="region single bottom-middle">


                <iframe scrolling="no" seamless="seamless" style="border: 0; display: inline; overflow: hidden !important;" height="1080" width="1920" src="http://scoreapi.flagshipapps.fglsports.com/cash/{{ $storedetails[0]->timezone_offset }}"></iframe>

            </div>


            <div class="region half top-right">
                <h2 class="events-heading">Upcoming Events</h2>

                <div id="" class="carousel slide events" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $i = 1;
                        foreach ($events as $e) {
                            $currentmonth = $e->startmonth;
                            $monthName    = date("F", mktime(0, 0, 0, $e->startmonth, 10));
                    ?>
                    <div class="item <?php if ($i == 1) {echo 'active';} ?>">
                        <h3>{{ $monthName }} {{ $e->startday }} &nbsp;&nbsp;&nbsp; <?php $t = $e->starthour . ":" . $e->startmin;
                        echo date("g:i a", strtotime($t));?></h3>

                        <h4>{{ $e->title }}</h4>
                        <h4>{{ $e->location }}</h4>
                        <p>{{ $e->description }}</p>
                    </div>

                    <?php
                            $i++;
                        }
                    ?>

                </div>

            </div> <!-- //end carousel -->



            </div>

            <div class="region half bottom-right">

                <div id="" class="carousel slide staffslider" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $i = 1;?>
                    @foreach($staff as $s)


                    <div class="item <?php if ($i == 1) {echo 'active';} ?>">

                         <img src="/timthumb.php?src=/images/staff/{{ $s->photo }}&w=960&h=1080&a=br" />
                         <span class="staff-ribbon">Your Store Staff</span>
                         <span class="staffname">
                            <em>{{$s->first}}</em> <br />
                            {{$s->position}}
                         </span>

                    </div>




                    <?php $i++;?>
                    @endforeach

                </div>


                </div> <!-- //end carousel -->

            </div>


            <div class="region tall abs-right-top">
                   @if($storedetails[0]->scribble_live_id)
                        <h2 class="events-heading">Social Media</h2>
                        <h3>{{ $storedetails[0]->social_media_handle }}</h3>
                        <div id="social" class="scrbbl-embed" data-src="/event/{{ $storedetails[0]->scribble_live_id }}/24176"></div>
                            <script>
                                (function(d, s, id) {
                                    var js,ijs=d.getElementsByTagName(s)[0];
                                    if(d.getElementById(id))return;
                                    js=d.createElement(s);
                                    js.id=id;
                                    js.src="//embed.scribblelive.com/widgets/embed.js";
                                    ijs.parentNode.insertBefore(js, ijs);
                                }
                                (document, 'script', 'scrbbl-js'));
                            </script>                                                 
                    @else

                        <div id="" class="carousel slide tallpics" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php $i = 1;?>
                                @foreach($talls as $t)

                                    @if($i==1)
                                        <div class="item active">
                                            <img src="/images/cash/{{$t->path}}" />
                                        </div>
                                    @else
                                        <div class="item">
                                            <img src="/images/cash/{{$t->path}}" />
                                        </div>
                                    @endif

                                <?php $i++;?>
                                @endforeach
                            </div>


                        </div> <!-- //end carousel -->


                    @endif


        </div>

        <script>

            var photoArray = [
                @foreach($photos as $p)
                    "{{$p->path}}",
                @endforeach
             ];

        </script>

        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/lib/move.js"></script>
        <script src="/js/lib/bootstrap.min.js"></script>
        <script src="/js/cashwall.js"></script>

    </body>

</html>
