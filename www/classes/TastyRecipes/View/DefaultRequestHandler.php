<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
* All requests without an correct URL will be sent to
*the index page
*/
class DefaultRequestHandler extends AbstractRequestHandler {
    
    protected function doExecute() {
        \header('Location: /TastyRecipes/View/ShowFirstPage');
    }
}