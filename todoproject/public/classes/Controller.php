<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 30/09/2017
 * Time: 23:13
 */

abstract class Controller
{
    protected $request;
    protected $action;

    /**
     * Controller constructor.
     * @param $action
     * @param $request
     */
    public function __construct($action, $request)
    {
        $this->action = $action;
        $this->request = $request;
    }
    #methode van controller wordt uitgevoerd.
    public function executeAction(){
        return $this->{$this->action}();
    }
    /*
     * Returned view die bij model hoort.
     */
    protected function returnView($viewmodel, $fullview){
        $view = 'views/' . get_class($this) .'/' . $this->action . '.view.php';
        if($fullview){
            require('views/main.view.php');
        }else{
            require($view);
        }
    }
}