<!DOCTYPE html>
<html>
    <head>
        <title>
           
        </title>
        {{ HTML::style('css/kiosk/vendor/bootstrap.min.css') }}
        {{ HTML::style('css/kiosk/vendor/bootstrap-theme.css') }}
        {{ HTMl::style('css/kiosk/main.css')}}
        {{ HTML::style('css/kiosk/vendor/dropzone/basic.css')}}
        {{ HTML::style('css/kiosk/vendor/bootstrap-datetimepicker.min.css')}}

    </head>


    <body >
        
        <!-- top bar div -->
        <div id="nav">
            <div class = "navbar navbar-inverse">
                <a class= "navbar-brand"> Activity Kiosk </a>
            </div>
        </div>
        <!-- end Top bar div-->

        <div class="addForm" id="addSport">
            <?php $detail_options[""] = "Select" ?>
            @foreach($details as $key =>$value)
                <?php $detail_options[$key] = $value ?>
            @endforeach
           @foreach($months as $key => $month)
                <?php $month_options[$key] = $month ?>
            @endforeach
        
            
            <h2> Edit Sport </h2>
            
            {{ Form::model($sport, ['route' => ['sport.update', Auth::user()->store_id, $sport->id], 'method' => 'PATCH',  'files'=>true])  }}
                <div class="form-group">
                    
                    {{ Form::label('SportName', 'Sport Name :') }}
                    {{ Form::input('text', 'SportName', $sport->name, ['class' => 'form-control']) }}

                </div>

                
                
                {{ Form::label( 'Active Months :')}}
                <div class="form-group" >
                    {{ Form::label('SeasonStart', ' From :') }}
                    {{ Form::select('SeasonStart',$month_options, $season_start, ['class' => 'selectpicker']) }}
                    
                    
                     
                </div>
                <div class="form-group ">
                    {{ Form::label('SeasonEnd', ' To :') }}
                    {{ Form::select('SeasonEnd',$month_options, $season_end, ['class' => 'selectpicker']) }}
                    
                </div>
                <div class="form-group ">
                    
                    {{ Form::label('Details[]', 'Choose all applicable detail options: ') }}
                    {{ Form::select('Details[]',$detail_options, $selected_details ,['class' => 'selectpicker', "multiple"=>"multiple"]) }}
                    


                </div>
                


                <div class="form-group dropzone">
                    {{ Form::label('Image', 'Icon :') }}
                    {{ Form::file('Image') }}
                </div>
                <br>

                
                {{ Form::submit(null, ['class' => 'btn btn-primary']) }}
                


            {{ Form::close() }}
            





        </div> <!-- add Form for blog ends-->
        
        
        <!-- Javascript files required for page -->
        <script type="text/javascript" src="/js/vendor/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        <script type="text/javascript" src="/js/vendor/dropzone.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap-select.js"></script>
        <script type="text/javascript">
         $(".selectpicker").selectpicker();
         $(".check-mark").hide();
        </script>

    </body>


</html>