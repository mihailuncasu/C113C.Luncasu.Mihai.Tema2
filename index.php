<?php 

require_once 'app/start.php';

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
