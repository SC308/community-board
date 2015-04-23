    <div id= "{{$data->event_id}}" class="complete-event">
        
        <div class="complete-heading">
          <label for="event_title">Event Name: </label>
          <span class="complete-title" name = "event_title">
           {{$data->title}}
          </span>
          
          <span class="submenu-options" data-model="{{$model}}" >
            <!-- <a href="" id = "delete" class="submenu-item" data-rowId = "{{$data->sport_id}}"> Delete </a>
            <a href="" id = "edit" class="submenu-item" data-rowId = "{{$data->sport_id}}"> Edit </a> -->
            
          </span>

          
        </div>
        
        <div class="complete-content">
          <label for="event_description">Description: </label>
          <span name = "event_description">
          {{$data->description}}
          </span>
          <br>
          <label for="active_from">Active From: </label>
          <span name = "active_from">
          {{$data->event_start}}
          </span>
          <br>
          <label for="active_to">Active To: </label>
          <span name = "active_to">
          {{$data->event_end}}
          </span>
          <br>


          
          <label for= "store_id">For Store :</label>
          <span  name = "store_id">
            {{$store}}
          </span>

          <br>

          <label for= "sport_id">For Sport :</label>
          <span  name = "sport_id">
            {{$sport}}
          </span>

          
                  
        </div>

       

      </div>