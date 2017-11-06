<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 30/09/2017
 * Time: 23:24
 */

class Home extends Controller{

    /**
     * Home controller returned view die bij homemodel hoort.
     */
    protected function Index(){
        $viewmodel = new HomeModel();
        $this->ReturnView($viewmodel->Index(),true);
    }
}