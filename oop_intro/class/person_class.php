<?php

class person{
    public $hand;
    public $nose;
    public $leg;
    
   public function eating ($var){
        return " i use to eat with $var ";
    }
  public  function dancing (){
        
    }
}

       class person2{
    
    public $firstname;
    public $lastname;
    public $othername;
    
   public function __construct ($fname, $lname,$oname){
    
    $this -> firstname = $fname;
    $this -> lastname = $lname;
    $this -> othername = $oname;
    
    }
    public function getfullname (){
        return $this -> firstname. " ". $this -> lastname . " ". $this -> othername;
        
        
    }
}
?>