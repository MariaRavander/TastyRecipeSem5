<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\UserCheck;
use TastyRecipes\Controller\controller;

/**
* Shows the logout page and invalidate the session
*/
class ShowLogout extends AbstractRequestHandler {
        
    protected function doExecute() {
  
        $this->session->restart();    
        $this->session->invalidate();
        
        $this->session->restart();
      
        return 'subfolder/logout';
    
    }
}

?>