<?php

class Admin {

    private $us;
    private $pw;
    

    public function checkInput($username, $password)
    {
        $us = REALUSER;
        $pw = REALPASS;
        if($username === $us && $password === $pw){
            
            echo("<script>location.href = 'hidden.php';</script>");

        }
        else {
            echo "<p>Inloggningen misslyckades</p>";
        }
    }
}
?>
