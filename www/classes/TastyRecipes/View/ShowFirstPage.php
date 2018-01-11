<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\Controller;
use TastyRecipes\Util\Constants;

/**
* Shows the index page. $user and $currentLocation is used for the menu in the next view to show current logged in user (if there is one) and current page.
*/
class ShowFirstPage extends AbstractRequestHandler {
    
    protected function doExecute() {
        
        $this->session->restart();
    
        $currentUser = $this->session->get('user');
        $user = 'user';
        $this->addVariable($user, $currentUser);
        
        $currentLocation = 'currentLocation';
        $this->addVariable($currentLocation, 'FirstPage');
        
        return 'index';
    }
}