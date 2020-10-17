<?php

$all_students = array(
                    "Yaqub" => array(
                                "Age" => 28,
                                "color" => "black",
                                "gender" => "male"
                              ),
                    "Alhaja" => array(
                                "Age" => 30,
                                "color" => "black",
                                "gender" => "female"
                              ),
                    "Joy" => array(
                                "Age" => 20,
                                "color" => "black",
                                "gender" => "female"
                              ),
                    "Dare" => array(
                            "Age" => 27,
                            "color" => "light",
                            "gender" => "male"
                            ),
                    "Dammy" => array(
                                    "Age" => 40,
                                    "color" => "light",
                                    "gender" => "female"
                                  ),
                    "Rasheed" => array(
                                    "Age" => 40,
                                    "color" => "black",
                                    "gender" => "male"
                                  ),
                    "Titi" => array(
                                    "Age" => 20,
                                    "color" => "black",
                                    "gender" => "female"
                                  ),
                  
                    "shukurah" => array(
                                "Age" => 25,
                                "color" => "black",
                                "gender" => "female"
                                ),
                  
                    "saad" => array(
                                "Age" => 28,
                                "color" => "light",
                                "gender" => "male"
                                )
);
$male = 0;
$female=0;
foreach ($all_students as $student_array => $student_name){
   foreach($student_name as $findgender => $locate_gender){
        if($locate_gender == "male"){
           //$male += $student_array;
           $male++;
           
         echo "<b>$student_array</b>"." ". "is a ".($locate_gender)."<br>";
         
       }else{
        if($locate_gender == "female"){
            //$female += $student_array;
           $female++;
            echo($student_array)." " ."is a ".($locate_gender)."<br>";
    }
   }
 }
}
echo "<br>";
echo "<br>";
echo "The Total Number of students that are Males  are "." ". $male ;
echo "<br>";echo "<br>";
echo "The Total Number of students that are Females  are "." ". $female ;

 function group_by( $key,$all_students ){
    $output = array();
    foreach($all_students as $val){
        if(array_key_exists($key,$val)){
            $output[$val[$key]][] = $val;
        }else{
            $output[""] [] = $val;
        }
    }
    return $output;
 }
$byGroup = group_by("gender",$all_students);
echo "<pre>". var_export($byGroup, true). "</pre>";
echo "<br>";
echo "<br>";
?>