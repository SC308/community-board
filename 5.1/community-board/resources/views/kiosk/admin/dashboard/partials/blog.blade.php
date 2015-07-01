
      
      <div id= "{{$d->id}}" class="partial-blog">
        
        <div class="partial-heading">
          <span class="partial-title">
          {{$d->title}}
          </span>
          
          <span class="submenu-options" data-model="{{$title}}">
            <a href="" id = "delete" class="submenu-item" data-rowId = "{{$d->id}}"> Delete </a>
            <a href="" id = "edit" class="submenu-item" data-rowId = "{{$d->id}}"> Edit </a>
            <a href="" id = "view" class="submenu-item" data-rowId = "{{$d->id}}"> View </a>
            
          </span>

          <span class="partial-publish-date">
            {{$d->date}}
          </span>
        </div>
      	
        <div class="partial-content">
        
        </div>
        

      </div>
