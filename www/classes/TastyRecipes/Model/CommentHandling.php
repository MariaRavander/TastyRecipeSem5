<?php

namespace TastyRecipes\Model;


use TastyRecipes\Integration\CommentStore;
use Id1354fw\View\AbstractRequestHandler;

/**
 * Handling of the comments on the recipe pages
 */
class CommentHandling {
    /**
    * loadComments retunrs an array of commententries for askes page
    */
    public function loadComments($page) {
 
        $comments = new CommentStore($page);
        $commentEntries = $comments->getAllComments();
           
        return $commentEntries; 
       
    }
    /**
    * addCommentEntrie checks if an comment is valid and if so adds the comment
    */
    public function addCommentEntry($user, $comment, $page){
        
        $comment = htmlentities($comment, ENT_QUOTES);
        
        if(empty($comment) || ctype_print($comment) === false) {
            return;
        }
        
        $comments = new CommentStore($page);
        $comments->addComment($user, $comment);
        
    }
    /**
    * deleteCommentEntrie deletes an comment from an specific user and timestamp
    */
     public function deletCommentEntry($user, $timestamp, $page){
        
        $comments = new CommentStore($page);
        $comments->deletComment($user, $timestamp);
    }
 
}
?>