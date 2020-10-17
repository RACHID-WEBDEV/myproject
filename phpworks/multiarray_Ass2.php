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

$student_cat = array("male"=>array(),
                    "female"=>array());
foreach($all_students as $name => $attributes){
        if($attributes["gender"] == "male"){
            array_push($student_cat["male"],$name);
            echo $name. " is a Male"."<br>";
        }else{
            array_push($student_cat["female"],$name);
            echo $name. "is a female<br>";
        }
       
}
 echo "<br>";
echo "The total number of Males in Boldlinks is ".count($student_cat["male"]);
echo "<br>";echo "<br>";

echo "The total number of females in Boldlinks is ".count($student_cat["female"]);
echo "<br>";

echo "<pre>";
print_r($student_cat);
echo "</pre> ";





?>