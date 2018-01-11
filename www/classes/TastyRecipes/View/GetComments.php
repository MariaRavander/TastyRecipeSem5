<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\Controller;

/**
 * Returns the username of the user in the current session.
 *
 * @author Leif Lindback, leifl@kth.se
 */
class GetComments extends AbstractRequestHandler {

    protected function doExecute() {
        
        $contr = new Controller();
        $comments = 'comments';      
        $this->addVariable($comments, $contr->getComments($page));
        
        $currentLocation = 'currentLocation';
        
        if($this->session->get('currentLocation') === 'subfolder/meatballs') {     
           
            $this->addVariable($currentLocation, 'Meatballs');
            $page = 'meatballs';
        }
        
        if($this->session->get('currentLocation') === 'subfolder/pancakes') {
            
            $this->addVariable($currentLocation, 'Pancakes');
            $page = 'pancakes';
        }

        $jsonData = 'jsonData';
        $this->addVariable($jsonData, $contr->getComments($page));
        
        return 'subfolder/json-view';
    }

}