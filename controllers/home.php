<?php

/* 
 * M: Controller for the login part of the web app;
 */
 
class Home extends Controller {
    public function Index() {
        $this->returnView(true,true);
    }
}