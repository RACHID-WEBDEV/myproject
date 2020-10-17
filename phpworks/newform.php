<?php

/*echo"<pre>";
print_r($_POST);
echo"</pre>";*/
function sanitiize_inputs($formfiled){
    $data = trim($formfiled);
    $data = htmlentities($data);
    $data = stripslashes($data);
    return $data;
      }
    
if(isset($_POST['submit'])){
   $name      =     isset($_POST['name'])       ? sanitiize_inputs($_POST['name'])               : "";
   $email     =     isset($_POST['email'])      ? sanitiize_inputs($_POST['email'])              : "";
   $username  =     isset($_POST['username'])   ? sanitiize_inputs($_POST['username'])           : "";
   $password  =     isset($_POST['password'])   ? sanitiize_inputs($_POST['password'])           : "";
   $confirm   =     isset($_POST['confirm'])    ? sanitiize_inputs($_POST['confirm'])            : "";
  
     $errors = "";
    $safeFlag = true;
    
    /*if($comments == ''){
         $errors.=  'Pls write a comment <br>';
         $safeFlag = false;
    }*/
    //name check
    if($name== ""){
        echo "name must not be empty <br>";
       $safeFlag = false;
    } 
    //emailname check
    if($email== ""){
        echo "email must not be empty <br>";
      $safeFlag = false;
    } 
    //username check           
    if($username == ""){
        echo "username must not be empty <br>";
      $safeFlag = false;
    } 
    //password check    
    if($password == ""){
        echo "password must  not be empty <br>";
      $safeFlag = false;
    }
    //confirm check
    if($confirm == ""){
        echo "kindly Confirm your password <br>";
      $safeFlag = false;   
    } 
    //valid email
   if($email != ""){
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "Email is not valid<br>";
             $safeFlag = false;
        }
    }  
    
     if((substr($email, -10) != '@gmail.com')){
            echo "Input a valid Gmail<br>";
             $safeFlag = false;
        }
    
    //confirm  password to the same
    if($password != $_POST['confirm']){
        echo "Your Password must be the same <br>";
         $safeFlag = false;
    }
    
    $uppercase = preg_match('@[A-Z]@', $_POST['password']);
    $lowercase = preg_match('@[a-z]@', $_POST['password']);
    $number    = preg_match('@[0-9]@', $_POST['password']);
    $specialChars = preg_match('@[^\w]@',$_POST['password']);
    

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.<br/>';
    
         $safeFlag = false;
    }
    
    
    if($safeFlag){
        die("It is now safe to save into DB <br/>");
    }
    else{
        echo "<div style='background-color:red '><h3 style='color:white'>Please correct the following errors before submission</h3>$errors</div>" ;
    }
    
}

  
?>