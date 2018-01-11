<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\Controller;
use TastyRecipes\Util\Constants;

/**
* Shows different pages depending on how the login went on the previous page.
* If it was a successful login the user is welcomed otherwise the login form shows again with an explanation of what went wrong.
*/
class ShowLogin extends AbstractRequestHandler {
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
        
    protected function doExecute() {
        
        $this->session->restart(); 
        
        $contr = new Controller($this->$username, $this->password);
        $check = $contr->Login($this->username, $this->password);
        
        $outcomeOfLogin = 'outcomeOfLogin';
        $this->addVariable($outcomeOfLogin, $check);
        
        $currentLocation = 'currentLocation';
        $this->addVariable($currentLocation, 'Login');
        
        if($check === Constants::SUCCESSFUL_LOGIN) {
            $user = 'user';
            $this->session->set($user, $this->username);
            $this->addVariable($user, $this->username);
        
            return 'subfolder/successfulLogin';
        }
        
        return 'subfolder/failedLogin';
    }
}

?>