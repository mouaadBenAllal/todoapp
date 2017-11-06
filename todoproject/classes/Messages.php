<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 14/10/2017
 * Time: 19:37
 */

class Messages{
    /**
     * @param $text : vul message in
     * @param $type : geef type van message aan met error of success.
     */
    public static function setMessage($text, $type){
        // kijk of type error is.
        if($type == 'error'){
            $_SESSION['errorMessage'] = $text;
        }elseif($type == 'success'){
            $_SESSION['successMessage'] = $text;
        }
    }

/* Static functie die de error of success message toont
 * door te kijken of er een succesmessage of errormessage in de $_SESSION array zit.
 */
    public static function displayMessage(){
        if(isset($_SESSION['errorMessage'])){
            echo '<div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>Ooops! </strong>'
                    . $_SESSION['errorMessage']
                    . '</div>';
            unset($_SESSION['errorMessage']);
        }
        elseif(isset($_SESSION['successMessage'])){
            echo '<div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert"></button>'
                    . $_SESSION['successMessage']
                    . '</div>';
            unset($_SESSION['successMessage']);
        }
    }
}