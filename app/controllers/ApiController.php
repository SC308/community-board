<?php
class ApiController extends BaseController{

    public function getIndex(){
        return View::make('apihome');
    }
    
}