<?php

include_once("config/config.php");
$select_qry = "SELECT * FROM sample_table WHERE 1=1";
echo $select_qry;
$qry_res = mysqli_query($connection,$select_qry);

if($qry_res){
    if(mysqli_num_rows($qry_res) > 0){//Checking if rows were fetched
        echo "<table>
        <tr>
            <th>S/N</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Servics</th>
            <th>Comment</th>        
        
        </tr>";
        while($row = mysqli_fetch_assoc($qry_res)){//retrieving row record one by one
             echo
             " <tr>
             
              <td>{$row['id']}</td>
              <td>{$row['fullname']}</td>
              <td>{$row['email']}</td>
              <td>{$row['phone']}</td>
              <td>{$row['services']}</td>
              <td>{$row['comment']}</td>
                       
            </tr>";
            
        
        }
        echo"</table>";
    }
 }  

?>