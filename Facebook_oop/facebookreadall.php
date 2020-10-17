<?php
require_once("./class/facebookoop_process.php");
$getStatData = new facebookcrud();
$obj_result = $getStatData->read();
/*echo "<pre>";
print_r($obj_result);
echo "</pre>";die();*/
?>

<!DOCTYPE HTML>
<html>
<head>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            
        <!------ Include the above in your HEAD tag ---------->
        
       

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"/>

	
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"/>


    <meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="lolkittens" />

	<title>Facebook</title>

<style>
.custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
  a.btn:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 a.btn {
     -webkit-transform: scale(0.8);
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }
 .buttonsBlock {
    white-space: nowrap;
}


#student tr:hover {background-color: #ddd;}

</style>
</head>




<body>

<div class="container">
    <div style="overflow-y:auto;" class="col-md-offset-2 custyle">

    <table id="student" class="table table-striped custab">
    <thead>
    <a href="http://localhost/phpfolder/Facebook_oop/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add New User</a>
        <tr >
            <th>ID</th>
            <th>Surname</th>
            <th>Firstname</th>
            <th>Email</th>
            <th>Password</th>
            <th>Confirm Password</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th class="text-center">Action</th>
        </tr>
        
    </thead>
            <?php
            foreach ($obj_result as $output){
                $view_link = "viewone.php?id={$output['id']}";
                $edit_link = "edit_rec.php?id={$output['id']}";
                $delete_link = "deleteoop.php?id={$output['id']}";                 
            ?>
        
            <tr>
                <td><?php echo $output['id']; ?></td>
                <td><?= $output['surname'] ?></td>
                <td><?= $output['firstname'] ?></td>
                <td><?= $output['email'] ?></td>
                <td><?= $output['password'] ?></td>
                <td><?= $output['cpassword'] ?></td>
                <td><?= $output['birthday'] ?></td>
                <td><?= $output['gender'] ?></td>
                <td class="text-center btn-group">
                   <a href=" <?=$view_link?>"><button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button></a>&nbsp;
                   <a href=" <?=$edit_link?>"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button></a>&nbsp;
                   <a href=" <?=$delete_link?>"><button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></a>&nbsp;  
                      
                    
                </td>
                                
            </tr>
            
             <?php
             }
             
             ?>  

        
            
    </table>
    </div>
</div>
 
</body>
</html>
