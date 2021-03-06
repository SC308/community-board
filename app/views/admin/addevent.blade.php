<?php
function trunc($phrase, $max_words) {
   $phrase_array = explode(' ',$phrase);
   if(count($phrase_array) > $max_words && $max_words > 0)
      $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
   return $phrase;
}
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

    <title><?php echo $storedetails[0]->store_name?> Community Board Admin :: Add Event</title>

    <!-- Bootstrap core CSS -->
    <link href="/admin-assets/css/bootstrap.css" rel="stylesheet">
    <link href="/admin-assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin-assets/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/admin-assets/css/jquery.tagit.css">

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
            <a class="navbar-brand" href="/admin"><?php echo $storedetails[0]->store_name?> Community Board</a>
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
                <div class="col-md-6"><h1>New Event</h1></div>
                <div class="col-md-4 col-md-offset-2 pull-right">
                    <!-- <a href="/admin/photos/upload"><button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-cloud-upload"></span> Upload Photos</button></a> -->
                    
                </div>
            </div>
          
            
        </div>
        
        <div class="row">
                

                <div class="col-md-6">
                    {{ Form::open(array('action' => 'AdminController@saveAddEvent', 'class' => 'form-horizontal', 'role' => 'form')) }}
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="start">Start Date/Time</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="start" id="start" value="" data-format="YYYY-MM-DD HH:mm:ss" />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <label for="end">End Date/Time</label>
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" name="end" id="end" value="" data-format="YYYY-MM-DD HH:mm:ss" />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                            </div>                            
                        </div>
                                                
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="">
                        </div>  
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control help-block" id="location" name="location" value="">
                        </div>    



                        <div class="form-group">    
                            <label for="description">Description <small>&mdash; 1 or 2 sentences</small></label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>  

                        <div class="form-group">
                          <label for="tags">Tags <small>&mdash; tags describing this event </small></label>
                          <input type="text" class="form-control" id="tags" name="tags"> 
                        </div>  
                        <div class="form-group">  

                            <div class="col-sm-4 pull-left checkbox">
                             
                              <label for="hilite">
                             
                             
                        
                                <input type="checkbox" name="hilite" class="" id="hilite"> Highlight Event
                             
                              </label>

                            </div>
                          
                            
                            <div class="col-sm-5 pull-right">
                                <button class="btn btn-danger" onClick="history.go(-1); return false;"><span class="glyphicon glyphicon glyphicon glyphicon-remove"></span> Cancel</button>
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon glyphicon-ok"></span> Save</button>

                            </div>

                        </div>
                        <div class="form-group"> 
                            
                        </div>
                    
                    {{ Form::close() }}
                </div>  
        
        
        </div>


      </div>
    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/admin-assets/js/bootstrap.min.js"></script>
    <script src="/admin-assets/js/moment.min.js"></script>
    <script src="/admin-assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="/admin-assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function () { $('#datetimepicker1').datetimepicker(); });
        $(function () { $('#datetimepicker2').datetimepicker(); });
    </script>
    <script type="text/javascript" src="/admin-assets/js/tag-it.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
          $("#tags").tagit();
       });

    </script>
  </body>
</html>
