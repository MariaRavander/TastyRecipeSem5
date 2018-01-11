<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\Controller;


/**
* Shows the UppdateRecipePage page after a comment has been deleted
*/
class CommentDeleted extends AbstractRequestHandler {
    
    public function setComment($comment) {
        $this->comment = $comment;
    }
    
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
        
        $comments = 'comments';
        $this->addVariable($comments, $contr->getComments($page));
            
        return $this->session->get('currentLocation');
    
    }
}

?>