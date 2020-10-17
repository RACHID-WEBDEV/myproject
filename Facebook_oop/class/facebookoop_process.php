<?php

require_once("config.php");

class facebookcrud  extends dbconfig{
    public $surname;
    public $firstname;
    public $email;
    public $password;
    public $cpassword;
    public $day;
    public $month;
    public $year;
    public $gender;
    public $input_value;
    public $insert_qry;
    public $result;
    public $errors = "";
    public $saveFlag = true;
    public $validatesInput;
    public $filterday;
    public $filtermonth;
    public $filteryear; 
    public $select_qry;
    public $qry_res;
    public $row; 
    public $id; 
    public $res_arr ;
    public $query;
    public $recs;
    public $update_qry;
    public $qury_res;
    public $login_qry;
     
    public function __construct(){
        parent::__construct();
    }


    public function Login($email,$password){
        $this->email;
        $this->password;
        $this->login_qry =  "SELECT FROM New_user_records WHERE email = '$email' AND password = '$password'";
        $this->result   = mysqli_query($this->db_connect,$this->login_qry);
             if(mysqli_affected_rows($this->db_connect)> 0){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                     echo "<script type='text/javascript'> 
                        alert('Record saved successfully! (Redirecting in 3 seconds)'); 
                    </script>  
                    " ; 
                echo header('location:http://localhost/Facbook_oop/viewone.php');die();
              
           }else{
            echo "Login not Successful";
           }     
        }
       
    
    public function create($arr){
        
        if($this->validatesInput($arr)){
            $this->insert_qry = "INSERT INTO New_user_records (surname,firstname,email,password,cpassword,birthday,gender)
                                VALUES('$this->surname','$this->firstname','$this->email','$this->password','$this->cpassword','$this->day/$this->month/$this->year','$this->gender')";

            $this->result     = mysqli_query($this->db_connect,$this->insert_qry);
          //  echo $this->result;
          //  echo "we dey here oooo... no shaking";
            if($this->result){
                   echo "<script type='text/javascript'> 
                        alert('Record saved successfully! (Redirecting in 3 seconds)'); 
                    </script>  
                    " ; 
                echo header('Refresh: 2; url=index.php');die();
            }
        };

    }
    public function read(){
         
$this->select_qry = "SELECT * FROM New_user_records WHERE 1=1";

 $this->qry_res = mysqli_query( $this->db_connect,$this->select_qry);
 if(mysqli_affected_rows($this->db_connect)> 0){
    $this->res_arr = array();
    while($this->row = mysqli_fetch_assoc($this->qry_res)){
        
        array_push($this->res_arr,$this->row);

        
    }
    return $this->res_arr;
  }
}
    public function view_one_rec($id){
         $this->id = $id;
         $this->query = "SELECT * FROM  New_user_records WHERE id = '$this->id' ";
         $this->recs  = mysqli_query($this->db_connect,$this->query);
         if(mysqli_affected_rows($this->db_connect)> 0){
            
             while($this->row = mysqli_fetch_assoc($this->recs)){
                
              return $this->row;   
           }     
        }else{
            return "Ooops! No Record Found";
        }
         }
    public function update($id,$arr){
        //
        $this->id = $id;
        if($this->validatesInput($arr)){
            $this->update_qry = "
                                UPDATE New_user_records SET 
                                
                                    surname     = '$this->surname',
                                    firstname   = '$this->firstname',
                                    email       = '$this->email',
                                    password    = '$this->password',
                                    cpassword   = '$this->cpassword',
                                    birthday    = '$this->day/$this->month/$this->year',
                                    gender      = '$this->gender'
                                    
                                WHERE
                                    id          = '$this->id'
                                                          
                                ";
            //echo  $this->update_qry; die();
            $this->result     = mysqli_query($this->db_connect,$this->update_qry);
          //  echo $this->result;
          //  echo "we dey here oooo... no shaking";
            if($this->result){
                echo "<script type='text/javascript'> 
                        alert('Record saved successfully! (Redirecting in 3 seconds)'); 
                    </script>  
                    " ;
                echo header('Refresh: 1; url=../Facebook_oop/facebookreadall.php');die();
            }
        };

    }


