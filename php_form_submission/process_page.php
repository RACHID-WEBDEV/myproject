<?php
function sanitiize_inputs($formfiled){
    $data = trim($formfiled);
    $data = htmlentities($data);
    $data = stripslashes($data);
    return $data;
}
if(isset($_POST['submit'])){
   
   $firstname  = isset($_POST['firstname'])  ? sanitiize_inputs($_POST['firstname'])         : "";
   $lastname  = isset($_POST['lastname'])   ? sanitiize_inputs($_POST['lastname'])           : "";
   $email     = isset($_POST['email'])      ? sanitiize_inputs($_POST['email'])              : "";
   $phone     = isset($_POST['number'])     ? sanitiize_inputs($_POST['number'])             : "";
   $address    = isset($_POST['address'])     ? sanitiize_inputs($_POST['address'])          : "";
   $gender    = isset($_POST['gender'])     ? sanitiize_inputs($_POST['gender'])             : "";
   $comments  = isset($_POST['comment'])    ? sanitiize_inputs($_POST['comment'])            : "";
  
  /* 
   if(trim($_POST['fullname']) && htmlentities($_POST['fullname']) && stripslashes($_POST['fullname'])){
    $fullname = $_POST['fullname'];
   }
   
   if(trim($_POST['email']) && htmlentities($_POST['email']) && stripslashes($_POST['email'])){
    $email = $_POST['email'];
   }
   */
    $errors = "";
    $safeFlag = true;
    
    if($firstname== ''){
       //$errors = $errors. 'Pls input your firstname <br>';
        $errors.= 'Pls input your firstname <br>';
        $safeFlag = false;
    }
    
    if($lastname== ''){
       //$errors = $errors. 'Pls input your firstname <br>';
        $errors.= 'Pls input your lastname <br>';
        $safeFlag = false;
    }
    if($email == ''){
       $errors.= 'Pls input your email address <br>';
        $safeFlag = false;
    }
    
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors.= "Invalid email format<br>";
      $safeFlag = false;
    }
    
    if($phone == ''){
         $errors.= 'Pls input your phone number <br>';
          $safeFlag = false;
    }
    
    if($address == ''){
         $errors.= 'kindly input your Address <br>';
          $safeFlag = false;
    }
    
    if(strlen($phone) != 11){
         $errors.= 'Maximum phone number length must be 11 digits<br>';
          $safeFlag = false;
    }
    
    if($gender == ''){
        $errors.=  'Pls fill in your gender <br>';
        $safeFlag = false;
    }
    
    if($comments == ''){
         $errors.=  'Pls write a comment <br>';
         $safeFlag = false;
    }
    
    if($safeFlag){
        die("It is now safe to save into DB");
    }
    else{
        echo "<div style='background-color:red '><h3 style='color:white'>Please correct the following errors before submission</h3>$errors</div>" ;
    }
    
}


?>