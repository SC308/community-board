

<div class="panel panel-default tab-pane active" id="panel-{{$title}}">



  <div class="panel-heading">
    <div class="panel-title">
      {{$title}}
    </div>
  
    <div class="filter">
        {{Form::select('filterBySport', $filterBySport, null, ['class' => 'form-control', 'id' => 'filterBySport', 'data-model' => $title ] )}}
    </div>
    @if(isset($filterByStore))
    <div class="filter">
        {{Form::select('filterByStore', $filterByStore, null, ['class' => 'form-control', 'id' => 'filterByStore', 'data-model' => $title ] )}}
    </div>
    @endif
    <div class="sort">
        {{Form::select('sortBy', $sortBy, null, ['class' => 'form-control', 'id' => 'sortBy', 'data-model' => $title ] )}}
    </div>
    
    <div class="submenu-options" data-model="{{$title}}">
      <a href="" id = "add" type="button" class="submenu-item btn btn-default"> ADD  </a>
    </div>
  </div><!-- Panel Title Ends-->

   <div  class=" panel-body">
      <?php $template = "kiosk.admin.dashboard.partials.{$title}"; ?>

      @foreach($data as $d)
      	@include($template)
      
      @endforeach
   </div>
    
</div>


