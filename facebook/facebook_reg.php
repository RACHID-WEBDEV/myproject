<?php
//print_r($_POST);
include_once("config/config.php");
function sanitiize_inputs($formfiled){
    $data = trim($formfiled);
    $data = htmlentities($data);
    $data = stripslashes($data);
    return $data;
}
if(isset($_POST['create'])){
   $surname   = isset($_POST['surname'])       ?   sanitiize_inputs($_POST['surname'])          : "";
   $firstname  = isset($_POST['firstname'])      ?   sanitiize_inputs($_POST['firstname'])         : "";
   $email      = isset($_POST['email'])          ?   sanitiize_inputs($_POST['email'])             : "";
   $password   = isset($_POST['password'])       ?   sanitiize_inputs($_POST['password'])          : "";
   $repeatpassword= isset($_POST['repeatpassword'])    ?   sanitiize_inputs($_POST['repeatpassword'])       : "";
   $day        = isset($_POST['day'])            ?   sanitiize_inputs($_POST['day'])               : "";
   $month      = isset($_POST['month'])          ?   sanitiize_inputs($_POST['month'])             : "";
   $year       = isset($_POST['year'])           ?   sanitiize_inputs($_POST['year'])              : "";
   $gender      = isset($_POST['gender'])        ?   sanitiize_inputs($_POST['gender'])      : "";

    $errors = "";
    $safeFlag = true;
    
     if($surname== ''){
        $errors.= 'Please input your Surname <br>';
        $safeFlag = false;
    }
    if((str_word_count($surname)== 2)){
        $errors.= "Enter only your Surname <br>";
         $safeFlag = false;
    } 
    if($firstname== ''){
        $errors.= 'Please input your Firstname <br>';
        $safeFlag = false;
    }
    if((str_word_count($firstname)== 2)){
        $errors.= "Enter only your Firstname <br>";
         $safeFlag = false;
    } 
    if($email != ""){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors.='Email is not valid<br>';
            $safeFlag = false;
        }
    }
    if($email == ''){
       $errors.= 'Please input your Email Address <br>';
        $safeFlag = false;
    }
    if($password == ''){
       $errors.= 'Please input a password <br>';
        $safeFlag = false;
    }
    if($repeatpassword == ''){
       $errors.= 'Please repeat your password <br>';
        $safeFlag = false;
    }
     $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@',  $password);
      $number    = preg_match('@[0-9]@',  $password);
      $specialChars = preg_match('@[^\w]@', $password);
    

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
       $errors.='Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.<br/>';
         $safeFlag = false;
    }
    if($password !== $repeatpassword){
        $errors .= "Oops Your password does not match, please try again!<br/>";
        $saveFlag = false;
    }
    if($day== ''){
        $errors.= 'select the day <br>';
        $safeFlag = false;
    }
    if($month== ''){
        $errors.= 'select the month <br>';
        $safeFlag = false;
    }
    if($year== ''){
        $errors.= 'select the year<br>';
        $safeFlag = false;
    }
    $filterday = date('j');
    $filtermonth = date('n');
    $filteryear = date('Y');
  // $filteryeardiff = date('Y') - $year;
    
     if (($filteryear -  $year) < 20){
            
          $errors.= "you are not yet 20 years old you cant apply <br>";
                 $safeFlag = false;
           }          
           if(($filteryear -  $year)=== 20){
                if($filtermonth <  $month){
                    $errors.= "Oops! sorry you have month  left to reach 20 years old you cant apply <br>";
                     $safeFlag = false; 
                }else if($filtermonth == $month){
                    if($day > $filterday){

                 $errors.="Oops! sorry you have days left to reach 20 years old you cant apply <br>";
                  $safeFlag = false;  
                }   
              }
                                         
            }
            // Not more than 10 users to register
    $selectall_qry = "SELECT id FROM new_user WHERE 1=1";
    $qury_res = mysqli_query($connection,$selectall_qry);
    if($qury_res){
        $i = 0;
        if (mysqli_num_rows($qury_res) > 0){
            while(mysqli_fetch_assoc($qury_res)){
                $i++;
            }
            if($i === 10){
                $errors.=  "MAXIMUM USER ATTAINED YOU CANT CREATE ACCOUNT TRY YOUR LUCK NEXT TIME<br> ";
                $safeFlag =false;
            }
        }
    }
     //checking if email as already been taken 
     $select_qry = "SELECT * FROM  new_user WHERE (email = '$email');";
     $select_res = mysqli_query($connection, $select_qry);
        if(mysqli_num_rows($select_res) > 0){
          
          $errors = $errors . "This email has been taken already <br>";
          $safeFlag = false;
    
           
           }
              
    if($gender == ''){
       $errors.= 'kindly select a Gender <br>';
        $safeFlag = false;
    }
     if($safeFlag){
        $insert_qry = "INSERT INTO new_user(surname,firstname,email,password,repeatpassword,birthday,gender)
                                                VALUES('$surname','$firstname','$email','$password','$repeatpassword','$day/$month/$year','$gender')";
                    echo $insert_qry;                            
       $qry_result = mysqli_query($connection,$insert_qry);
       
       if(mysqli_affected_rows($connection) > 0){
            echo "Record saved successfully!";
             echo header('Refresh: 1; url=read_facebook.php');
       }
       else{
            //echo "qry = $insert_qry<br>";
            echo "<div style='background-color: green'><h3 style='color:white'> Record could not be saved, Try again Later</h3> </div>";
       }
    }
    else{
        echo "<div style='background-color:green '>Please correct the following errors before submission ==>$errors <br/></div>" ;
    }
}


