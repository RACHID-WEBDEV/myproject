<?php

class dbConfig{
    
    private   $dbhost = "localhost";
    private   $dbname = "oop_crud_app";
    private   $dbuser = "root";
    private   $dbpass = "";
    protected $db_connect;
    
    public function __construct(){
    
            $this->db_connect = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
            if($this->db_connect){
                return $this->db_connect;
            }
            else{
               return "Connection Could not be established " .mysqli_error($this->db_connect);
            }
    }
    
    
    
    
    
    
    
}

?>