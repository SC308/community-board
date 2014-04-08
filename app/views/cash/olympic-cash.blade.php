<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    
        <link rel="stylesheet" href="/cash-assets/css/main.css">
        <link rel="stylesheet" href="/cash-assets/css/logo.css">
        <link rel="stylesheet" href="/cash-assets/css/flags.css">

    </head>

    <body>

       <!--  <div class="debug"></div> -->

        <div id="stage">


            <div class="region double top-left">
                

                <h1>Community Photos</h1>
                <ul class="polaroids">
                <?php $i=0 ?>
                @foreach($photos as $p)
                    <li class="commphoto" id="pic_<?=$i?>"><a href="#"><img id="img_<?=$i?>" src="timthumb.php?src=/images/photos/{{ $p->path }}&w=500h=333&a=c" /></a></li>
                <?php $i++?>
                @endforeach
                </ul>
                
            </div>

            <div class="region single top-middle">
               <!--  <img src="/cash-assets/images/what-it-takes.png" /> -->
              <!--  <div class="flag us"></div> -->
                
<!--                 <h2>Community Photos</h2>
                <ul class="polaroids">
                <?php $i=0 ?>
                @foreach($photos as $p)
                    <li class="commphoto" id="pic_<?=$i?>"><a href="#"><img id="img_<?=$i?>" src="timthumb.php?src=/images/photos/{{ $p->path }}&w=250h=167&a=c" /></a></li>
                <?php $i++?>
                @endforeach
                </ul> -->

                <video width="1920" height="1080" autoplay="autoplay" loop> 
                  <source src="/cash-assets/OlympicsP2_30_GCG_Landscape.mp4" type="video/mp4" />
                </video>

            </div>
            <div class="region single bottom-middle">
                <div id="scoreboard"></div>
            </div>


            <div class="region half top-right">
                <h2 class="events-heading">Upcoming Events</h2>
   
                <div id="" class="carousel slide events" data-ride="carousel">
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $i=1 ?>
                    @foreach($events as $e)
                    <?php
                        $currentmonth = $e->startmonth;
                        $monthName = date("F", mktime(0, 0, 0, $e->startmonth, 10));
                    ?>
                    <div class="item <?php if($i==1) { echo 'active'; } ?>">
                        <h3>{{ $monthName }} {{ $e->startday }} &nbsp;&nbsp;&nbsp; <? $t = $e->starthour.":".$e->startmin; echo date("g:i a", strtotime($t));?></h3>
                        
                        <h4>  {{ $e->title }}</h4>
                        <h4>{{ $e->location }}</h4>
                        <p>{{ $e->description }}</p>
                    </div>
                    
                    <?php $i++; ?>  
                    @endforeach     
                
                </div>  
                

                </div> <!-- //end carousel -->
    
     

            </div>

            <div class="region half bottom-right">
                
                <div id="" class="carousel slide staffslider" data-ride="carousel">
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $i=1 ?>
                    @foreach($staff as $s)

                    <div class="item <?php if($i==1) { echo 'active'; } ?>">

                         <img src="timthumb.php?src=/images/staff/{{ $s->photo }}&w=960&h=1080&a=br" />
                         <span class="staff-ribbon">Your Store Staff</span>
                         <span class="staffname">
                            <em>{{$s->first}} {{$s->last}}</em> <br />
                            {{$s->position}}
                         </span>
                         
                    </div>

                    <?php $i++; ?>  
                    @endforeach     
                
                </div>  
                

                </div> <!-- //end carousel -->        

            </div>
            

            <div class="region tall abs-right-top medal-count">



            </div>
        

        </div>

        <script src="/js/lib/jquery-1.10.2.min.js"></script>
        <script src="/js/lib/move.js"></script>
        <script src="/cash-assets/js/main.js"></script>
        <script src="/js/bootstrap.min.js"></script>

        <script>
        //8 hour refresh
        setTimeout(function(){ location.reload(); }, 60000 * 60 * 12 );
       // setTimeout(function(){ location.reload(); }, 10000 );
        $( document ).ready(function() {
            // $('.tallpics').carousel({
            //   interval: 8000
            // });

            $('.singlepics').carousel({
              interval: 12000
            });     

            $('.events').carousel({
              interval: 12000
            });    

            $('.staffslider').carousel({
              interval: 10000
            });    

                            
        });

        $("#scoreboard").load("scoreboard-cash.html");
        
        $(".medal-count").load("olympic-count.html"); 
        setInterval(function(){ $(".medal-count").load("olympic-count.html");   },300000);
        
        go();
        setInterval(function(){ gather(); },16000);
        // setInterval(function(){ go(); }, 16800 );
        
        function Shuffle(o) {
            for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
            return o;
        };

        
        function reassign() {

             var photoArray = [ 
                @foreach($photos as $p)
                    "{{$p->path}}",
                @endforeach
             ];

            Shuffle(photoArray);

           for (var i=0;i<photoArray.length;i++) {
              $("#img_"+i ).attr("src", "timthumb.php?src=/images/photos/"+photoArray[i]+"&w=500h=333&a=c.jpg");
           }
        }

        function go(){
            
            reassign();
            // Shuffle(photoArray);
            // for (var i=0;i<photoArray.length;i++) {
            //     $("#img_"+i ).attr("src", "timthumb.php?src=/images/photos/"+photoArray[i]+"&w=500h=333.jpg");
            // }

            move('#pic_0').x(0).y(20).end();
            move('#pic_1').x(600).y(20).end();
            move('#pic_2').x(1200).y(20).end();

            move('#pic_3').x(0).y(400).end();
            move('#pic_4').x(600).y(400).end();
            move('#pic_5').x(1200).y(400).end();      

            move('#pic_6').x(0).y(800).end();
            move('#pic_7').x(600).y(800).end();
            move('#pic_8').x(1200).y(800).end(); 

            move('#pic_9').x(0).y(1200).end();
            move('#pic_10').x(600).y(1200).end();
            move('#pic_11').x(1200).y(1200).end(); 
        }

        function gather(){
            // alert("gather");
            move('#pic_11').x(0).y(0).end();
            move('#pic_10').x(0).y(0).end();
            move('#pic_9').x(0).y(0).end();

            move('#pic_8').x(0).y(0).end();
            move('#pic_7').x(0).y(0).end();
            move('#pic_6').x(0).y(0).end();      

            move('#pic_5').x(0).y(0).end();
            move('#pic_4').x(0).y(0).end();
            move('#pic_3').x(0).y(0).end(); 

            move('#pic_2').x(0).y(0).end();
            move('#pic_1').x(0).y(0).end();
            move('#pic_0').x(0).y(0).end(); 

            setTimeout(go, 500);
        
        }
        </script>
    </body>

</html>