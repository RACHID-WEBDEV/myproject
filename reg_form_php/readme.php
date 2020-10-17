<?php
$style = "<style>
#student {
    font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#student td, #student th {
    border: 2px solid #ddd;
    padding: 12px;
    font-size: 18px;
}

#student tr:nth-child(even){background-color: #f2f2f2;}

#student tr:hover {background-color: #ddd;}

#student th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #286090;
    color: white;
    font-size: 24px;
}
</style>";



include_once("config/config.php");
$select_qry = "SELECT * FROM candidate_record WHERE 1=1";
//echo $select_qry; // to debug the query and show errors
$qry_res = mysqli_query($connection,$select_qry);

if($qry_res){
    if(mysqli_num_rows($qry_res) > 0){//Checking if rows were fetched
        echo "<table id='student'>.$style
        <tr>
            <th>S/N</th>
            <th>FIRSTNAME</th>
            <th>LASTNAME</th>
            <th>BIRTHDAY</th>
            <th>HOME ADD NUMBER</th>
            <th>MOBILE NUMBER</th>
            <th>EMAIL</th>
            <th>HOME ADDRESS</th>
            <th>COUNTRY</th>
            <th>Action</th>
                    
        
        </tr>";
        while($row = mysqli_fetch_assoc($qry_res)){//retrieving row record one by one
                $edit_link = "edit.php/id={$row['id']}";
                $view_link = "view.php/id={$row['id']}";
                $delete_link = "delete.php/id={$row['id']}";
             echo
             " <tr>
             
              <td>{$row['id']}</td>
              <td>{$row['firstname']}</td>
              <td>{$row['lastname']}</td>
              <td>{$row['birthday']}</td>
              <td>{$row['homenumber']}</td>
              <td>{$row['mobilenumber']}</td>
              <td>{$row['email']}</td>
              <td>{$row['homeaddress']}</td>
              <td>{$row['country']}</td>
              
                       
            </tr>";
            
        
        }
        "</table>";//echo (this echo was here)
    }
 }  



?>