<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\Controller;
use TastyRecipes\Util\Constants;
/**
* Shows the Result of registration, different pages depending on how the registration went.
*/
class ShowRegistration extends AbstractRequestHandler {
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
        
    protected function doExecute() {
        
        $this->session->restart(); 
        
        $contr = new Controller();
        
        $registration = $contr->Register($this->username, $this->password);
        
        $outcomeOfRegister = 'outcomeOfRegister';
        $this->addVariable($outcomeOfRegister, $registration);
        
        $currentLocation = 'currentLocation';
        $this->addVariable($currentLocation, 'Register');
        
        if(trim($registration) === Constants::SUCCESSFUL_REGISTRATION) {
        
            return 'subfolder/successfulRegistration';
        }
        
        return 'subfolder/failedRegistration';
    }
}

?>