<?php

namespace TastyRecipes\Model;

use TastyRecipes\Integration\UserStore;
use TastyRecipes\Util\Constants;


/**
 * This class authorizes users for login or registration
 */
class AuthorizeUser {

    /*
    * authorize authorize users for login and returns string from the userStore checkUserData
    */
    public function authorize($username, $password) {
 
        $userStore = new UserStore();
                                        
        return $userStore->CheckUserData($username, $password);
       
    }
    /**
    * registerNewUser checks that username and password is at least 5 charachers long, don't contains html-tags or not printable chars.
    * The username also have to be uniq. If all the above is fullfilled the user is added in the database table users.
    * It returns an string. NOT_VALID_USERNAME and NOT_VALIED_PASSWORD if they don't fullfill the above criterias, USERNAME_TAKEN if username is not uniq
    * and SUCCESSFUL_REGISTRATION if the new user was added.
    */
    public function registerNewUser($newUsername, $newPassword) {
        
        $newUsername2 = htmlentities($newUsername, ENT_QUOTES);
        $newPassword2 = htmlentities($newPassword, ENT_QUOTES);
        
        if(ctype_print(trim($newUsername)) === false || strlen($newUsername) < 5 || $newUsername !== $newUsername2) {
            return Constants::NOT_VALID_USERNAME;
        }
        if(ctype_print(trim($newPassword)) === false || strlen($newPassword) < 5 || $newPassword !== $newPassword2) {
            return Constants::NOT_VALID_PASSWORD;
        }
        

        
        $userStore = new UserStore();

        return $userStore->addUser($newUsername, $newPassword);

    }
       
}
?>