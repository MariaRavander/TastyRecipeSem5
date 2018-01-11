<?php

namespace TastyRecipes\Controller;


use TastyRecipes\Model\AuthorizeUser;
use TastyRecipes\Model\CommentHandling;


/**
 * This is the application's controller. All calls from view to lower layers pass through here. 
 *A new controller is always constucted for all calls
 */
class Controller {
    
    public function Login($username, $password) { 
        $check = new AuthorizeUser();  
        return $check->authorize($username, $password);
    }
    
    public function Register($newUsername, $newPassword) {
        $check = new AuthorizeUser();
        return $check->registerNewUser($newUsername, $newPassword);      
    }

    public function getComments($page) {    
        $comhand = new CommentHandling();
        return $comhand->loadComments($page);
    }
    
    public function addComment($user, $comment, $page) {
        $commentHandler = new CommentHandling();
        $commentHandler->addCommentEntry($user, $comment, $page);
    }
    
    public function deletComment($user, $timestamp, $page) {
        $commentHandler = new CommentHandling();
        $commentHandler->deletCommentEntry($user, $timestamp, $page);
    }
   
}

?>
