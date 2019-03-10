<?php 

// M: Including the auxiliary classes;
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Message.php';
require 'classes/Model.php';

// M: Including config file;
require 'config.php';

// M: Including the controllers;
require 'controllers/home.php';
require 'controllers/users.php';

// M: Including the models;
//require 'models/home.php';

// M: New bootstrap object that will handle all the requests;
$bootstrap = new Boostrap($_GET);

// M: Creating the controller;
$controller = $bootstrap->createController();

// M: Executing the action;
if ($controller) {
    $controller->executeAction();
}
