<?php
//db name
//db user
//db password
//db host
define("dbname","sample_db");
define("password","");
define("user","root");
define("host","localhost");
 $connection = mysqli_connect(host,user,password,dbname);
 if($connection){
    return $connection;
 }
 else{
    echo "Connection could not be established".mysqli_error($connection);die();
 }



?>