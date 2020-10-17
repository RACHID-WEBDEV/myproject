<?php 
function getPerfectSquare($x,$y){  
   for($i = $x; $i <=$y; $i++){
      if(sqrt($i)==(int)sqrt($i)){
            if($i%8 == 0){
           
            echo $i . "<br>";
           }
            
        } 
            
     }
}
  getPerfectSquare(1,100);


echo"<br>";

function findRoots($a, $b, $c) { 
    
    $the_value = $b * $b - 4 * $a * $c; 
    
    $getquadratic = sqrt(abs($the_value)); 
    
  $y =   $getquadratic - $b ;
  $z = -$getquadratic - $b;
  
  $findroot1 = $y /(2* $a);
  $findroot2 = $z / (2* $a);
  
  echo $findroot1;
  echo"<br>";
  echo $findroot2;
  }
findRoots(2, 5, 3); 
 
?> 
