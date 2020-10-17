<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            
        <!------ Include the above in your HEAD tag ---------->
        
       
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!------ Include the above in your HEAD tag ---------->
<?php
include_once("config/config.php");

?>
<style>
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
    a:link{
        text-decoration: none;
    }
    #addnew{
    width: 400px; 
    font-size:30px; 
    border : 1px solid #8000FF; 
    border-radius: 10px;
    text-align: center; 
    margin:0 auto;
     background: black;
     color:white; 
     margin-bottom:20px; 
}
</style>

</head>

<body style="margin-top: 50px; background-color: #77be2d;">
<a href="index.html"><div id="addnew">ADD NEW RECORD</div></a>

<?php

//include_once("config/config.php");
$select_qry = "SELECT * FROM candidate_record WHERE 1=1";
//echo $select_qry; // to debug the query and show errors
$qry_res = mysqli_query($connection,$select_qry);
if($qry_res){
   ?> 
   <div style="height:800px; overflow-x:auto;">
   <table id='student'>
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
            <th>ACTION </th>
                    
        
        </tr>
   <?php     
        while($row = mysqli_fetch_assoc($qry_res)){//retrieving row record one by one
                $id = $row['id'];
                $edit_link =    "edit.php?id={$row['id']}";
                $view_link =    "view.php ?id={$row['id']}" ;
                $delete_link =  "delete.php?id={$row['id']}";
                //$view_link = "view.php?id=$id";
    ?>           
       <!--if(mysqli_num_rows($qry_res) > 0){ -->    
           <tr>
             
              <td><?php echo $row['id']; ?></td>
              <td><?=$row['firstname'] ?></td>
              <td><?=$row['lastname'] ?></td>
              <td><?=$row['birthday'] ?></td>
              <td><?=$row['homenumber'] ?></td>
              <td><?=$row['mobilenumber'] ?></td>
              <td><?=$row['email'] ?></td>
              <td><?=$row['homeaddress'] ?></td>
              <td><?=$row['country'] ?></td>
              <td style="text-align: center;">  
                        
                <a href=" <?=$view_link?>"><i class="fa fa-eye" style="color:#880000; font-size:20px;"></i></a>&nbsp;
                <a href="<?=$edit_link?>"><i class="fa fa-edit" style="color:#880000; font-size:20px;"></i></a>&nbsp;
                <a href="<?=$delete_link?>"><i class="fa fa-trash" style="color:#880000; font-size:20px;"></i></a>
                
           </td>
               
               
                       
            </tr>
            
      
<?php
}
?>
        
    </table>
    </div>
    <?php
    }
    else{
        echo "No record found";
    }
    ?>
</body>
</html>