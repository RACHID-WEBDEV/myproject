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
    background-color: #4CAF50;
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


echo "<br>";

$numbers = 40+60+60+50+50+100+60+40+45+20+80+70;
//$numlent= count($numbers);
$total = ($numbers)/12;

echo "The Mean is" . $total."<br>";
echo "<br>";

//Median
function Median(){ 
    
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
echo "The Median is".Median();
; 

echo "<br>";
echo "<br>";


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
                    "english" => 90,
                    "yoruba" => 85
                  ),
  
       "Dare" => array(
                "maths" => 90,
                "english" => 70,
                "yoruba" => 60
                )
);
//$b = 0;
$student_with_grade_greater_than_b =  array();
foreach ($numbers as $student_name  => $student_scores){
    //print_r($student_scores);die;
    $x = 0;
	foreach($student_scores as $score){
	   if($score> 69){
	       $x++;
	   }
        if($x >= 2){
           array_push($student_with_grade_greater_than_b,$student_name);
           break;
        }
	}
	  	
}
//print_r($student_with_grade_greater_than_b);
if(!empty($student_with_grade_greater_than_b)){
    echo "<br>";
    foreach($student_with_grade_greater_than_b as $student){
        echo $student." got more than B grade in two subjects<br/>";
    }
}else{
    echo "No student got more than B grade in 2 subjects";
}
// QUESTION 
echo "<br>";
echo "<br>";


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

$student_with_grade_greater_than_b =  array(
                                             "Dammy" => array(),
                                            "Alhaja" => array(),
                                            "Joy" => array(),
                                            "Dare" => array()
                                            );
foreach ($numbers as $student_name  => $student_scores){
    //print_r($student_scores);die;
    $x = 0;
    $scores_arr = array();
	foreach($student_scores as $score){
	   if($score%3 == 0){
	       array_push($scores_arr,$score);
	       $x++;
	   }
        
        if($x >= 2){
         
           array_push($student_with_grade_greater_than_b[$student_name], $scores_arr);
            if(empty($student_with_grade_greater_than_b[$student_name])){
                  unset($student_with_grade_greater_than_b[$student_name]);
          }
           break;
           
        }
	}
	  	
}
/*echo"<pre>";
print_r($student_with_grade_greater_than_b);
echo "</pre>";
*/
foreach ($student_with_grade_greater_than_b as $pupil => $mark){
    foreach ( $mark as $vall =>$num){
        foreach ($num as $subj=> $numb){
            echo $pupil . "got". $numb. " which is divisible by 3 <br>";
        }
    }
}



?>