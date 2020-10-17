<?php


echo"<pre>";
print_r($_POST);
echo"</pre>";


/*Validation*/
//All fields must be filled
//Email must be valid
//You must be a female
//You must be more thasn 20 years
if(isset($_POST['submit'])){
    
    //Surname check
    if($_POST['Surname'] == ""){
        echo "Surname cannot be empty <br>";
    }
   if ((str_word_count($_POST['Surname']) !=3)){
    echo "Name nust have Firstname, Middlename and Lastname <br>";
   }
   // Phonenumber check
    if($_POST['phonenumber'] == ""){
        echo "Phone number must not be empty <br>";
    }
    
    //Email check
    if($_POST['mail'] == ""){
        echo "Email cannot be empty<br>";
    }
    
      // subject check
    if($_POST['subject'] == ""){
        echo "Subject cannot be empty<br>";
    }
    
      //Gender check
    if($_POST['gender'] == ""){
        echo "Gender cannot be empty<br>";
    }
    
    
      //Age check
    if($_POST['age'] == ""){
        echo "Age cannot be empty<br>";
    }
    
    
      //Comment check
    if($_POST['comment'] == ""){
        echo "Comment cannot be empty<br>";
    }
    
     if($_POST['mail'] != ""){
        if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            echo "Email is not valid<br>";
        }
    }
     
        if(!filter_var($_POST['phonenumber'], FILTER_SANITIZE_NUMBER_INT)) {
            echo "Phone number must be a valid number <br>";
        }
        if ((substr ($_POST ['phonenumber'],0,3) !=234)){
            echo "sorry your Phonenumber must start with 234 <br>" ;
        }
   
    
    
    if($_POST['gender'] != "female"){
        echo "OOps! Only Female is needed here, Oya gbe body e<br>";
    }
    
    
     if($_POST['age'] < 20){
        echo "OOps! Matured minded fellow is needed<br>";
    }
    if((strlen($_POST ['phonenumber'])!=13)){
    echo "sorry Phone Number must be upto 13 Digit <br>";
} 

}


?>