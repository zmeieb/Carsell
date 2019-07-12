<?php
require_once '../Libraries/View.php';
require_once '../MVC/Models/UserRepository.php';
require_once '../Libraries/Authentication.php';


class DefaultController
{
    
    /**
     * "index" im Default ist einfach die View, welche erscheint welche erscheint, wenn im url nichts nach dem / eingibt.
     */
    public function index()
    {
        
        $view = new View('index');
        $view->title = '';
        $view->heading = '';
        $view->display();
    }
    
    public function info(){
        phpinfo();
    }
}
