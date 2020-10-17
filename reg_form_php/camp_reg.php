<?php
ini_set("display_errors",1);
error_reporting(0);

include_once("config/config.php");
function sanitiize_inputs($formfiled){
    $data = trim($formfiled);
    $data = htmlentities($data);
    $data = stripslashes($data);
    return $data;
}
if(isset($_POST['submit'])){
   
   $firstname  = isset($_POST['firstname'])      ?   sanitiize_inputs($_POST['firstname'])         : "";
   $lastname   = isset($_POST['lastname'])       ?   sanitiize_inputs($_POST['lastname'])          : "";
   $day        = isset($_POST['day'])            ?   sanitiize_inputs($_POST['day'])               : "";
   $month      = isset($_POST['month'])          ?   sanitiize_inputs($_POST['month'])             : "";
   $year       = isset($_POST['year'])           ?   sanitiize_inputs($_POST['year'])              : "";
   $areacode   = isset($_POST['areacode'])       ?   sanitiize_inputs($_POST['areacode'])          : "";
   $phonenumber= isset($_POST['phonenumber'])    ?   sanitiize_inputs($_POST['phonenumber'])       : "";
   $mobilenumber= isset($_POST['mobilenumber'])  ?   sanitiize_inputs($_POST['mobilenumber'])      : "";
   $email      = isset($_POST['email'])          ?   sanitiize_inputs($_POST['email'])             : "";
   $homeaddress= isset($_POST['homeaddress'])    ?   sanitiize_inputs($_POST['homeaddress'])       : "";
   $country    = isset($_POST['country'])        ?   sanitiize_inputs($_POST['country'])           : "";

    $errors = "";
    $safeFlag = true;
     
   // $birtdaycheck = getdate();
  //  $birthyear = date("Y");
   // $birthage = 
    //$mydate=getdate();
    //echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
    
    if($firstname== ''){
        $errors.= 'Please input your firstname <br>';
        $safeFlag = false;
    }
    if($lastname== ''){
        $errors.= 'Please input your lastname <br>';
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
                                     
    if($areacode== ''){
        $errors.= 'Areacode must not be Empty! <br>';
        $safeFlag = false;
    }
    if($areacode != +234){
        $errors.= 'Areacode must be +234 <br>';
        $safeFlag = false;
    }
    if($phonenumber== ''){
        $errors.= 'input your home phone number<br>';
         $safeFlag = false;
     } 
 if(strlen("$phonenumber") != 10 ){
         $errors.= 'your Home Address phone number must not be less than 13 digit number<br>';
         $safeFlag = false;
    } 
 if(!(filter_var($phonenumber,FILTER_SANITIZE_NUMBER_INT))){
            $errors.= 'your Home Address phone Number must be an Integer number <br>';
        $safeFlag = false;
    } 
    /*if ((substr ($_POST ['phonenumber'],0,3) !=234)){
            echo "sorry your Phonenumber must start with 234 <br>" ;
        }*/
    if ((substr("$phonenumber",0,1))== 0){
         $errors.= 'please remove the Zero(0) in front of your Home Address phone number<br>';
        $safeFlag = false;
    }
    
    if($mobilenumber== ''){
        $errors.= 'input your Mobile number<br>';
         $safeFlag = false;
          
  }
   if((strlen("$mobilenumber")) != 10){
         $errors.= 'your Mobile number must not be less than 13 digit number<br>';
         $safeFlag = false;
    }
 
 if ((substr("$mobilenumber",0,1))== 0){
         $errors.= 'please remove the Zero(0) in front of your Mobile number<br>';
        $safeFlag = false;
    }
  if(!(filter_var($mobilenumber,FILTER_SANITIZE_NUMBER_INT))){
            $errors.= 'your Mobile Number must be an Integer Number <br>';
        $safeFlag = false;
    }
  if($phonenumber == $mobilenumber){
    $errors.= "Numbers summited for Home phone Number and Mobile number  must not be the same <br>";
    $safeFlag = false;
  }
    if($email == ''){
       $errors.= 'Please input your Email Address <br>';
        $safeFlag = false;
    }
    if($homeaddress== ''){
        $errors.= 'input your Home Address<br>';
        $safeFlag = false;
    }
    if($country== ''){
        $errors.= 'select your Country <br>';
        $safeFlag = false;
    }
    if($country != "Nigeria"){
       $errors.= "OOps! sorry Only Nigeria citizen is needed here <br/>";
        $safeFlag = false;
    }
    
    
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors.= "Invalid email format<br>";
      $safeFlag = false;
    }
    
    if((str_word_count($firstname)!= 1)){
        $errors.= "input only your Firstname <br>";
         $safeFlag = false;
    } 
    if((str_word_count($lastname)!= 1)){
        $errors.= "input only your Lastname <br>";
         $safeFlag = false;
    } 

     $matchfirstname = (explode(" ",$firstname,1));
     $matchlastname = (explode(" ",$lastname,1));
    //echo($matchfirstname) ;
    
      if(!(preg_match("/{$matchfirstname[0]}/i",$email )  && ! preg_match ("/{ $matchlastname [0]}/i",$email))){
       $errors.= "Email input doesn't match with your name <br>";
       
         $safeFlag = false; 
     } 
      
     
    if($safeFlag){
        //die("It is now safe to save into DB");
         $insert_qry = "INSERT INTO candidate_record (firstname, Lastname, birthday, homenumber, mobilenumber, email, homeaddress, country)
                                                VALUES('$firstname','$lastname','$day/$month/$year','$areacode$phonenumber','$areacode$mobilenumber','$email','$homeaddress','$country')";
         // echo $insert_qry;  // to debug query                          
       $qry_result = mysqli_query($connection,$insert_qry);
       echo $qry_result;
       if(mysqli_affected_rows($connection) > 0){
            echo "Record saved successfully!";
            echo header('Refresh: 1; url=readme3.php');
       }
    }
    else{
        echo "<div style='background-color:red '><h3 style='color:white'>Please correct the following errors before submission</h3>$errors</div>" ;
    }
}

