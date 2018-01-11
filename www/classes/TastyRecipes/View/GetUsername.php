<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 * Returns the username of the user in the current session.
 *
 */
class GetUsername extends AbstractRequestHandler {

    protected function doExecute() {
        $currentUser = $this->session->get('user');
        $jsonData = 'jsonData';
        $this->addVariable($jsonData, $currentUser);
        
        return 'subfolder/json-view';
    }

}

?>