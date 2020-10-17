<?php

$style = "<style>
#student {
    font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#student td, #student th {
    border: 1px solid #ddd;
    padding: 8px;
    font-size: 18px;
}

#student tr:nth-child(even){background-color: #f2f2f2;}

#student tr:hover {background-color: #ddd;}

#student th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color:#f78908 ;
    /*#4CAF50*/
    color: white;
    font-size: 24px;
}
</style>";


echo "<table id='student'>.$style
  <tr>
    <th>Students</th>
    <th>Maths</th>
    <th>English</th>
    <th>Yoruba</th>
  </tr>";
  echo "<tr>
    <td>Dammy</td>
    <td>40</td>
    <td>60</td>
    <td>60</td>
  </tr>
  <tr>
    <td>Alhaja</td>
    <td>50</td>
    <td>50</td>
    <td>100</td>
  </tr>
  <tr>
    <td>Joy</td>
    <td>60</td>
    <td>40</td>
    <td>45</td>
  </tr>
  <tr>
    <td>Drako</td>
    <td>20</td>
    <td>80</td>
    <td>70</td>
  </tr>
  </table>";
  
  echo "<br>";
  
  echo "The average for the scores of each students are <br>";
  
  function findAverage($a, $b, $c){
    $d= ($a + $b + $c)/3;
    echo $d."<br>";
  }

findAverage(40, 60, 60);
findAverage(50, 50, 100);
findAverage(60, 40, 45);
findAverage(20, 80, 70);

//Find Mean

/*
$numbers = array(40,60,60,50,50,100,60,40,45,20,80,70);
$numlength = count($numbers);



function Mean() {
    $sum = 0;
    for($i = 0; $i <= $numlength; $i++) {
        $sum += $numbers[$i] / $numlength;
    }
    echo $sum;
} 
*/

//Find Mean

echo "<br>";

$numbers = 40+60+60+50+50+100+60+40+45+20+80+70;
//$numlent= count($numbers);
$total = ($numbers)/12;

echo "The mean is".  $total."<br>";
echo "<br>";

//Median
function Middle(){ 
    
    $med = array(40,60,60,50,50,100,60,40,45,20,80,70);
    sort($med);
    $count = count($med);
    if ($count%2==0){
        
        $one = $count/2;
        $two = $one-1;
        $tree = $one + $two;
        $four = $tree/2;
        
        echo $med[$four];
    }
    else{
        if ($count%2!==0){
        $six = $count/2;
        $fin = $six - 0.5;
        
        echo $med[$fin];
        }
    }
        
}
Middle(); 
echo "<br>";
echo "<br>";

//More than grade B

/*$names = array("Dammy", "Alhaja", "Joy", "Drako");
$scores = array (
  array(40,60,60),
  array(50,50,100),
  array(60,40,45),
  array(20,80,70)
); 

    function highestValue($scores) {
       foreach($scores as $key => $value) {
           if ($value > 69) {
               $scores[$key] = highestValue($value);
           }
       }

          $scores;
    }

   echo highestValue($scores); //1155
 */
$names = array("Dammy", "Alhaja", "Joy", "Drako");
$numbers = array(
    "Dammy" => array(
    "maths" => 40,
    "english" => 60,
    "yoruba" => 60
  ),
    "Alhaja" => array(
    "maths" => 50,
    "english" => 50,
    "yoruba" => 100
  ),
    "Joy" => array(
    "maths" => 60,
    "english" => 40,
    "yoruba" => 45
  ),
  
    "Dare" => array(
    "maths" => 20,
    "english" => 80,
    "yoruba" => 70
  )
);
$b = 0;

foreach ($numbers as $key=>$val){
	foreach($val as $key=>$val1)
	
		if ($val1 > 69){
        echo "Student got ".$val1." in ".$key."<br>";
        //echo "Marks for Joy in Maths:";
        //echo $numbers['Joy']['maths']."<br>";                
    	}
	  	
}

?>