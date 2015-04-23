@foreach($items as $item)
  <div class="menu-item" id="{{$item}}">
                  
  @include('kiosk.admin.dashboard.menu-item-short-menu', array("item"=>$item))
  {{-- 
  @if($item != "store")
  @include('kiosk.admin.dashboard.submenu') 
  @endif --}}
</div>
@endforeach

