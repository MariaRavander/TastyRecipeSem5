<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\Controller;

/**
 * Returns the username of the user in the current session.
 *
 * @author Leif Lindback, leifl@kth.se
 */
class DeletComment extends AbstractRequestHandler {

        public function setTimestamp($timestamp) {
       $this->timestamp = $timestamp;
    }

    protected function doExecute() {
 $this->session->restart(); 
        
        $user = 'user';
        $currentUser = $this->session->get('user');
        $this->addVariable($user, $currentUser);
        
        $contr = new Controller();
        
        $currentLocation = 'currentLocation';
        
        if($this->session->get('currentLocation') === 'subfolder/meatballs') {     
           
            $this->addVariable($currentLocation, 'Meatballs');
            $page = 'meatballs';
        }
        
        if($this->session->get('currentLocation') === 'subfolder/pancakes') {
            
            $this->addVariable($currentLocation, 'Pancakes');
            $page = 'pancakes';
  
        }
       
        $contr->deletComment($currentUser, $this->timestamp, $page);
    }

}