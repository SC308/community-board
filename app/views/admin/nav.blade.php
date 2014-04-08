


            <ul class="nav navbar-nav">

              
            
            <li class="{{ Request::is('admin/photos*') ? 'active' : '' }}"><a href="/admin/photos">Photos</a></li>
            <li class="{{ Request::is('admin/flyer*') ? 'active' : '' }}"><a href="/admin/flyer">Flyer</a>
            <li class="{{ Request::is('admin/staff*') ? 'active' : '' }}"><a href="/admin/staff">Staff</a></li>
            <li class="{{ Request::is('admin/calendar*') ? 'active' : '' }}"><a href="/admin/calendar">Calendar</a></li>
            <li class="{{ Request::is('admin/feature*') ? 'active' : '' }}"><a href="/admin/feature">Feature</a></li>  


              

            </ul>