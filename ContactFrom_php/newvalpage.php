<?php

include_once("config/config.php");
function sanitiize_inputs($formfiled){
    $data = trim($formfiled);
    $data = htmlentities($data);
    $data = stripslashes($data);
    return $data;
}
if(isset($_POST['submit'])){
   
   $firstname  = isset($_POST['firstname'])  ? sanitiize_inputs($_POST['firstname'])         : "";
   $email     = isset($_POST['email'])      ? sanitiize_inputs($_POST['email'])              : "";
   $phone     = isset($_POST['phone'])     ? sanitiize_inputs($_POST['phone'])               : "";
   $service    = isset($_POST['service'])     ? sanitiize_inputs($_POST['service'])          : "";
   $message    = isset($_POST['message'])     ? sanitiize_inputs($_POST['message'])          : "";
   
    $errors = "";
    $safeFlag = true;
    
    if($firstname== ''){
       //$errors = $errors. 'Pls input your firstname <br>';
        $errors.= 'Please input your firstname <br>';
        $safeFlag = false;
    }
    if($email == ''){
       $errors.= 'Please input your email address <br>';
        $safeFlag = false;
    }
    
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors.= "Invalid email format<br>";
      $safeFlag = false;
    }
    if((str_word_count($firstname)!= 2)){
        $errors.= "your name must be Firstname and Lastname <br>";
         $safeFlag = false;
    } 

     $matchname = (explode(" ",$firstname,2));
  
      if(!(preg_match("/{$matchname[0]}/i",$email)  || preg_match("/{$matchname[1]}/i",$email))){
       $errors.= "Email input doesn't match with your name";
       
         $safeFlag = false; 
     }  
  
    if($phone == ''){
         $errors.= 'Pls input your phone number <br>';
          $safeFlag = false;
    }
    if(strlen($phone) != 11){
         $errors.= 'Maximum phone number length must be 11 digits<br>';
          $safeFlag = false;
    }
    if($service == ''){
         $errors.= 'kindly input your Address <br>';
          $safeFlag = false;
    }
    if($service != "Software"){
       $errors.= "OOps! Only software services is needed here <br/>";
        $safeFlag = false;
    }
    if((str_word_count($message)< 20)){
        $errors.= "sorry your Textfield letters must be upto 20 words <br>";
         $safeFlag = false;
    } 
     if($message == ''){
         $errors.=  'Please write a comment <br>';
         $safeFlag = false;
    }
    
    if($safeFlag){
       $insert_qry = "INSERT INTO sample_table (fullname,email,phone,services,comment)
                                                VALUES('$firstname','$email','$phone','$service','$message')";
                                                
       $qry_result = mysqli_query($connection,$insert_qry);
       if(mysqli_affected_rows($connection) > 0){
            echo "Record saved successfully!";
       }
       else{
            //echo "qry = $insert_qry<br>";
            echo "<div style='background-color: green'><h3 style='color:white'> Record could not be saved, Try again Later</h3> </div>";
       }
    }
    else{
        echo "<div style='background-color:green '>Please correct the following errors before submission$errors</div>" ;
    }
    
    
    
    


}
?>