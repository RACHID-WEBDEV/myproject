<?php
ini_set("display_errors", 0);
//error_reporting(E_ALL);

class statisticsOOP{
    
    public $inputs_arr;
    public $mean_val;
    public $newmode_arr;
    public $newrange_arr;
    public $median_val;
     public $count;  
     public $mid;     
    
    
    
    public function setter($inputs){
        $this->inputs_arr = $inputs;
    }
    
    
    public function getter(){
        return $this->inputs_arr;
    }  
    /* public function __construct($inputs){
        $this->inputs_arr = $inputs;
    }*/    
    
   
    
    public function getMean($inputs){
        $this->setter($inputs);
        $this->getter();
        $this->mean_val = array_sum($this->getter()) / count($this->getter());
        return $this->mean_val;
        
    }  


    public function getMode($inputs){
          $this->setter($inputs);
          $this->getter();
          $this->newmode_arr = array_count_values($this->getter());
          foreach($this->newmode_arr as $this->key=>$this->val){
            if($this->val == max($this->newmode_arr)){
                return $this->key;
                break;
            }
          }
            //die;
    }  
    
   /* public function getMedian($inputs){
        $this -> setter($inputs);
        $this -> getter();
        $this->$median_val = sort($this -> getter());
        
        
    }*/  
    
    public function getMedian($inputs){                                                       
    $this->setter($inputs);                                                               
    $this->getter();                                                                      
    if($this->getter()){                                                                      
    sort($this->getter());                                                            
    $count = count($this->getter());                                                      
    $mid = floor(($count-1)/2);                                                           
    return $this->median_val= ($this->getter()[$mid] + $this->getter()[$mid+1-$count%2])/2; 
  }                                                                                         
   // return $this->median_val=0;                                                               
                                                                                          
}                                                                                        
    
    
    public function getRange($inputs){
        $this->setter($inputs);
        $this-> getter();
        $this-> newrange_arr = max($this->getter()) - min($this->getter());
        return $this-> newrange_arr;
        
    }  
    
    
     
}


?>