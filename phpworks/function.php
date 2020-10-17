<?php
/*
    getSI (100,3,2.5);
echo"<br>";
getSI (500,2,1);
/
function getSI ( $p,$r,$t){
    $total = $p * $r * $t;
    $SI = $total / 100;
    echo "the S.I is ". $SI;
}*/
getCount("madam");
echo "<br>";
getCount("tosin");
echo "<br>";
getCount("lool");
echo"<br>";
getCount("peep");
echo"<br>";
getCount("refer");
echo "<br>";
getCount("level");
echo"<br>";
getCount("repaper");
echo("<br>");
getCount("reviver");
echo("<br>");
getCount("radar");
echo("<br>");
getCount("good");
echo("<br>");
function getCount($character){
    echo "The Number of Character is " . strlen($character);
}

function getPallendrium($pallendrium_word){
    if (strrev($pallendrium_word)== $pallendrium_word) {
        echo "$pallendrium_word is pallendrium <br>";
       
    }
    else{
        echo "$pallendrium_word is not a pallendrium <br>";
    }   
}

getPallendrium("madam");
getPallendrium("tosin");
getPallendrium("lool");
getPallendrium("peep");
getPallendrium("reviver");
getPallendrium("refer");
getPallendrium("level");
getPallendrium("repaper");
getPallendrium("radar");
getPallendrium("good");
echo("<br>");
echo("<br>");
/*
if(strrev("madam")== "madam"){
    echo 'madam is pallendrium';
}
else{
  echo 'madam is not pallendrium';  
}
echo("<br>");
if(strrev("tosin")== "tosin"){
    echo 'tosin is pallendrium';
}
else{
  echo 'tosin is not pallendrium';  
}
echo("<br>");
if(strrev("lool")== "lool"){
    echo 'lool is pallendrium';
}
else{
  echo 'lool is not pallendrium';  
}
echo("<br>");
if(strrev("peep")== "peep"){
    echo 'peep is pallendrium';
}
else{
  echo 'peep is not pallendrium';  
}
echo("<br>");
if(strrev("refer")== "refer"){
    echo 'refer is pallendrium';
}
else{
  echo 'refer is not pallendrium';  
}
echo("<br>");
if(strrev("level")== "level"){
    echo 'level is pallendrium';
}
else{
  echo 'level is not pallendrium';  
}
echo("<br>");
if(strrev("repaper")== "repaper"){
    echo 'repaper is pallendrium';
}
else{
  echo 'repaper is not pallendrium';  
}
echo("<br>");
if(strrev("reviver")== "reviver"){
    echo 'reviver is pallendrium';
}
else{
  echo 'reviver is not pallendrium';  
}
echo("<br>");
if(strrev("rader")== "rader"){
    echo 'rader is pallendrium';
}
else{
  echo 'rader is not pallendrium';  
}
echo("<br>");
if(strrev("good")== "good"){
    echo 'good is pallendrium';
}
else{
  echo 'good is not pallendrium';  
}*/
echo"<br>";
echo("<br>");

$checkvowels = "madam";
echo "The number of vowels within  the words is <i>" . preg_match_all('/[aeiou]/i', $checkvowels,$matches)."vowels</i> in the string <b>" . $checkvowels."</b>";
echo("<br>");
$checkvowels = "tosin";
echo "The number of vowels within  the words is <i>" . preg_match_all('/[aeiou]/i', $checkvowels,$matches)."vowels</i> in the string <b>" . $checkvowels."</b>";
echo("<br>");
$checkvowels = "lool";
echo "The number of vowels within  the words is <i>" . preg_match_all('/[aeiou]/i', $checkvowels,$matches)."vowels</i> in the string <b>" . $checkvowels."</b>";
echo("<br>");
$checkvowels = "peep";
echo "The number of vowels within  the words is <i>" . preg_match_all('/[aeiou]/i', $checkvowels,$matches)."vowels</i> in the string <b>" . $checkvowels."</b>";
echo("<br>");
$checkvowels = "refer";
echo "The number of vowels within  the words is <i>" . preg_match_all('/[aeiou]/i', $checkvowels,$matches)."vowels</i> in the string <b>" . $checkvowels."</b>";
echo("<br>");
$checkvowels = "level";
echo "The number of vowels within  the words is <i>" . preg_match_all('/[aeiou]/i', $checkvowels,$matches)."vowels</i> in the string <b>" . $checkvowels."</b>";
echo("<br>");
$checkvowels = "repaper";
echo "The number of vowels within  the words is <i>" . preg_match_all('/[aeiou]/i', $checkvowels,$matches)."vowels</i> in the string <b>" . $checkvowels."</b>";
echo("<br>");
$checkvowels = "reviver";
echo "The number of vowels within  the words is <i>" . preg_match_all('/[aeiou]/i', $checkvowels,$matches)."vowels</i> in the string <b>" . $checkvowels."</b>";
echo("<br>");
$checkvowels = "rader";
echo "The number of vowels within  the words is <i>" . preg_match_all('/[aeiou]/i', $checkvowels,$matches)."vowels</i> in the string <b>" . $checkvowels."</b>";
echo("<br>");
$checkvowels = "good";
echo "The number of vowels within  the words is <i>" . preg_match_all('/[aeiou]/i', $checkvowels,$matches)."vowels</i> in the string <b>" . $checkvowels."</b>";
echo("<br>");
echo("<br>");

echo str_replace("e", "i", "peep");
echo("<br>");
echo str_replace("e", "i", "refer");
echo("<br>");
echo str_replace("e", "i", "level");
echo("<br>");
echo str_replace("e", "i", "repaper");
echo("<br>");
echo str_replace("e","i", "reviver");
echo("<br>");
echo str_replace("e","i", "rader");
echo("<br>");
echo("<br>");

$Sentence = "Let's code it is a youth tech empowerment program from the stables of Boldlinks technology solution. It is a power-pack digital enlightment workshop that positions it participant to take lead in the ever evolving ICT world.
Boldlinks has been transforming lives of young Nigerians with her various IT-training programmes Which has seen many participants benefitted immensely from it in the past. The Let's code it program will expose it participants to basic fundamentals & Intermediate Knowledge of Web Application.
The purpose of this employability training is to tighten up the slack, toughen the body and polish the spirit in such a way that you are well equiped to take up any available project within your reach.";
echo substr_count($Sentence,"Boldlinks");
echo "<br>";
echo substr_count($Sentence,"Let's code" );










?>