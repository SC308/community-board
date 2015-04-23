

<div class="panel panel-default tab-pane active" id="panel-{{$title}}">



  <div class="panel-heading">
    <div class="panel-title">
      {{$title}}
    </div>
    <div class="submenu-options" data-model="{{$title}}">
    	<a href="" id = "add" class="submenu-item"> ADD </a>

    </div>
  </div><!-- Panel Title Ends-->

   <div  class=" panel-body">
      <?php $template = "kiosk.admin.dashboard.partials.{$title}"; ?>

      @foreach($data as $d)
      	@include($template)
      
      @endforeach
   </div>
    
</div>


