<div id= "{{$d->id}}" class="partial-gear col-md-3" data-sport ="{{$d->sport_id}}">
        
        <div class="partial-heading">
          <span class="partial-title">
          {{$d->name}}
          </span>
          
          <span class="submenu-options" data-model="{{$title}}">
            <a href="" id = "delete" class="submenu-item" data-rowId = "{{$d->id}}"> Delete </a>
            <a href="" id = "edit" class="submenu-item" data-rowId = "{{$d->id}}"> Edit </a>
            <a href="" id = "view" class="submenu-item" data-rowId = "{{$d->id}}"> View </a>
            
          </span>

          
        </div>
        @if($d->image != "")
        <?php $image_files = preg_split('/;/', $d->image, -1,  PREG_SPLIT_NO_EMPTY); ?>

        @foreach( $image_files as $image_file) 
        
      	<div class="partial-images">
          <img src="/images/kiosk/content/{{$image_file}}" >
        </div>

        @endforeach
        @endif
        <div class="partial-content">
          {{ $d->description }}
        </div>
        
      </div>
