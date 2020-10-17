<?php

 include_once("./class/facebookoop_process.php");
 
 $id = $_GET['id'] != "" ? $_GET['id'] : "";
 
    $del_user = new facebookcrud();
    
    $delete_rec = $del_user->delete($id);
 
 
 
 ?>