
      
      <div id= "{{$d->id}}" class="partial-event" data-sport ="{{$d->sport_id}}">
        
        <div class="partial-heading">
          <span class="partial-title">
          {{$d->title}}
          </span>
          
          <span class="submenu-options" data-model="{{$title}}">
            <a href="" id = "delete" class="submenu-item" data-rowId = "{{$d->id}}"> Delete </a>
            <a href="" id = "edit" class="submenu-item" data-rowId = "{{$d->id}}"> Edit </a>
            <a href="" id = "view" class="submenu-item" data-rowId = "{{$d->id}}"> View </a>
            
          </span>

          
        </div>
      	
        <div class="partial-content">
          {{$d->description}}
        </div>
        <!-- <div class="event-start">
        	Event Starts at : {{$d->event_start}}
        </div>
        <div class="event-end">
        	Event Ends at : {{$d->event_end}}
        </div> -->
      </div>
