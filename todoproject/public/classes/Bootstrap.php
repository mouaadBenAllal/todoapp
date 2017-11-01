<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 30/09/2017
 * Time: 18:38
 */

class Bootstrap
{
    private $controller;
    private $action;
    private $request;

    /**
     * Bootstrap constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
        // controlleert of controller url leeg is, zo ja word controller 'home' aangeroepen.
        if($this->request['controller'] == ""){
            $this->controller = 'home';
        }else {
            // Wat in de request word meegegeven word toegekend aan controller.
            $this->controller = $this->request['controller'];
        }
        // controleert of methode in url staat, zo ja word methode aangeroepen.
        if($this->request['action'] == ""){
            $this->action = "index";
        }else{
            $this->action = $this->request['action'];
        }
    }

    public function createController(){
        // controlleer of class bestaat.
        if(class_exists($this->controller)){
            $parents = class_parents($this->controller);
            // controlleer of class is extended.
            if(in_array('Controller', $parents)){
                // controlleer of class methodes heeft, zoja word nieuwe controller returned.
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                }else{
                    echo "<h1>Method does not exist.</h1>";
                    return;
                }
            }else{
                echo "<h1>Base controller not found.</h1>";
                return;
            }
        }
        else{
            echo "<h1>Controller class doesnt exist..</h1>";
            return;
        }
    }
}