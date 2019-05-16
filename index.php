<?php 

// M: Including config file;
require 'config.php';

spl_autoload_register(function($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include_once $_SERVER['DOCUMENT_ROOT'] . '/' . ROOT_PATH . $className . '.php';
});
// M: Import PHPMailer classes into the global namespace;
/*
use PHPMailer\PHPMailer\PHPMailer;

// M: Including the auxiliary classes;
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Message.php';
require 'classes/Model.php';
require 'classes/Mailer.php';



// M: Including the controllers;
require 'controllers/HomeController.php';
require 'controllers/UsersController.php';

// M: Including the models;
require 'models/MenuItemsModel.php';
require 'models/MainPageAdsModel.php';
require 'models/ProductsModel.php';
require 'models/UsersModel.php';
*/

// M: Start the session for the login, shopping cart and more further usage;
// M: TODO: Don't forget to destroy the session vars when a user will sign out;
session_start();

// M: New bootstrap object that will handle all the requests;
$bootstrap = new Boostrap($_GET);

// M: Creating the controller;
$controller = $bootstrap->createController();

function auto_version($file='') {
    if(!file_exists($file))
        return $file;
 
    $mtime = filemtime($file);
    return $file.'?'.$mtime;
}

// M: Executing the action;
if ($controller) {
    $controller->executeAction();
}
