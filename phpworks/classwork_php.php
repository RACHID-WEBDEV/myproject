<?php
//QUESTION 
// Evaluate the following
//if x= 5; y =3; z = 2;
//Q1  (pow($x,2))/$y * ((2* $x*$y) /(sqrt(pow($y,3) )));

//Q2 pow($x,2) * (pow($y,2) + 2) - $z *(pow $x,3 + $z);

// Q3 find the multiple of 3 in 25- 120 using a function  and count it together

// question 3

function Getmultiples($x,$y){
    $count= 0;
    for($i = $x; $i <=$y; $i++){
        
        if($i%3 == 0){
               
            echo"The Multiples of 3 are". $i . "<br>";
                //echo = $i++."<br>";
            $count = $count + $i;
        }
           
    }
    echo $count;
}
Getmultiples(25,120);

echo "<br>";
echo "<br>";
//question 2

 $x = 5;
$y = 3;
$z = 2;

$a =( pow($x,2) * (pow($y,2) + 2));
$b =($z * (pow ($x,3) + $z));
 
 $total= $a - $b;
 echo $total;
 
 
 echo "<br>";
 echo "<br>";

  //$ question 1
  
 $x = 5;
$y = 3;
$z = 2;

$a = (pow($x,2)/ $y);

$b = (2* $x*$z)/ sqrt(pow($y,3));
  
 $getanswer = $a * $b ;
echo$getanswer

?>