<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 09/10/2017
 * Time: 22:22
 */

class checkPage
{

        public function activateClass($requesturl){
            $current_file_name = basename($_SERVER['REQUEST_URI'], ".view.php");
            if ($current_file_name == $requesturl)
                echo 'class="active"';
        }
}