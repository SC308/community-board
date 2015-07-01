<?php
function trunc($phrase, $max_words) {
   $phrase_array = explode(' ',$phrase);
   if(count($phrase_array) > $max_words && $max_words > 0)
      $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
   return $phrase;
}

$storedetails = Store::getStoreDetails( Confide::user()->store_id );
//$id = $storedetails[0]->id;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title><?php echo $storedetails[0]->store_name?> Community Board Admin :: Photos</title>

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
                <div class="col-md-6"><h1>Community Photos</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, inventore, eos, magni mollitia culpa nesciunt facilis necessitatibus quasi atque unde neque tenetur tempore eligendi distinctio quaerat doloribus rem. Voluptas, nemo.</p>
                </div>
                <div class="col-md-4 col-md-offset-2 pull-right">
                    <a href="/admin/photos/upload"><button type="button" onclick="window.location = '/admin/photos/upload';" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-cloud-upload"></span> Upload Photos</button></a>
                    
                </div>
            </div>
          
            
        </div>
        
        <table class="table table-striped">
            <tr>
                <th>Photo</th>
                <th>Title</th>
                <th>Description</th>
                <!-- <th>Published</th> -->
                <th></th>
            </tr>
           @foreach($photos as $p)
            <tr>

                <td>
                    <img class="img-thumbnail" src="/timthumb.php?src=/images/photos/{{ $p->path }}" />
                    @if($p->publish == 1)
                        &nbsp;<span class="label label-success"><span class="glyphicon glyphicon-ok"></span></span>
                    @else
                        &nbsp;<span class="label label-default"><span class="glyphicon glyphicon-remove"></span></span>
                    @endif 

                </td>
                <td>
                    {{$p->title}}
                </td>
                <td>
                    
                    {{ trunc($p->description, 10) }}
                    
                </td>
            <!--
                <td>
                    
                    @if($p->publish == 1)
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="toggle_{{$p->id}}" checked>
                        <label class="onoffswitch-label" for="toggle_{{$p->id}}">
                            <div class="onoffswitch-inner"></div>
                            <div class="onoffswitch-switch"></div>
                        </label>
                    </div>
                    @else
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="toggle_{{$p->id}}">
                        <label class="onoffswitch-label" for="toggle_{{$p->id}}">
                            <div class="onoffswitch-inner"></div>
                            <div class="onoffswitch-switch"></div>
                        </label>
                    </div>
                    @endif    
                </td>
            -->
                <td>
                    <div class="btn-group">
                        <button class="btn btn-default" onclick="location.href='/admin/photos/edit/{{$p->id}}';"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button class="btn btn-danger" onclick="location.href='/admin/photos/delete/{{$p->id}}';"><span class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </td>
            </tr>
        @endforeach
        </table>
        
    
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
