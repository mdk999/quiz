<?php
class Document {

    public $user;

    public $name;
    
    private $db;

    public function __construct() {
        
        $this->db = Database::getInstance(); 
    }
    
    public function init($name, User $user){
        
        assert("strlen({$name}) > 5");
        
        $this->user = $user;
        
        $this->name = $name;  
    }

    public function getTitle() {
        
        if($row = $this->db->query("SELECT * FROM document WHERE name = '{$this->name}' LIMIT 1")){
          
          return $row[2]; // third column in a row
        }
        else return;
        
        
    }

    public function getContent() {

        if($row = $this->db->query("SELECT * FROM document WHERE name = '{$this->name}' LIMIT 1")){
            
          return $row[5]; // sixth column in a row
          
        }
        else return;
    }

    public static function getAllDocuments() {
        // to be implemented later
    }

}

class User {

    public $doc;
    
    public function __construct(){
        
        $this->doc = new Document();
        
    }
    public function makeNewDocument($name) {
        
        if($this->doc->init($name, $this)){
            
            return $doc;
            
        }
        else return;
    }

    public function getMyDocuments() {
        
        $list = array();
        
        foreach ($this->doc as $doc) {
            
            if ($doc->user == $this) $list[] = $doc;
        }
        return $list;
    }

}
