
<!DOCTYPE html>
<html>
    <head>
        <title>
            {{ $title }}
        </title>
        {{ HTML::style('/css/vendor/bootstrap.min.css') }}
        {{ HTML::style('/css/vendor/bootstrap-theme.css') }}
        {{ HTMl::style('/css/main.css')}}

    </head>


    <body >


        <div id="nav">
            <div class = "navbar navbar-inverse">
                <a class= "navbar-brand"> Activity Kiosk </a>
            </div>
        </div>
        
        <div class = "form-container ">
    	
        
        {{ Form::open(['action' => 'sessions.store'], [ 'class'=> 'form-horizontal ']) }}
        <h1 >Login</h1>
        	<div class="form-group">
        		{{ Form::label('Username', 'Username :') }}
        		{{ Form::input('text', 'Username', null, ['class' => 'form-control']) }}
        	</div>

        	<div class="form-group">
        		{{ Form::label('Password', 'Password :') }}
        		{{ Form::input('password', 'Password', null, ['class' => 'form-control']) }}
        	</div>
            <br>
        	
        	{{ Form::submit(null, ['class' => 'btn btn-primary']) }}
        	


        {{ Form::close() }}
        </div>
           
        </div>
        
        <!-- Javascript files required for pagge -->
        <script type="text/javascript" src="/js/vendor/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>  
    </body>


</html>