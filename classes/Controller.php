<?php

/* 
 * M: Base Controller class;
 */

abstract class Controller{
    // M: Action represents the name of the action called by the user;
    protected $action;
    // M: Request represents the reqeust done by the user;
    protected $request;
    
    public function __construct($action, $request) {
        $this->action = $action;
        $this->request = $request;
    }


    // M: Calls the action from the controller;
    public function executeAction() {
        return $this->{$this->action}();
    }
    
    /* 
     * M: Return the view according to the called action;
     * If the fullView is set to true it means that the current page needs the
     * full view template of the main page;
     */
    public function returnView($viewModel, $fullView) {
        $view = 'views/'.get_class($this).'/'.$this->action.'.php';
        if ($fullView) {
            require ('views/main.php');
        } else {
            require ($view);
        }
    }
}
