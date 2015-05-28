<html>
	<head>
		<title> {{ $title }} </title>
        {{ HTML::style('/css/kiosk/vendor/bootstrap.min.css') }}
        {{ HTML::style('/css/kiosk/vendor/bootstrap-theme.css') }}
        {{ HTMl::style('/css/kiosk/main.css')}}

	</head>

    <body id="admin-body">
        
         <div id="nav">
            <div class = "navbar navbar-inverse">
              <div class="navbar-inner">
                <div class="menu-button pull-left">
                    <li> <img src="/images/kiosk/adminIcons/menu.svg"/ style="width: 20px;"> </li>
                 </div>
                <a class= "navbar-brand"> Activity Kiosk </a>
                <div class="nav pull-right">
                    <li>  <a href="/admin" class=" cd pro">Back</a> </li>
                 </div>
                <!-- <div class="nav username pull-right">
                  <li>
                    <p> UserName </p>
                  </li>
                </div> 
                <div class="nav user-icon pull-right">
                  <li>
                    <img src="images/kiosk/adminIcons/user.svg" style="width:25px;"/>

                  </li>
                </div>
                <div class="nav alerts-button pull-right">
                    <li>
                    <img src="images/kiosk/adminIcons/alert.svg" style="width:20px;"/>

                  </li>
                </div>
                <div class="nav notifications-button pull-right">
                    <li>
                    <img src="images/kiosk/adminIcons/notification.svg" style="height:15px;"/>

                  </li>
                </div>
                 -->

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
             @if($user_type == 1)
              @include('kiosk.admin.dashboard.panel', array( 'title' => $panel, 'data' => $panel_data , 'filterBySport' => $sports, 'filterByStore' => $stores, 'sortBy' => $sort))
             @else
              @include('kiosk.admin.dashboard.panel', array( 'title' => $panel, 'data' => $panel_data , 'filterBySport' => $sports, 'sortBy' => $sort))
             @endif
          </div><!-- panel-container ends-->

        </div><!-- admin-page container ends-->

           
        <script type="text/javascript" src="/js/kiosk/vendor/jquery-1.11.1.min.js"></script>
    	  <script type="text/javascript" src="/js/kiosk/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap-select.js"></script>
        <script type="text/javascript" src="/js/kiosk/main.js"></script>
        <script type="text/javascript">
          $(".selectpicker").selectpicker()

        </script>
        
    </body>
</html>