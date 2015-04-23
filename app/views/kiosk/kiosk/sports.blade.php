<html>
	<head>
		<title> {{ $title }} </title>
        {{ HTML::style('/css/vendor/bootstrap.min.css') }}
        {{ HTML::style('/css/vendor/bootstrap-theme.css') }}
        {{ HTMl::style('/css/main.css')}}

	</head>

    <body >
        <div class="container">
        @foreach($sports as $sport)
        <div class="row">
          <div class="col-lg-12">
              {{$sport}}
          </div>
        </div>
        @endforeach
        
        </div>
           
        <script type="text/javascript" src="/js/vendor/jquery-1.11.1.min.js"></script>
    	  <script type="text/javascript" src="/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        
    </body>
</html>