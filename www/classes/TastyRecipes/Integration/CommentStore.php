<?php

namespace TastyRecipes\Integration;

/**
 * Handles the connection to the database and the table for comments (usernames, page, comment and timestamp)
 */
class CommentStore {
    
    private $servername = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "root";
    private $databaseName = "myDB";
    
    private $page;
    private $conn;

    public function __construct($page) {
        $this->page = $page;
        
        $this->conn = mysqli_connect($this->servername, $this->dbUsername, $this->dbPassword, $this->databaseName);
        
        if(!$this->conn) {
            die("connetion failed to database: " . mysqli_connect_error);
        }
    }

    /**
     * getAllComments return an array of commententries with user, comment and timestamp.
     */
    public function getAllComments() {
        
        $commentEntries = array();

         $sql = "SELECT *
                FROM RecipeComments
                WHERE page = '$this->page'
                ORDER BY timestamp";  
        
        $result = $this->conn->query($sql);
        
        $rows = $result->num_rows;
        
        for($i=1; $i<=$rows; $i++) {
            $row = $result->fetch_assoc();
            array_push($commentEntries, $row["username"]);
            array_push($commentEntries, $row["comment"]);
            array_push($commentEntries, $row["timestamp"]);
            
        }

        return $commentEntries;
        
    }
    /**
     * addComment adds an new commententrie with user, comment and timestamp.
     */
    public function addComment($user, $comment) {

        $timestamp = date("Y-m-d-h-i-s-a", time());
        $sql = "INSERT INTO RecipeComments(page, comment, username, timestamp) VALUES ('$this->page', '$comment', '$user', '$timestamp')";
        
        mysqli_query($this->conn, $sql);

    }
    /**
     * deleteComment delete an commententrie with specific user and timestamp.
     */
    public function deletComment($user, $timestamp) {
 
        $sql = "DELETE FROM RecipeComments
                WHERE username = '$user' AND timestamp = '$timestamp' AND page = '$this->page'";
        
        mysqli_query($this->conn, $sql);
          
    }
}
?>


