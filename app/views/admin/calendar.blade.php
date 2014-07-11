<?php
function trunc($phrase, $max_words) {
   $phrase_array = explode(' ',$phrase);
   if(count($phrase_array) > $max_words && $max_words > 0)
      $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
   return $phrase;
}
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

    <title>5111 Community Board Admin</title>

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

  <body>

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
            <a class="navbar-brand" href="/admin">5111 Community Board</a>
          </div>
          <div class="collapse navbar-collapse">
            @include('admin/nav')
          </div><!--/.nav-collapse -->
        </div>
      </div>

      <!-- Begin page content -->
      <div class="container" style="padding-top: 30px;">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6"><h1>Events Calendar</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, inventore, eos, magni mollitia culpa nesciunt facilis necessitatibus quasi atque unde neque tenetur tempore eligendi distinctio quaerat doloribus rem. Voluptas, nemo.</p>
                </div>
                <div class="col-md-4 col-md-offset-2 pull-right">
                    <a href="/admin/calendar/add"><button type="button" onclick="window.location = '/admin/calendar/add';" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-calendar"></span> Add New Event</button></a>
                
                </div>
            </div>
        </div>
        <table class="table table-hover">
        <?php 
            $i = 0;
        ?>
          @foreach($calendar as $c)
            <? 
            //this is the first record, so initiate the current month
            if($i == 0){
                $currentmonth = $c->startmonth;
                $monthName = date("F", mktime(0, 0, 0, $c->startmonth, 10));
            ?><!-- write out the header for the current month -->
            <tr class="success">
                <th colspan="2"> <h4>{{ $monthName }} {{ $c->startyear}}</h4></td>
                <th><h5>Location</h5></th>
                <th><h5>Start</h5></th>
                <th colspan="2"><h5>Description</h5></th>
            </tr>   
            <? 
            }  

            if($currentmonth == $c->startmonth){ 
            ?>
                <tr>
                    <td>{{ $c->startday }}</td>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->location }}</td>
                    <td>{{ $c->starthour}}:{{$c->startmin}}</td>
                    <td>{{ trunc($c->description, 8) }}</td>
                    <td>
                        <div class="btn-group btn-group-xs">
                            <button class="btn btn-default" onclick="location.href='/admin/calendar/edit/{{$c->id}}';"><span class="glyphicon glyphicon-pencil"></span></button>
                            <button class="btn btn-danger" onclick="location.href='/admin/calendar/delete/{{$c->id}}';"><span class="glyphicon glyphicon-trash"></span></button>
                        </div>
                    </td>                    
                </tr>

            <?
            } else {
                //start a new month heading, change what the current month is
                $currentmonth = $c->startmonth;
                $monthName = date("F", mktime(0, 0, 0, $c->startmonth, 10));
            ?>
                <tr class="success">
                <th colspan="2"> <h4>{{ $monthName }} {{ $c->startyear}}</h4></td>
                <th><h5>Location</h5></th>
                <th><h5>Start</h5></th>
                <th colspan="2"><h5>Description</h5></th>
                </tr>  
                <tr>
                    <td>{{ $c->startday }}</td>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->location }}</td>
                    <td>{{ $c->starthour}}:{{$c->startmin}}</td>                            
                    <td>{{ trunc($c->description, 8) }}</td>
                    <td>
                        <div class="btn-group btn-group-xs">
                            <button class="btn btn-default" onclick="location.href='/admin/calendar/edit/{{$c->id}}';"><span class="glyphicon glyphicon-pencil"></span></button>
                            <button class="btn btn-danger" onclick="location.href='/admin/calendar/delete/{{$c->id}}';"><span class="glyphicon glyphicon-trash"></span></button>
                        </div>
                    </td>                    
                </tr>                
            <?
            }    
            $i++; 
            ?>
            
        
          @endforeach
        </table>
    
      </div>
    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/admin-assets/js/bootstrap.min.js"></script>
  </body>
</html>
