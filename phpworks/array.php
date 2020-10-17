<?php

$cars = array("1st"=> "volvo", "2nd"=>" BMW" , "3rd"=>" Toyoya");
krsort($cars);

foreach($cars as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
echo"<br>";
$cars = array("1st"=> "volvo", "2nd"=>" BMW" , "3rd"=>" Toyoya");
sort($cars);
$clength = count($cars);
for($x = 0; $x < $clength; $x++) {
  echo $cars[$x];
  echo "<br>";
}



?>