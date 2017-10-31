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
        $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        if (isset($_SESSION['isLoggedIn']) && $_SESSION['user_info']['role'] == 4) {
            $this->query('SELECT todos.id, todos.description, todos.created_at, users.username, todos.completed
                                FROM todos
                                INNER JOIN users 
                                ON todos.user_id = users.id');
            $allTodos = $this->results();
        } else {
            $this->query('SELECT todos.id, todos.description, todos.created_at, users.username, todos.completed
                                FROM todos
                                INNER JOIN users 
                                ON todos.user_id = users.id');
            $allTodos = $this->results();
        }
        if (isset($post['delete'])) {
            $this->query('DELETE FROM todos WHERE id = :id');
            $this->bind(':id', $post['delete_id']);
            $this->execute();
            echo "<meta http-equiv='refresh' content='0'>";
            echo Messages::setMessage('Todo succesvol verwijderd!','success');
            exit();


        }
        return $allTodos;
    }

/*
 * Methode om taak toevoegen.
 */
    public function add()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($post['submit']) {
            // Als er op de knop is geklikt, voert het de onderstaande insert query uit.
            $this->query('INSERT INTO todos(description, user_id) VALUES (:description, :user_id)');
            $this->bind(':description', $post['description']);
            if ($this->bind(':user_id', $post['user_id']) == $_SESSION['user_info']['username']) {
                $this->bind(':user_id', $_SESSION['user_info']['id']);
            }
            $this->bind(':user_id', $post['user_id']);
            $this->execute();
            // Kijkt of er laatste sql operatie is.
            if ($this->lastInsertId()) {
                header('Location: ' . ROOT_URL . 'todos');
                return Messages::setMessage("Todo succesvol toegevoegd!",'success');
            }

        }
        if (isset($_SESSION['isLoggedIn'])) {
            // Haal alle users uit db.
            $this->query('SELECT username,id FROM users');
            $row = $this->results();
            return $row;
        }
        return;
    }
    /*
     * Update
    */
    public function update()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $session_user = $_SESSION['user_info']['id'];
        if ($post['submit']) {

            $this->query('UPDATE todos SET description=:description, completed=:completed WHERE id =:todo_id ');
            $this->bind('description', $post['description']);
            $this->bind('completed', $post['completed']);
            $this->bind('todo_id', $post['todo_id']);
            $this->execute();
            header('Location: ' . ROOT_URL . 'todos');
        }

        if (isset($_SESSION['isLoggedIn']) && $_SESSION['user_info']['role'] == 4) {
            $this->query('SELECT description,user_id,id FROM todos');
            $row = $this->results();
            return $row;
        }
    }
}