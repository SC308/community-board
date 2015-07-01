<!DOCTYPE html>
<html>
    <head>
        <title>
           
        </title>
        {{ HTML::style('/css/kiosk/vendor/bootstrap.min.css') }}
        {{ HTML::style('/css/kiosk/vendor/bootstrap-theme.css') }}
        {{ HTMl::style('/css/kiosk/main.css')}}
        {{ HTML::style('css/kiosk/vendor/dropzone/basic.css')}}
        {{ HTML::style('css/kiosk/vendor/bootstrap-datetimepicker.min.css')}}
        {{ HTML::style('css/kiosk/vendor/bootstrap-select.css')}}

    </head>


    <body >
        
        <!-- top bar div -->
        <div id="nav">
            <div class = "navbar navbar-inverse">
                <a class= "navbar-brand"> Activity Kiosk </a>
            </div>
        </div>
        <!-- end Top bar div-->

        <div class="addForm" id="addLeague">
            <?php $sport_options[""] = "Select a Sport" ?>
            @foreach($sports as $key => $value)
                <?php $sport_options[$key] = $value; ?>
            @endforeach

            
           
            
            <h2> Add A new League </h2>
            
            {{ Form::open(['action' => 'league.store', 'files'=>true], [ 'class'=> 'form-horizontal dropzone']) }}

                 @if($errors->has())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif

                 <div class="form-group">
                    
                    {{ Form::label('sport_id', ' Choose a Sport :') }}
                    {{ Form::select('sport_id',$sport_options, false,['class' => 'selectpicker' , 'id' =>'sportSelector']) }}


                </div>

                <div class="row">

                    <div class="form-group col-sm-3">
                        
                        {{ Form::label('name', 'League Name :') }}
                        {{ Form::input('text', 'name', null, ['class' => 'form-control col-md-3']) }}

                    </div>
                </div>
                <div class="row">    

                    <div class="form-group col-sm-3">
                        
                        {{ Form::label('city', 'City :') }}
                        {{ Form::input('text', 'city', $city , ['class' => 'form-control', 'readonly'=>'readonly']) }}

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        
                        {{ Form::label('location', 'Location/Area :') }}
                        {{ Form::input('text', 'location', null, ['class' => 'form-control']) }}

                    </div>
                </div>    
                <div class="row">

                    <div class="form-group col-sm-3">
                        
                        {{ Form::label('age_group', 'Age Group :') }}
                        {{ Form::input('text', 'age_group', null, ['class' => 'form-control']) }}

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        
                        {{ Form::label('contact', 'Contact Information/Address :') }}
                        {{ Form::input('text', 'contact', null, ['class' => 'form-control']) }}

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        
                        {{ Form::label('description', 'Description :') }}
                        {{ Form::input('text', 'description', null, ['class' => 'form-control']) }}

                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-sm-3">
                        
                        {{ Form::label('url', 'Website :') }}
                        {{ Form::input('text', 'url', null, ['class' => 'form-control']) }}

                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-sm-3">
                        
                        {{ Form::label('phone', 'Phone :') }}
                        {{ Form::input('text', 'phone', null, ['class' => 'form-control phone', 'data-format' => '+1 ddd-ddd-dddd']) }}

                    </div>
                </div>

                <div class="row">
                    <div class="form-group dropzone col-sm-3">

                        {{ Form::label('image', 'Image :') }}
                        {{ Form::file('image') }}

                    </div>
               </div>    
                
                {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                


            {{ Form::close() }}
            





        </div> <!-- add Form for blog ends-->
        
        
        <!-- Javascript files required for page -->
        <script type="text/javascript" src="/js/kiosk/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/moment.js"></script>
        <script type="text/javascript" src="/js/kiosk/main.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/dropzone.js"></script>
        <script type="text/javascript" src="/js/kiosk/vendor/bootstrap-select.js"></script>
         <script type="text/javascript" src="/js/kiosk/vendor/jquery.inputmask.js"></script>
        <script type="text/javascript">
         $(".phone").inputmask("999-999-9999");
         $(".selectpicker").selectpicker();
         
        </script>

    </body>


</html>