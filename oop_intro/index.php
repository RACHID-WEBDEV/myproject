<?php
require_once ("class/person_class.php");

$first_student = new person();
$first_student -> hand = "long hand";
 echo $first_student -> eating($first_student-> hand)."<br/>";
 
 $second_student = new person();
$second_student -> hand = "short hand";
 echo $second_student  -> eating($second_student -> hand);
 
 $somebody_one = new person2("Yaq", "Raheem", "Adesola");
echo $somebody_one->getfullname();


?>