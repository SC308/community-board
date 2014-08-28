<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Community Board :: Sign In</title>

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
        <a class="navbar-brand" href="/admin">Community Board</a>
      </div>
      <div class="collapse navbar-collapse">
       
      </div><!--/.nav-collapse -->
    </div>
  </div>

<div class="container" style="padding-top: 30px;">
	
	<div class="page-header">
        <div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading"><h3 class="panel-title"><strong>Sign In </strong></h3></div>
					<div class="panel-body">
						<form method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8" role="form">
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

						<div class="form-group">
							<label for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
							<input type="email" class="form-control" tabindex="1" id="email" placeholder="Enter email" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
						</div>

						<div class="form-group">
							<label for="password">{{{ Lang::get('confide::confide.password') }}}
							<small><a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a></small>
				      			</label>
							<input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
						</div>

						@if (Session::get('error'))
							<div class="alert alert-danger">{{{ Session::get('error') }}}</div>
						@endif

						@if (Session::get('notice'))
							<div class="alert alert-warning">{{{ Session::get('notice') }}}</div>
						@endif

						<button tabindex="3" type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.login.submit') }}}</button>
						</form>

				  </div>
				</div>
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