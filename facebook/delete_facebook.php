<?php
include_once("config/config.php");
$id = $_GET['id'];
$del_qry = "DELETE FROM new_user WHERE id = $id";//{} string casting can also be used here for $id
$qry_result = mysqli_query($connection, $del_qry);
if (mysqli_affected_rows( $connection)> 0 ){
    echo"<script>alert('USER RECORD DELETED SUCCESSFULLY')</script>";
   
    header("Refresh: 1 ; url=facebookreadall.php");
}else{
    echo " canididates record didn't delete " .mysqli_error($connection);
}


?>