<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 07/10/2017
 * Time: 23:37
 */

class TodoModel extends Model
{
    # Alle todos worden in de $row gereturned
    public function index(){

        $session_user = $_SESSION['user_info']['id'];
        if ($_SESSION['isLoggedIn'] && $_SESSION['user_info']['role'] == 4) {
            $this->query('SELECT * FROM todos where user_id = :user_id ORDER BY created_at DESC');
            $this->bind(':user_id', $session_user);
            $row = $this->results();
        } else {
            $this->query('SELECT * FROM todos ORDER BY created_at DESC');
            $row = $this->results();
        }

        $delete_id = $_POST['delete_id'];
        if ($_POST['delete']) {
            $this->query('DELETE FROM todos WHERE id = :id');
            $this->bind(':id', $delete_id);
            $this->execute();
        }
        return $row;
    }

    public function add()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($post['submit']) {
            # Als er op de knop is geklikt, voert het de onderstaande insert query uit.
            $this->query('INSERT INTO todos(description, user_id) VALUES (:description, :user_id)');
            $this->bind(':description', $post['description']);
            if ($this->bind(':user_id', $post['user_id']) == $_SESSION['user_info']['username']) {
                $this->bind(':user_id', $_SESSION['user_info']['id']);
            }
            $this->bind(':user_id', $post['user_id']);

            $this->execute();
            if ($this->lastInsertId()) {
                header('Location: ' . ROOT_URL . 'todos');
            }
        }
        if ($_SESSION['isLoggedIn'] && $_SESSION['user_info']['role'] == 4) {
            #Haal alle users uit db.
            $this->query('SELECT username,id FROM users where id=:user_id');
            $this->bind(':user_id',$_SESSION['user_info']['id']);
            $row = $this->results();
            return $row;
        }else{
            $this->query('SELECT username,id FROM users');
            $row = $this->results();
            return $row;
        }
    }

    public function update(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $session_user = $_SESSION['user_info']['id'];
        if ($post['submit']) {
            $this->query('UPDATE todos SET description=:description, completed=:completed WHERE id =:todo_id ');
            $this->bind('description', $post['description']);
            $this->bind('completed',$post['completed']);
            $this->bind('todo_id', $post['todo_id']);
            $this->execute();
        }
        if ($_SESSION['isLoggedIn'] && $_SESSION['user_info']['role'] == 4)
        {
            $this->query('SELECT description,user_id,id FROM todos where user_id = :user_id');
            $this->bind(':user_id', $session_user);
            $row = $this->results();
        }else{
            $this->query('SELECT description,user_id,id FROM todos');
            $row = $this->results();

        }
        return $row;
    }
}