    public function delete($id){
         $this->id = $id;
        $this->query = "SELECT FROM New_user_records WHERE id = '$this->id'";
        //echo $this->query;
        $this->recs = mysqli_query($this->db_connect,$this->query);
            /*if(mysqli_affected_rows($this->recs) > 0){
                $this->row = mysqli_fetch_assoc($this->recs);
                  }*/
        $this->query = "DELETE FROM New_user_records WHERE id = '$this->id'";
        $this->recs = mysqli_query($this->db_connect,$this->query);
        if(mysqli_affected_rows($this->db_connect)){
            echo "<script>alert ('Record deleted successfully')</script>";
             header("Refresh: 1 ; url= ../Facebook_oop/facebookreadall.php");die();
            
        }

    }
    public function validatesInput($arr){
        if(is_array($arr) && !empty ($arr)){
            $this->surname = isset($arr['surname'])             ? $this->sanitize_data($arr['surname']) : "";
            $this->firstname = isset($arr['firstname'])         ? $this->sanitize_data($arr['firstname']) : "";
            $this->email = isset($arr['email'])                 ? $this->sanitize_data($arr['email']) : "";
            $this->password = isset($arr['password'])           ? $this->sanitize_data($arr['password']) : "";
            $this->cpassword = isset($arr['cpassword'])         ? $this->sanitize_data($arr['cpassword']) : "";
            $this->day = isset($arr['day'])                     ? $this->sanitize_data($arr['day']) : "";
            $this->month = isset($arr['month'])                 ? $this->sanitize_data($arr['month']) : "";
            $this->year = isset($arr['year'])                   ? $this->sanitize_data($arr['year']) : "";
            $this->gender = isset($arr['gender'])               ? $this->sanitize_data($arr['gender']) : "";

            if($this->surname == ""){
                $this->errors.= "Your Surname can't be empty <br>";
                $this->saveFlag = false;
            }

            if($this->firstname == ""){
                $this->errors.= "Your Firstname can't be empty <br>";
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

            if($this->password == ""){
                $this->errors.= "Your password can't be empty <br>";
                $this->saveFlag = false;
            }

            if($this->cpassword == ""){
                $this->errors.= "Your password can't be empty <br>";
                $this->saveFlag = false;
            }

            if($this->password != "" && $this->cpassword != "" && $this->password != $this->cpassword){
                $this->errors.= "The two passwords must be matched <br>";
                $this->saveFlag = false;
            }
            if($this->day == ""){
                $this->errors.= "Select a Day you're born <br>";
                $this->saveFlag = false;
            }
            if($this->month == ""){
                $this->errors.= "Select a Month you're Born <br>";
                $this->saveFlag = false;
            }
            if($this->year == ""){
                $this->errors.= "Select a Year you're given Birth <br>";
                $this->saveFlag = false;
            }
            if($this->gender == ""){
                $this->errors.= " Kindly Select Your Gender <br>";
                $this->saveFlag = false;
            }
            // validate for age not less than 20 years old to register
         
  
    
     if (($this->filteryear = date('Y') - $this->year) < 20){
            
          $this->errors.= "you are not yet 20 years old you cant apply <br>";
           $this->saveFlag = false;
           }          
           if(($this->filteryear = date('Y') -  $this->year)=== 20){
                if(($this->filtermonth= date('n')) < $this->month){
                    $this->errors.= "Oops! sorry you have month  left to reach 20 years old you cant apply <br>";
                     $this->saveFlag = false; 
                     
                }else if(($this->filtermonth= date('n')) == $this->month){
                    if($this->day > ($this->filterday = date('j'))){

                 $this->errors.="Oops! sorry you have days left to reach 20 years old you cant apply <br>";
                  $this->saveFlag = false;  
                }   
              }
                                         
            }
            
         // Not more than 20 users to should be Able to Sign Up 
         
    $this->select_qry = "SELECT id FROM New_user_records WHERE 1=1";
   $this->qury_res = mysqli_query($this->db_connect, $this->select_qry);
    if( $this->qury_res){
        $i = 0;
        if (mysqli_num_rows($this->qury_res) > 0){
            while(mysqli_fetch_assoc( $this->qury_res)){
                $i++;
            }
            if($i === 10){
               $this->errors.=  "MAXIMUM USER ATTAINED YOU CANT CREATE ACCOUNT TRY YOUR LUCK NEXT TIME<br> ";
               $this->saveFlag  =false;
            }
        }
    }
     //checking if email as already been taken 
     
     $this->select_qry = "SELECT * FROM New_user_records WHERE (email = '$this->email');";
     $select_res = mysqli_query($this->db_connect, $this->select_qry);
        if(mysqli_num_rows($select_res) > 0){
          
          $this->errors = $this->errors . "This email has been taken already <br>";
          $this->saveFlag  = false;
    
           
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

        $this->input_value    = trim($value);
        $this->input_value   = stripslashes( $this->input_value);
        $this->input_value   = htmlentities( $this->input_value);
        return  $this->input_value;
    }

}