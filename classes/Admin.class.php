<?php

class Admin {

    private $us;
    private $pw;
    

    public function checkInput($username, $password)
    {
        $us = REALUSER;
        $pw = REALPASS;
        if($username === $us && $password === $pw){
            echo "<p>Inloggningen lyckades</p>";
            header("Location:hidden.php");
        }
        else {
            echo "<p>Inloggningen misslyckades</p>";
        }
    }
}