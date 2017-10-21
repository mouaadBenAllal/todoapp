<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 07/10/2017
 * Time: 23:37
 */

class UserModel extends Model{

    public function register(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        $hash_password = md5($post['password']);
        if($post['submit']){
            # Als er op de knop is geklikt, voert het de onderstaande select query uit,
            # om te kijken of de email al bestaat..
            $this->query('SELECT email FROM users WHERE email =:email');
            $this->bind(':email', $_POST['email']);
            $row = $this->single();
            if($row){
                Messages::setMessage('Deze email bestaat al!','error');
                return;
            }else{
                $this->query('INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)');
                $this->bind(':username',$_POST['username']);
                $this->bind(':email',$_POST['email']);
                $this->bind(':password',$hash_password);
                $this->bind(':role',$post['role']);
                $this->execute();
            }


            #als er laatste query gevonden is laat message zien.
            if($this->lastInsertId()){
                Messages::setMessage('Gebruiker succesvol geregistreerd!','success');
            }

        }
        $this->query('SELECT id,name FROM role');
        $row = $this->results();
        return $row;
    }

    public function login(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        $password = md5($post['password']);
        if($post['submit']){
            // Compare Login
            $this->query('SELECT * FROM users WHERE email = :email AND password=:password ');

            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $row = $this->single();
            if($row){
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['user_info'] = [
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'email' => $row['email'],
                    'role' => $row['role'],
                ];
                $_SESSION['message'] = "<div class=\"alert alert-dismissible alert-success\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\"></button>
                    <strong>U bent succesvol ingelogd. Welkom </strong>" . $_SESSION['user_info']['username'] . "!";
                header('Location: '.ROOT_URL. 'todos/');
            }else{
                Messages::setMessage('Incorrect login', 'error');
            }
        }
        return;
    }
}