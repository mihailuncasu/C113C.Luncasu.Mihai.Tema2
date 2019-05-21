<?php 

require_once 'app/start.php';
// M: Start the session for the login, shopping cart and more further usage;
// M: TODO: Don't forget to destroy the session vars when a user will sign out;
session_start();

// M: New bootstrap object that will handle all the requests;
$bootstrap = new Bootstrap($_GET);

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