//EDIT / UPDATE CODE START HERE

if(isset($_POST['update'])){
    
   $surname   = isset($_POST['surname'])       ?   sanitiize_inputs($_POST['surname'])          : "";
   $firstname  = isset($_POST['firstname'])      ?   sanitiize_inputs($_POST['firstname'])         : "";
   $email      = isset($_POST['email'])          ?   sanitiize_inputs($_POST['email'])             : "";
   $password   = isset($_POST['password'])       ?   sanitiize_inputs($_POST['password'])          : "";
   $repeatpassword= isset($_POST['repeatpassword'])    ?   sanitiize_inputs($_POST['repeatpassword'])       : "";
   $day        = isset($_POST['day'])            ?   sanitiize_inputs($_POST['day'])               : "";
   $month      = isset($_POST['month'])          ?   sanitiize_inputs($_POST['month'])             : "";
   $year       = isset($_POST['year'])           ?   sanitiize_inputs($_POST['year'])              : "";
   $gender      = isset($_POST['gender'])        ?   sanitiize_inputs($_POST['gender'])      : "";
   $id       = isset($_POST['id'])            ?   sanitiize_inputs($_POST['id'])      : "";
    $errors = "";
    $safeFlag = true;
    
     if($surname== ''){
        $errors.= 'Please input your Surname <br>';
        $safeFlag = false;
    }
    if((str_word_count($surname)== 2)){
        $errors.= "Enter only your Surname <br>";
         $safeFlag = false;
    } 
    if($firstname== ''){
        $errors.= 'Please input your Firstname <br>';
        $safeFlag = false;
    }
    if((str_word_count($firstname)== 2)){
        $errors.= "Enter only your Firstname <br>";
         $safeFlag = false;
    } 
    if($email != ""){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors.='Email is not valid<br>';
            $safeFlag = false;
        }
    }
    if($email == ''){
       $errors.= 'Please input your Email Address <br>';
        $safeFlag = false;
    }
     //checking if email as already been taken 
     $select_qry = "SELECT * FROM  new_user WHERE (email = '$email');";
     $select_res = mysqli_query($connection, $select_qry);
        if(mysqli_num_rows($select_res) > 0){
          
          $errors = $errors . "This email has been taken already <br>";
          $safeFlag = false;
    
           
           }
    if($password == ''){
       $errors.= 'Please input a password <br>';
        $safeFlag = false;
    }
    if($repeatpassword == ''){
       $errors.= 'Please repeat your password <br>';
        $safeFlag = false;
    }
    if($password !== $repeatpassword){
        $errors .= "Oops Your password does not match, please try again!<br/>";
        $safeFlag = false;
    }
      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@',  $password);
      $number    = preg_match('@[0-9]@',  $password);
      $specialChars = preg_match('@[^\w]@', $password);
    

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
       $errors.='Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.<br/>';
         $safeFlag = false;
    }
    
    
    if($day== ''){
        $errors.= 'select the day <br>';
        $safeFlag = false;
    }
    if($month== ''){
        $errors.= 'select the month <br>';
        $safeFlag = false;
    }
    if($year== ''){
        $errors.= 'select the year<br>';
        $safeFlag = false;
    }
     $filterday = date('j');
    $filtermonth = date('n');
    $filteryear = date('Y');
  // $filteryeardiff = date('Y') - $year;
    
     if (($filteryear -  $year) < 20){
            
          $errors.= "you are not yet 20 years old you cant Create an Account <br>";
                 $safeFlag = false;
           }          
           if(($filteryear -  $year)=== 20){
                if($filtermonth <  $month){
                    $errors.= "Oops! sorry you have month  left to reach 20 years old you cant Create an Account<br>";
                     $safeFlag = false; 
                }else if($filtermonth == $month){
                    if($day > $filterday){

                 $errors.="Oops! sorry you have days left to reach 20 years old you cant Create an Account<br>";
                  $safeFlag = false;  
                }   
              }
                                         
            }
    if($gender == ''){
       $errors.= 'kindly select a Gender <br>';
        $safeFlag = false;
    }
     if($safeFlag){
        $update_qry = "UPDATE new_user SET
               surname   ='$surname',
               firstname   ='$firstname',
               email        = '$email',
               password  ='$password',
               repeatpassword ='$repeatpassword',
               birthday    ='$day/$month/$year',
              gender  ='$gender'
              
             
            WHERE id = '$id'";
    //echo $update_qry;die("ssomething is wrong");
     
     $update_recs = mysqli_query($connection,$update_qry);
     if(mysqli_affected_rows($connection) >0){
        echo"<script>alert('Record successfully updated')</script>";
        header('Refresh: 1; url=read_facebook.php');
     }else{
        echo"Record not updated Try Again later".mysqli_error($connection);
     }
    }
    else{
        echo "<div style='background-color:red '><h3 style='color:white'>Please correct the following errors before submission</h3> <br/>$errors </div><br>" ;
    }
}

?>
