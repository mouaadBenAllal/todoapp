<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 07/10/2017
 * Time: 23:37
 */


/**
 * Class UserModel
 */
class UserModel extends Model{

    /*
     * Register functie voor het aanmaken van een account.
     */
    public function register(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        $hash_password = md5($post['password']);
        if($post['submit']){
            // Als er op de knop is geklikt, voert het de onderstaande select query uit.
            $this->query('SELECT email FROM users WHERE email =:email');
            $this->bind(':email', $post['email']);
            $row = $this->single();
            // Als er 1 row gefetched is met email die in de $post variabel staat laat word message class aangeroepen.
            if($row){
                Messages::setMessage('Deze email bestaat al!','error');
            }
            // alle ingevulde velden worden in database gestopt.
            else{
                $this->query('INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)');
                $this->bind(':username',$post['username']);
                $this->bind(':email',$post['email']);
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


    /*
     * Login functie om in te loggen.
     */
    public function login(){
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        $password = md5($post['password']);
        if(isset($post['submit'])){
            // Haalt alle users op om te vergelijken.
            $this->query('SELECT * FROM users WHERE email = :email AND password=:password ');

            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $row = $this->single();
            // als er een row gevonden is met die gegevens word onderstaande code uitgevoerd.
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
                    U bent succesvol ingelogd. Welkom " ."<strong>". $_SESSION['user_info']['username'] . "</strong>" . "!";
                header('Location: ' . ROOT_PATH . 'todos/all');
            }else{
                Messages::setMessage('Incorrect login.', 'error');
            }
        }
        return;
    }
}