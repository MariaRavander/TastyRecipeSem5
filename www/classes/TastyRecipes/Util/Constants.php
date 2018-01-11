<?php

namespace TastyRecipes\Util;

use Id1354fw\Util\Classes;

/**
 * Defines constants used by the TastyRecipes application, should be implemented by any class that needs
 * to use one or more of these constants.
 */
class Constants {
    
    const SUCCESSFUL_LOGIN = 'successfulLogin';
    const WRONG_PASSWORD = 'wrongPassword';
    const UNREGISTERED_USER = 'unregisteredUser';
    
    const USERNAME_TAKEN = 'usernameTaken';
    const NOT_VALID_USERNAME = 'notValidUsername';
    const NOT_VALID_PASSWORD = 'notValidPassword';
    const SUCCESSFUL_REGISTRATION = 'successfulRegistration';


}