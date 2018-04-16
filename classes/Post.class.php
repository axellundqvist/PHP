<?php
        
            
        class Post { 
            public $author = 0;
            public $message = 0; 
        
            public function __construct($author, $message){
                $this->author = $author;
                $this->message = $message;
            }
    
            public function getAuthor(){
                return $this->author;
                
            }
    
            public function getMessage(){
                return $this->message;
            }        
            
}
            
?>