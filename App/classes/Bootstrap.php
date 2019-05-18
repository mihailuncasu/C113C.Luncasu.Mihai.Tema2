<?php //namespace classes;

/* 
 * M: Bootstrap class that will handle all the URL requests;
 */

class Bootstrap 
{
    // M: Request is the entire URL;
    protected $request;
    // M: Action is the method called from the cotroller class;
    protected $action;
    /*
     *  M: Controller will store the name of the class
     *  that will handle the current webpage; 
     */
    protected $controller;
    
    // M: Based on URL we know what controller to call and what method;
    public function __construct($request) {
        $this->request = $request;
        
        if ($this->request['controller'] == '') {
            // M: We are in the home page;
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }
        
        if ($this->request['action'] == '') {
            $this->action = 'index';
        } else {
            $this->action = $this->request["action"];
        }
    }
    
    /*
     *  M: After retianing the name of the controller and the action we create 
     *  the controller and call the specific action;
     */
    public function createController() {
        // M: We check if the clas exits;
        if (class_exists($this->controller)) {
            // M: Check if the class extends the base Controller class;
            $classParents = class_parents($this->controller);
            if (in_array("Controller", $classParents)) {
                // M: Check if the method that has to be called exists;
                if (method_exists($this->controller, $this->action)) {
                    // M: Return the new controller;
                    return new $this->controller($this->action, $this->request);
                } else {
                    // TO DO: Implement error message;
                    echo "Method ".$this->action." dosen't exist in the controller ".$this->controller.".";
                    return;
                }
            } else {
                // TO DO: Implement error message;
                echo "Class ".$this->controller." dosen't extend the base controller class.";
                return;
            }
        } else {
            // TO DO: Implement error message;
            echo "Class ".$this->controller." dosen't exit.";
            return;
        }
    }
}
