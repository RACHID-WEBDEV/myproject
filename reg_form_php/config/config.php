<?php

//db name
//db user
//db password
//db host
define("dbname","camp_registration_db");
define("password","");
define("user","root");
define("host","localhost");
 $connection = mysqli_connect(host,user,password,dbname);
 /*echo "<pre>";
 print_r($connection);
 echo "</pre>";*/
 if($connection){
    return $connection;
 }
 else{
    echo "Connection could not be established".mysqli_error($connection);die();
 }

?>