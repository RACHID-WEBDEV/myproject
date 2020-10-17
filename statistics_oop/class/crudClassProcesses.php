<?php 

require_once("configClass.php");

class crudOperation extends dbConfig {
    public $fname;
    public $lname;
    public $email;
    public $pass;
    public $cpass;
    public $input_val;
    public $insert_qry;
    public $result;
    public $errors = "";
    public $saveFlag = true;
    
    public function __construct(){
        parent::__construct();
    }
    
    
    public function create($arr){
       if($this->validateInputs($arr)){
           $this->insert_qry = "INSERT INTO studentreg (firstname,lastname,email,password,cpassword)
                                VALUES('$this->fname','$this->lname','$this->email','$this->pass','$this->cpass')";
           $this->result     = mysqli_query($this->db_connect,$this->insert_qry);
           if($this->result){
               echo "Record saved successfully";die();
           }
       };
        
    }
    
    
     public function read(){
        
    }
    
    
     public function update(){
        
    }
    
    
     public function delete(){
        
    }
    
     public function validateInputs($arr){
        //
        if(is_array($arr) && !empty($arr)){
        //
           $this->fname = isset($arr['first_name'])             ? $this->sanitize_data($arr['first_name']) : "";
           $this->lname = isset($arr['last_name'])              ? $this->sanitize_data($arr['last_name']) : "";
           $this->email = isset($arr['email'])                  ? $this->sanitize_data($arr['email']) : "";
           $this->pass  = isset($arr['password'])               ? $this->sanitize_data($arr['password']) : "";
           $this->cpass = isset($arr['password_confirmation'])  ? $this->sanitize_data($arr['password_confirmation']) : "";
           
           if($this->fname == ""){
                $this->errors.= "Your firstname can't be empty <br>";
                $this->saveFlag = false;
           }
           
           if($this->lname == ""){
                $this->errors.= "Your Lastname can't be empty <br>";
                $this->saveFlag = false;
           }
           
           if($this->email == ""){
                $this->errors.= "Your Email can't be empty <br>";
                $this->saveFlag = false;
           }
           
             if(!(filter_var($this->email,FILTER_VALIDATE_EMAIL))){
                $this->errors.= "Your email is not valid <br>";
                $this->saveFlag = false;
           }

           if($this->pass == ""){
                $this->errors.= "Your password can't be empty <br>";
                $this->saveFlag = false;
           }

            if($this->cpass == ""){
                $this->errors.= "Your password can't be empty <br>";
                $this->saveFlag = false;
            }

            if($this->pass != "" && $this->cpass != "" && $this->pass != $this->cpass){
                $this->errors.= "The two passwords must be matched <br>";
                $this->saveFlag = false;
            }

            if($this->saveFlag){
                return $this->saveFlag;
            }else{
                echo"<h3>The following errors were noticed</h3><br>";
                echo $this->errors;
                die();
            }

        }
        else{
            $this->errors = "No data to work with";

            return $this->errors;
        }
    }
    
    public function sanitize_data($value){
    //
         $this->input_val    = trim($value);
         $this->input_val   = stripslashes( $this->input_val);
         $this->input_val   = htmlentities( $this->input_val);
         return  $this->input_val;
    }
    
}

?>