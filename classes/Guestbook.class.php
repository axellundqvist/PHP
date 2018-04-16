<?php
/* klassfil för att hantera poster från databas */

class Guestbook {
    /* Egenskaper */
    private $db;


    /* Constructor */
    function __construct()
    {
    /* Anslut till databas */
       $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
       if($this->db->connect_errno > 0)
       {
           die("Fel vid anslutning: " . $this->db->connect_error);
       }
       
    }

    /* Hämta lista med inlägg */
    public function getPosts()
    {
        $sql = "SELECT * FROM post ORDER BY postid DESC"; /* SQL-fråga sparad i en tillfällig variabel */
        $result = $this->db->query($sql); /* Resultatet sparas i variabeln result */
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* Lägg till ett nytt inlägg */
    public function addPosts($author, $message)
    {
        
        $dt = date("Y-m-d-H:i:s");

        $sql = "INSERT INTO post(author, message, date) VALUES('$author', '$message', '$dt')";
        
        $result = $this->db->query($sql);

        return mysqli_query($result);
        mysqli_query($sql);
        header("Location: ../index.php");
    }

    /* Radera inlägg */
    public function deletePosts($id)
    {
        $sql = "DELETE FROM post WHERE postid = $id";
        $result = $this->db->query($sql);
        mysqli_query($result);
        
        header("Location: hidden.php");
    }

    /* Uppdatera inlägg */
    public function updatePosts($update, $comment)
    {
        $sql = "UPDATE post SET message = '$comment' WHERE postid = '$update'";

        $result = $this->db->query($sql);
        mysqli_query($result);
        
        header("Location: hidden.php");
    }

}
