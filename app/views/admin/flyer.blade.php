<?php $storedetails = Store::getStoreDetails( Confide::user()->store_id ); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title><?php echo $storedetails[0]->store_name?> Community Board Admin :: Flyers and Top Picks</title>

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
                <div class="col-md-6"><h1>Flyer</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, inventore, eos, magni mollitia culpa nesciunt facilis necessitatibus quasi atque unde neque tenetur tempore eligendi distinctio quaerat doloribus rem. Voluptas, nemo.</p>
                </div>
                <div class="col-md-4 col-md-offset-2 pull-right">
                    <a href="/admin/flyer/upload"><button type="button" onclick="window.location = '/admin/flyer/upload';" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-cloud-upload"></span> Upload Flyer Page</button></a>
                    
                </div>
            </div>
            <h3></h3>
            <table class="table table-striped">
              <tr>
                <th>Current Flyer</th>
                <th>Actions</th>
              </tr>
              @foreach($flyer as $f)
              <tr>
                <td> <h4>{{$f->order}}&nbsp;&nbsp;<img class="img-thumbnail" src="/timthumb.php?src=/images/flyer/{{ $f->path }}&w=250&h=250&a=t" /></h4></td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-default" onclick="location.href='/admin/flyer/edit/{{$f->id}}';"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button class="btn btn-danger" onclick="location.href='/admin/flyer/delete/{{$f->id}}';"><span class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </td>
              </tr>
              @endforeach
            </table>

            
        </div>

        <div class="page-header">
        
            <div class="row">
                <div class="col-md-6"><h1>Top Picks</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, inventore, eos, magni mollitia culpa nesciunt facilis necessitatibus quasi atque unde neque tenetur tempore eligendi distinctio quaerat doloribus rem. Voluptas, nemo.</p>
                </div>
                <div class="col-md-4 col-md-offset-2 pull-right">
                    <a href="/admin/flyer/pickupload"><button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-cloud-upload"></span> Upload Top Pick</button></a>
                    
                </div>
            </div>
            <h3></h3>
            <table class="table table-striped">
              <tr>
                <th>Current Top Picks</th>
                <th>Actions</th>
              </tr>
              @foreach($picks as $p)
              <tr>
                <td><img class="img-thumbnail" src="/timthumb.php?src=/images/flyer/toppick/{{ $p->path }}&w=250" /></td>
                <td>
                    <div class="btn-group">
                        
                        <button class="btn btn-danger" onclick="location.href='/admin/flyer/deletepick/{{$p->id}}';"><span class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </td>                
              </tr>
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
