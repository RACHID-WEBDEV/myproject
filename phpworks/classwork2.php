<?php
 //ini_set("display_errors", 0);
 //Error_reporting(0);
$x = 0;
$count= 0;
while ( $x <= 20){
    if($x%3 == 0){
                
           
           echo"The Multiples of 3 are". $x . "<br>";
           $count= $count + $x."<br>";
        }
      $x++."<br>";
}
echo $count;
    echo "<br>";
    echo "<br>";

// question 2
 $student = array("Mr Yaqub", "Kafayat", "Joy","Dare","Rasheed","Damilola");
 $letter = "a";
 foreach($student as $student){
    if ( strpos( $student,$letter)== true){
        echo " Congratulation  $student Your name  contain letter with A <br>";
    }
    
 }
 
  echo "<br>";
    echo "<br>";
    
    /// Assignment
    
   $students = ["Mr Raheem Yaqub","Stephen Coder", "Shukuh", "abdulhameed Kafayat Itunu", "Joy Imolega","Lamina Dare"," adeyemo Rasheed Olamide "," alebiosu Damilola"];
   $letter = "/a/i";
    
        for ($i = 0; $i < count($students); $i++){
            //echo " Congratulation ".$students[$i] ."Your name contain <b>" .(preg_match_all($letter, $students[$i]))."</b> letter with A " ."<br/>";
            //echo "<br>";
            if (preg_match_all($letter, $students[$i])){
                echo " Congratulation ".$students[$i] ."Your name contain <b>" .(preg_match_all($letter, $students[$i]))."</b> letter with A " ."<br/>";
                echo "<br>";
            }else{
                echo "Sorry ".$students[$i] ."Your name has <b>" .(preg_match_all($letter, $students[$i]))."</b> letter with A " ."<br/>";
                echo "<br>";
            }
             
            
      }
//substr_count($letter, $students[$i])

?>