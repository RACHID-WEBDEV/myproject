<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            
        <!------ Include the above in your HEAD tag ---------->
        
       
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"/>


<!------ Include the above in your HEAD tag ---------->
<?php
include_once("config/config.php");

?>
<style>
#sailorTableArea{
    max-height: 500px;
    overflow-x: auto;
    overflow-y: auto;
}
#sailorTable{
    white-space: normal;
}
tbody {
    display:block;
    height:500px;
    overflow:auto;
}
thead{
    background:#880000;
    color:#fff;
}
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
}
#addnew{
    width: 400px; 
    font-size:30px; 
    border : 1px solid #8000FF; 
    border-radius: 10px;
    text-align: center; 
    margin:0 auto; background: 
    black; color:white;  
}
a:link{
    text-decoration: none;
}
</style>
</head>

<body style="margin-top: 100px; background-color: #FF80FF;">

<a href="index.html"><div id="addnew">ADD NEW RECORD</div></a>
<div class="table-responsive" id="sailorTableArea">
    
 <?php
 
 $select_qry = "SELECT * FROM candidate_record WHERE 1=1";
//echo $select_qry; // to debug the query and show errors
 $qry_res = mysqli_query($connection,$select_qry);
 if($qry_res){
 ?><table id="sailorTable" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Birthday</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address.</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
 <?php
 while($row = mysqli_fetch_assoc($qry_res)){
    $id = $row['id'];
    $edit_link = "edit2.php?id=$id";
    $view_link = "view2.php?id=$id";
    $delete_link = "delete.php?id=$id";
    
    
 ?>
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
                
                    <a href="<?=$view_link?>"><i class="fa fa-eye" style="color:#880000; font-size:24px;"></i></a>&nbsp;
                    <a href="<?=$edit_link?>"><i class="fa fa-edit" style="color:#880000; font-size:20px;"></i></a>&nbsp;
                    <a href="<?=$delete_link?>"><i class="fa fa-trash" style="color:#880000; font-size:20px;"></i></a>
                    
                </td>
         </tr>
<?php
}
?>
        </tbody>
    </table>
    <?php
    }
    else{
        echo "No record found";
    }
    ?>
    </div>
</body>
</html>

