<?php

namespace TastyRecipes\Integration;

use TastyRecipes\Util\Constants;

/**
 * Handles the connection to the database and the table for userdata (usernames and passwords)
 */
class UserStore {

    private $filePath = 'resources/database/users.txt';
           
    private $servername = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "root";
    private $databaseName = "myDB";
      
    private $conn;

    public function __construct() {
        
        $this->conn = mysqli_connect($this->servername, $this->dbUsername, $this->dbPassword, $this->databaseName);
        
        if(!$this->conn) {
            die("connetion failed to database: " . mysqli_connect_error);
        }
    }

    /**
     * checkUserData checks if the user is in the file with registered useres and if the password matches.
     * It returns an sting of the outcome, UNREGISTERD_USER: no register user with the same username,
     * WRONG_PASSWORD: username correct but not a maching password or SUCCESSFUL_LOGIN: a username and password match.
     */
    
    public function checkUserData($username, $password) {

        $sql = "SELECT username, password
                FROM Users
                WHERE BINARY username = '$username'";  
        
        $result = $this->conn->query($sql);
        
        if($result->num_rows <1) {
            return Constants::UNREGISTERED_USER;
        }
        
        $row = $result->fetch_assoc();
 
        if($verify = password_verify(trim($password), $row["password"])) { 
            return Constants::SUCCESSFUL_LOGIN; 
        }
        
        return Constants::WRONG_PASSWORD;
           
    }
    /*
    * addUser adds a new user and password. If the username is allready in the database the user is not added.
    * returns a string. SUCCESSFUL_REGISTRATION: the registration was successful or USERNAME_TAKEN: unsuccessful registraion, 
    * the username were allreday in the databas.
    */
    
    public function addUser($username, $password) {
        
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Users(username, password) VALUES ('$username', '$password')";

        if(!(mysqli_query($this->conn, $sql))) {
            return Constants::USERNAME_TAKEN;
        }
        
        return Constants::SUCCESSFUL_REGISTRATION;

    }
}
?>