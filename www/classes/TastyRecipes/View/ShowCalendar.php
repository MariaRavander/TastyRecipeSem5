<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
* Shows the calendar page
*/
class ShowCalendar extends AbstractRequestHandler {
    
    protected function doExecute() {
        
        $this->session->restart();
        
        $currentUser = $this->session->get('user');
        $user = 'user';
        $this->addVariable($user, $currentUser);
        
        $currentLocation = 'currentLocation';
        $this->addVariable($currentLocation, 'Calendar');
        
        return 'subfolder/calendar';
    }
}