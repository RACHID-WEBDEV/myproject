<?php
include_once("config/config.php");
$id = $_GET['id'];
$del_qry = "DELETE FROM  candidate_record WHERE id = $id";//{} string casting can also be used here for $id
$qry_result = mysqli_query($connection, $del_qry);
if (mysqli_affected_rows( $connection)> 0 ){
    echo "DELETED SUCCESSFULLY";
    header("Refresh: 2 ; url= readme3.php");
}else{
    echo " canididates record didn't delete " .mysqli_error($connection);
}


?>