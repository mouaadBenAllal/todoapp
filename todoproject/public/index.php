<?php
/**
 * Created by PhpStorm.
 * User: mouaad
 * Date: 29/09/2017
 * Time: 16:06
 */

#start $_SESSION
session_start();

require 'config.php';

#classes
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Model.php';
require 'classes/Fix.php';
require 'classes/checkPage.php';
require 'classes/Messages.php';

#controllers
require 'controllers/Home.php';
require 'controllers/Users.php';
require 'controllers/Todos.php';

#models
require 'models/Home.php';
require 'models/Todo.php';
require 'models/User.php';

#new object bootstrap word aaangemaakt en daarin word global variable $_GET ingestopt.
$bootstrap = new Bootstrap($_GET);

$fix = new Fix();
$checkPage = new checkPage();
#new controller object word aangemaakt.
$controller = $bootstrap->createController();
#als controller bestaat execute de methode van controller.
if($controller){
    $controller->executeAction();
}

