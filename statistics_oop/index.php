<?php
include_once('class/statisticsClass.php');
$mean =$median =$mode =$range = 0;
if(isset($_POST['submit'])){
    //echo"someting";
    if(isset($_POST['input_data']) && !empty($_POST['input_data'])){
        $data = explode(",",$_POST['input_data']);
       /* echo"<pre>";
        print_r($data);
        echo"</pre>";*/
    }
    
    
   $getStatData = new statisticsOOP();

    $mean   =   $getStatData->getMean($data);
    $mode   =   $getStatData->getMode($data);
    $median = $getStatData-> getMedian($data);
    $range =  $getStatData -> getRange($data);
    

} 

//


?>
<!DOCTYPE html>
<html>
<head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

<style>
.my-card
{
    position:absolute;
    left:40%;
    top:-20px;
    border-radius:50%;
}
#input-data{
    background-color: #f2f2f2;
    color: #000;
    font-weight:bold;
}
#btn-login{
    background-color: #880000;
    color: #000;
   font-weight:bold;
}
</style>
</head>
<div class="jumbotron">
<div class="row w-100">
<div class="col-md-12">
 <form name="statistics" action="index.php" method="POST">
                        <div class="form-group">
                            <label for="input_data" class="sr-only">Statistical Data</label>
                            <input id="input-data" type="text" name="input_data" id="input_data" class="form-control" 
                            placeholder="Enter 10 digits seperated by comma">
                        </div>
                      
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Click to find Mean, Median, Mode and Range of the data above">
</form>
<div class="row w-100">
<br>
</div>
</div>
</div>
<div class="row w-100">
        <div class="col-md-3">
        
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-plus-circle" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Mean</h4></div>
                <div class="text-info text-center mt-2"><h1><?php if($mean != "") echo $mean; ?>
                  </h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-plus-circle" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Mode</h4></div>
                <div class="text-success text-center mt-2"><h1><?php if($mode != "") echo $mode; ?>
                </h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-plus-circle" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Median</h4></div>
                <div class="text-danger text-center mt-2"><h1><?php if($median != "") echo $median; ?></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-plus-circle" aria-hidden="true"></span></div>
                <div class="text-warning text-center mt-3"><h4>Range</h4></div>
                <div class="text-warning text-center mt-2"><h1><?php if($range != "") echo $range; ?>
                </h1></div>
            </div>
        </div>
     </div>
</div>
</html>