//EDIT/ UPDATE CODES START HERE!

if(isset($_POST['update'])){
  /* echo"i am here<pre>";
    print_r($_POST['update']);
    echo"</pre>";die("stop");*/
      
   $firstname  = isset($_POST['firstname'])      ?   sanitiize_inputs($_POST['firstname'])         : "";
   $lastname   = isset($_POST['lastname'])       ?   sanitiize_inputs($_POST['lastname'])          : "";
   $day        = isset($_POST['day'])            ?   sanitiize_inputs($_POST['day'])               : "";
   $month      = isset($_POST['month'])          ?   sanitiize_inputs($_POST['month'])             : "";
   $year       = isset($_POST['year'])           ?   sanitiize_inputs($_POST['year'])              : "";
   $areacode   = isset($_POST['areacode'])       ?   sanitiize_inputs($_POST['areacode'])          : "";
   $phonenumber= isset($_POST['phonenumber'])    ?   sanitiize_inputs($_POST['phonenumber'])       : "";
   $mobilenumber= isset($_POST['mobilenumber'])  ?   sanitiize_inputs($_POST['mobilenumber'])      : "";
   $email      = isset($_POST['email'])          ?   sanitiize_inputs($_POST['email'])             : "";
   $homeaddress= isset($_POST['homeaddress'])    ?   sanitiize_inputs($_POST['homeaddress'])       : "";
   $country    = isset($_POST['country'])        ?   sanitiize_inputs($_POST['country'])           : "";

    $errors = "";
    $safeFlag = true;
     
   // $birtdaycheck = getdate();
  //  $birthyear = date("Y");
   // $birthage = 
    //$mydate=getdate();
    //echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
    
    if($firstname== ''){
        $errors.= 'Please input your firstname <br>';
        $safeFlag = false;
    }
    if($lastname== ''){
        $errors.= 'Please input your lastname <br>';
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
                                     
    if($areacode== ''){
        $errors.= 'Areacode must not be Empty! <br>';
        $safeFlag = false;
    }
    if($areacode != +234){
        $errors.= 'Areacode must be +234 <br>';
        $safeFlag = false;
    }
    if($phonenumber== ''){
        $errors.= 'input your home phone number<br>';
         $safeFlag = false;
     } 
 if(strlen("$phonenumber") != 10 ){
         $errors.= 'your Home Address phone number must not be less than 13 digit number<br>';
         $safeFlag = false;
    } 
 if(!(filter_var($phonenumber,FILTER_SANITIZE_NUMBER_INT))){
            $errors.= 'your Home Address phone Number must be an Integer number <br>';
        $safeFlag = false;
    } 
    /*if ((substr ($_POST ['phonenumber'],0,3) !=234)){
            echo "sorry your Phonenumber must start with 234 <br>" ;
        }*/
    if ((substr("$phonenumber",0,1))== 0){
         $errors.= 'please remove the Zero(0) in front of your Home Address phone number<br>';
        $safeFlag = false;
    }
    
    if($mobilenumber== ''){
        $errors.= 'input your Mobile number<br>';
         $safeFlag = false;
          
  }
   if((strlen("$mobilenumber")) != 10){
         $errors.= 'your Mobile number must not be less than 13 digit number<br>';
         $safeFlag = false;
    }
 
 if ((substr("$mobilenumber",0,1))== 0){
         $errors.= 'please remove the Zero(0) in front of your Mobile number<br>';
        $safeFlag = false;
    }
  if(!(filter_var($mobilenumber,FILTER_SANITIZE_NUMBER_INT))){
            $errors.= 'your Mobile Number must be an Integer Number <br>';
        $safeFlag = false;
    }
  if($phonenumber == $mobilenumber){
    $errors.= "Numbers summited for Home phone Number and Mobile number  must not be the same <br>";
    $safeFlag = false;
  }
    if($email == ''){
       $errors.= 'Please input your Email Address <br>';
        $safeFlag = false;
    }
    if($homeaddress== ''){
        $errors.= 'input your Home Address<br>';
        $safeFlag = false;
    }
    if($country== ''){
        $errors.= 'select your Country <br>';
        $safeFlag = false;
    }
    if($country != "Nigeria"){
       $errors.= "OOps! sorry Only Nigeria citizen is needed here <br/>";
        $safeFlag = false;
    }
    
    
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors.= "Invalid email format<br>";
      $safeFlag = false;
    }
    
    if((str_word_count($firstname)!= 1)){
        $errors.= "input only your Firstname <br>";
         $safeFlag = false;
    } 
    if((str_word_count($lastname)!= 1)){
        $errors.= "input only your Lastname <br>";
         $safeFlag = false;
    } 

     $matchfirstname = (explode(" ",$firstname,1));
     $matchlastname = (explode(" ",$lastname,1));
    //echo($matchfirstname) ;
    
      if(!(preg_match("/{$matchfirstname[0]}/i",$email )  && ! preg_match ("/{ $matchlastname [0]}/i",$email))){
       $errors.= "Email input doesn't match with your name <br>";
       
         $safeFlag = false; 
     } 
      
     
    if($safeFlag){
        //die("It is now safe to save into DB");
         
    $update_qry = "UPDATE candidate_record SET
               firstname   ='$firstname',
               Lastname   ='$lastname',
               birthday    ='$day/$month/$year',
               homenumber  ='$areacode$phonenumber',
               mobilenumber  ='$areacode$mobilenumber',
               email        = '$email',
               homeaddress  ='$homeaddress',
               country    ='$country'
               
            WHERE  id  =".$id;
    // echo $update_qry;
     $update_recs = mysqli_query($connection,$update_qry);
     if(mysqli_affected_rows($connection) >0){
        echo"<script>alert('Record successfully updated')</script>";
        header('Refresh: 1; url=readme2.php');
     }else{
        echo"Record not updated Try Again later".mysqli_error($connection);
     }
    }
    else{
        echo "<div style='background-color:red '><h3 style='color:white'>Please correct the following errors before submission</h3>$errors</div>" ;
    }
   
   
   
   
   
   
   
   

}



?>