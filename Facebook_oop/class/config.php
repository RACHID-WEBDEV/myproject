<?php

class dbconfig{

    private  $dbhost = "localhost";
    private  $dbname = "facebook_user_db";
    private  $dbuser = "root";
    private  $dbpass = "";
    protected  $db_connect;

    public function __construct(){
        $this->db_connect = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
            if($this->db_connect){
                return $this->db_connect;
            }else{
                return "connections couldn't be Established". mysqli_error($this->db_connect);
            }

    }





}
?>