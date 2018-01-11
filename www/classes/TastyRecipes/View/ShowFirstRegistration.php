<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
* Shows the First Register page
*/
class ShowFirstRegistration extends AbstractRequestHandler {
    
    protected function doExecute() {
        
        $this->session->restart();

        $currentLocation = 'currentLocation';
        $this->addVariable($currentLocation, 'Register');
        
        return 'subfolder/firstRegister';
    }
}