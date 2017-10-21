<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 30/09/2017
 * Time: 23:39
 */

class Users extends Controller
{
    protected function register(){
        if(isset($_SESSION['isLoggedIn']) && $_SESSION['user_info']['role'] != 3){
            header('Location: '. ROOT_URL . 'todos');
        }
        $viewmodel = new UserModel();
        $this->ReturnView($viewmodel->register(),true);
    }

    protected function login(){
        $viewmodel = new UserModel();
        $this->ReturnView($viewmodel->login(),true);
    }

    protected function logout(){
        unset($_SESSION['isLoggedIn']);
        unset($_SESSION['user_info']);
        session_destroy();
        header('Location: ' . ROOT_URL . 'users/login');
    }
}