<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\Controller;

/**
* Shows the pancake page
*/
class ShowPancakePage extends AbstractRequestHandler {
    
    protected function doExecute() {
        
        $this->session->restart();
        
        $currentUser = $this->session->get('user');
        $user = 'user';
        $this->addVariable($user, $currentUser);
        
        $currentLocation = 'currentLocation';
        $this->addVariable($currentLocation, 'Pancakes');
        $this->session->set($currentLocation, 'subfolder/pancakes');
        
        $page = 'pancakes';
        
        $contr = new Controller();
        $comments = 'comments';     
        $this->addVariable($comments, $contr->getComments($page));
        
        return 'subfolder/pancakes';
    }
}