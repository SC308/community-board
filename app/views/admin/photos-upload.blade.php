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

    <title><?php echo $storedetails[0]->store_name?> Community Board Admin :: Upload New Photo</title>

    <!-- Bootstrap core CSS -->
    <link href="/admin-assets/css/bootstrap.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
.onoffswitch {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #C4C4C4; border-radius: 30px;
}
.onoffswitch-inner {
    width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
    border-radius: 30px;
    box-shadow: 0px 15px 0px rgba(0,0,0,0.08) inset;
}
.onoffswitch-inner:before {
    content: "ON";
    padding-left: 10px;
    background-color: #2CC406; color: #FFFFFF;
    border-radius: 30px 0 0 30px;
}
.onoffswitch-inner:after {
    content: "OFF";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
    border-radius: 0 30px 30px 0;
}
.onoffswitch-switch {
    width: 30px; margin: 0px;
    background: #FFFFFF;
    border: 2px solid #C4C4C4; border-radius: 30px;
    position: absolute; top: 0; bottom: 0; right: 56px;
    -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
    -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
    background-image: -moz-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 80%); 
    background-image: -webkit-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 80%); 
    background-image: -o-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 80%); 
    background-image: linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 80%);
    box-shadow: 0 1px 1px white inset;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}

    </style>
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
            <a class="navbar-brand" href="/admin"><?php echo $storedetails[0]->store_name?>  Community Board</a>
          </div>
          <div class="collapse navbar-collapse">
            @include('admin/nav')
          </div><!--/.nav-collapse -->
        </div>
      </div>

      <!-- Begin page content -->
      <div class="container" style="padding-top: 60px;">
        <div class="page-header">
        
            
                <h1>Upload New Photo</h1>
            
            
        </div>
        <div class="row">
            
                <div class="col-md-6">
                    {{ Form::open(array('action' => 'AdminController@saveAddPhoto', 'files' => true, 'class' => 'form-horizontal', 'role' => 'form')) }}
                    


                        <div class="form-group">
                            <label for="photo">Photo</label>
                            {{ Form::file('photo') }}
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="">
                        </div>

                        <div class="form-group">    
                            <label for="photographer_name">Photographer</label>
                            <input type="text" class="form-control" id="photographer_name" name="photographer_name" value="">
                        </div>    
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control help-block" id="location" name="location" value="">
                        </div>    
                        <div class="form-group">    
                            <label for="description">Description <small>&mdash; 1 or 2 sentences<small></label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>    
                        <div class="form-group">  

                             
                            <div class="col-sm-1">  
                            
                            <div class="onoffswitch">
                                <input type="checkbox" name="publish" class="onoffswitch-checkbox" id="toggle_publish">
                                <label class="onoffswitch-label" for="toggle_publish">
                                    <div class="onoffswitch-inner"></div>
                                    <div class="onoffswitch-switch"></div>
                                </label>
                            </div>
  
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

@include('admin/debug')
    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/admin-assets/js/bootstrap.min.js"></script>
  </body>
</html>