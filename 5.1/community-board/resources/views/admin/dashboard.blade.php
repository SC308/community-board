<?php
	$storedetails = Store::getStoreDetails( Confide::user()->store_id );
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title><?php echo $storedetails[0]->store_name?> Community Board Admin</title>

	<style>

		.tile-link{ color: #fff; }
		a.tile-link:hover{ color: #fff; }
		.tile{ display: block; float: left; height: 200px; width: 200px; border: thin solid #666; background-color: #ccc; margin: 10px;}
		a.tile-link:hover div.tile{ background-color: #333;}
		.clear{ clear: both; }
	</style>

    <!-- Bootstrap core CSS -->
    <link href="/admin-assets/css/bootstrap.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin"><?php echo $storedetails[0]->store_name?> Community Board</a>
          </div>
          <div class="collapse navbar-collapse">
            @include('admin/nav')
      	  </div><!--/.nav-collapse -->
        </div>
      </div>

      <!-- Begin page content -->
      <div class="container" style="padding-top: 60px;">
        <div class="page-header">
           
        </div>
		
		<div class="tiles">
		  <a href="/admin/photos" class="tile-link"><div class="tile"><h2>Photos <span class="glyphicon glyphicon-picture"></span></h2></div>         </a>
		  <a href="/admin/staff" class="tile-link"><div class="tile"><h2>Staff <span class="glyphicon glyphicon-user"></span></h2></div>          </a>
		  <a href="/admin/calendar" class="tile-link"><div class="tile"><h2>Calendar</h2></div>       </a>
		  <a href="/admin/feature" class="tile-link"><div class="tile"><h2>Feature Content</h2></div></a>
		  <a href="/admin/jumpstart" class="tile-link"><div class="tile"><h2>Jumpstart</h2></div>      </a>
		  <a href="/admin/flyer" class="tile-link"><div class="tile"><h2>Flyer</h2></div>          </a>
      <a href="/admin/kiosk/{{Auth::user()->store_id}}" class="tile-link"><div class="tile"><h2>Activity Kiosk</h2></div>          </a>
		  

		</div>        
		
		<br class="clearfix clear" />
		
		<?php if( Confide::user()->store_id == 99999 ){ ?>
		<h2>Super Admin Functions</h2>
		<a href="/users/create">Create New User</a>
		
		<?php } ?>
		
		
       
		@include('admin/debug')
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/admin-assets/js/bootstrap.min.js"></script>
  </body>
</html>
