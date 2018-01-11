<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
* Shows the Login page
*/
class ShowFirstLogin extends AbstractRequestHandler {
    
    protected function doExecute() {
        
        $this->session->restart();

        $currentLocation = 'currentLocation';
        $this->addVariable($currentLocation, 'Login');
        
        return 'subfolder/firstLogin';
    }
}