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

    <title>WEM Community Board Admin</title>

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
            <a class="navbar-brand" href="/admin">WEM Community Board</a>
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
                <div class="col-md-6"><h1>Add Flyer Page</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, repellat, quia, hic ipsum cumque minus laborum veritatis facilis itaque ducimus sunt minima aliquid molestias error libero odit consectetur earum sed.</p></div>
                <div class="col-md-4 col-md-offset-2 pull-right">
                    <!-- <a href="/admin/photos/upload"><button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-cloud-upload"></span> Upload Photos</button></a> -->
                    
                </div>
            </div>
          
            
        </div>
        
        <div class="row">
              
                <div class="col-md-6">
                    {{ Form::open(array('action' => 'AdminController@saveAddFlyer', 'files' => true, 'class' => 'form-horizontal', 'role' => 'form')) }}
                        <div class="form-group">
                            <label for="flyer">Flyer Page</label>
                            {{ Form::file('flyer') }}
                        </div>

                        <div class="form-group">
                            <label for="order">Page Order</label>
                            <input type="text" class="form-control" id="order" name="order" value="">
                        </div>

                    
                             
                            <div class="col-sm-7 pull-right">
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
  </body>
</html>
