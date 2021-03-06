<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title> {{ $title }} </title>
        {{ HTML::style('/admin-assets/css/bootstrap.css') }}
        {{ HTML::style('/css/kiosk/vendor/bootstrap-theme.css') }}
        {{ HTMl::style('/css/kiosk/main.css')}}

  </head>

    <body id="admin-body">
        
         <div id="nav">
            <div class = "navbar navbar-inverse">
              <div class="navbar-inner">
                <div class="menu-button pull-left">
                    <li> <img src="/images/kiosk/adminIcons/menu.png"/ style="width: 20px;"> </li>
                 </div>
                <a class= "navbar-brand"> Activity Kiosk </a>
                <div class="nav pull-right">
                    <li>  <a href="/admin" class=" cd pro">Back</a> </li>
                 </div>
              </div>
                

            </div>
        </div>

        <div class="admin-page-container">
          <!-- Menu container begins -->
          <div class="menu-container ">
              <div id="short-menu" class="menu visible">                
                @include('kiosk.admin.dashboard.short-menu', $items)
              </div><!-- Short-menu ends-->
              <div id="expanded-menu" class="menu hidden">
                @include('kiosk.admin.dashboard.expanded-menu')
              </div><!-- Expanded-menu ends-->

          </div>
          <!--Menu container ends -->
          
          <div id="panel-container" >    
             <div class="panel panel-default tab-pane active" id="panel-{{$panel}}">



                  <div class="panel-heading">
                    <div class="panel-title">
                      {{$panel}}
                    </div>
                    <span class="submenu-options">
                     <a href="/admin/kiosk/{{Auth::user()->store_id}}/{{$panel}}">Back</a>
                    </span>
                  </div><!-- Panel Title Ends-->

                   <div  class=" panel-body">
                      <?php $template = "kiosk.admin.dashboard.completes.{$panel}"; ?>

                      
                        @include($template, array("data"=>$panel_data, "model" => $panel))
                      
                      
                   </div>
                    
              </div>


          </div><!-- panel-container ends-->

        </div><!-- admin-page container ends-->

           
        <script type="text/javascript" src="/js/kiosk/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/main.js"></script>
        
    </body>
</html>