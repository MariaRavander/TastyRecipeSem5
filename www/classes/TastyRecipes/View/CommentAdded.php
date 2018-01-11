<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\Controller;


/**
* Shows a added comment on an recipe page
*/
class CommentAdded extends AbstractRequestHandler {
    
    public function setComment($comment) {
        $this->comment = $comment;
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
 
        if($currentUser === false) {
            
            return 'subfolder/notLoggedIn';
        }
        
        $contr->addComment($currentUser, $this->comment, $page);   
        $comments = 'comments';
        $this->addVariable($comments, $contr->getComments($page));
        
  
        return $this->session->get('currentLocation');
        
       
            
    }
}

?>