<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 08/10/2017
 * Time: 14:13
 */

class Todos extends Controller {
    /**
     * todos controller returned view die bij todomodel hoort.
     */
    protected function all()
    {
        $viewmodel = new TodoModel();
        $this->returnView($viewmodel->all(),true);
    }

    /*
     * todos controller returned view die bij todomodel hoort.
     * Methode om todo toe tevoegen.
     */
    protected function add(){
        // als er geen gebruiker is ingelogd, check session.. daarna maak session message
        if(!isset($_SESSION['isLoggedIn'])){
            $_SESSION['message'] = "<div class=\"alert alert-dismissible alert-danger\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\"></button>
                    <strong>U moet ingelogd zijn om deze pagina te bezoeken! </strong>";
            header('Location: '. ROOT_PATH . 'todos/all');
        }
        $viewmodel = new TodoModel();
        $this->returnView($viewmodel->add(),true);
    }
    /*
     * todos controller returned view die bij todomodel hoort.
     * Methode om todo te updaten.
     */
    protected function update(){
        // als er geen gebruiker is ingelogd, check session.. daarna maak session message
        if(!isset($_SESSION['isLoggedIn'])){
            $_SESSION['message'] = "<div class=\"alert alert-dismissible alert-danger\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\"></button>
                    <strong>U moet ingelogd zijn om deze pagina te bezoeken! </strong>";
            header('Location: '. ROOT_PATH . 'todos/all');
        }
        $viewmodel = new TodoModel();
        $this->returnView($viewmodel->update(),true);
    }
}