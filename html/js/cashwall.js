$( document ).ready(function() {
            $('.tallpics').carousel({
              interval: 8000
            });

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

    //    $("#scoreboard").load("/scoreboard-cash.html");


        go();
        setInterval(function(){ gather(); },16000);

        // setInterval(function() {
        //   var elem = document.getElementById('social');
        //   elem.scrollTop = elem.scrollHeight;
        // }, 10000);
        
        $(document).ready(function() {  

            function loop(){

                var iframeHeight = $("#social > iframe").height();
                if(iframeHeight < 100){
                    var timer = 5000;    
                } else {
                    var timer = iframeHeight * 10;
                }
                
                console.log("H:" + iframeHeight +", T:" + timer);
                $('#social')
                 .animate({scrollTop: iframeHeight }, timer, 'linear')
                 .animate({scrollTop: 0}, 0, loop); // callback
            }

            loop(); // call this wherever you want
        }); 

        //$("#social").animate({ scrollTop: 100000 }, 350000);
        // setInterval(function(){ go(); }, 16800 );

        function Shuffle(o) {
            for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
            return o;
        };

        function reassign() {

            Shuffle(photoArray);

           for (var i=0;i<photoArray.length;i++) {
              $("#img_"+i ).attr("src", "/timthumb.php?src=/images/photos/"+photoArray[i]+"&w=500h=333&a=c.jpg");
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