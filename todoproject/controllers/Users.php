<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 30/09/2017
 * Time: 23:39
 */

class Users extends Controller{
    /**
     * users controller returned view die bij usermodel hoort.
     */
    protected function register(){
        if(!isset($_SESSION['isLoggedIn'])){
            $_SESSION['message'] = "<div class=\"alert alert-dismissible alert-danger\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\"></button>
                    <strong>U moet ingelogd zijn om deze pagina te bezoeken! </strong>";
            header('Location: '. ROOT_PATH . 'todos/all');
        }

        if(isset($_SESSION['isLoggedIn']) && $_SESSION['user_info']['role'] != 3){
            $_SESSION['message'] = "<div class=\"alert alert-dismissible alert-danger\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\"></button>
                    <strong>U moet Admin rechten hebben om deze pagina te bezoeken! </strong>";
            header('Location: '. ROOT_PATH . 'todos/all');
        }
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->register(),true);
    }

    /*
    * users controller returned view die bij usersmodel hoort.
    */
    protected function login(){
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->login(),true);
    }

    /*
     * unset alle sessions en destroyed ze.
     * users controller returned view die bij usersmodel hoort.
     */
    protected function logout(){
        unset($_SESSION['isLoggedIn']);
        unset($_SESSION['user_info']);
        session_destroy();
        header('Location: ' . ROOT_PATH . 'users/login');
    }
}