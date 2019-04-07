<?php 

// M: Including the auxiliary classes;
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Message.php';
require 'classes/Model.php';

// M: Including config file;
require 'config.php';

// M: Including the controllers;
require 'controllers/HomeController.php';
require 'controllers/UsersController.php';

// M: Including the models;
require 'models/MenuItemsModel.php';
require 'models/MainPageAdsModel.php';
require 'models/ProductsModel.php';
require 'models/UsersModel.php';

// M: Including html generator classes;
require 'classes/html/Markup.php';
require 'classes/html/li.php';

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
