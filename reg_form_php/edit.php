<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
include_once("config/config.php");
$id = $firstname = $lastname  = $birthday  = $homenumber = $mobilenumber = $email = $homeaddress = $country = "";

$day = "";
$month = "";
$year = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
 $select_qry = " SELECT * FROM candidate_record WHERE id =$id " ;
 $result = mysqli_query($connection,$select_qry);
 if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    if(!empty ($row)){
      $id = $row['id'];
      $firstname = $row['firstname']; 
      $lastname = $row['lastname'];
      $birthday = $row['birthday'];
      $homenumber = substr( $row['homenumber'],4);
      $mobilenumber = substr($row['mobilenumber'],4) ;
      $email = $row['email'];
      $homeaddress = $row['homeaddress'];
      $country = $row['country'];
       
        $birthday_arr = explode("/",$birthday);
        $day   = $birthday_arr[0];
        $month = $birthday_arr[1];
        $year  = $birthday_arr[2];
    }
    
 }
}
function getMonthDesc($m=""){
    if($m == 1){
        $desc =  "Jan";
    }
    if($m == 2){
        $desc =  "Feb";
    }
    if($m == 3){
        $desc =  "Mar";
    }
    if($m == 4){
        $desc =  "Apr";
    }
    if($m == 5){
        $desc =  "May";
    }
    if($m == 6){
        $desc =  "Jun";
    }
    if($m == 7){
        $desc =  "Jul";
    }
    if($m == 8){
        $desc =  "Aug";
    }
    if($m == 9){
        $desc =  "Sep";
    }
    if($m == 10){
        $desc =  "Oct";
    }
    if($m == 11){
        $desc =  "Nov";
    }
    if($m == 12){
        $desc =  "Dec";
    }
    
    return $desc;
}

?>

 <!DOCTYPE HTML>
<html>
<head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            
        <!------ Include the above in your HEAD tag ---------->
        
       

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"/>

	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    
	<title> camp registration form </title>
</head>

<body>

<div class="container">
<br>  
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Camp Registration Form</h4>
    <p class="card-title mt-3 text-center"> To Book for a place in the camp, you must complete the form below Accurately</p>
    <br />
 <form action="camp_reg.php" method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="firstname" class="form-control" value="<?=$firstname?>" placeholder="First name" type="text">
        <input name="lastname" class="form-control" value="<?=$lastname?>" placeholder="Last name" type="text">
    </div> <!-- form-group// -->
    
     <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
                <select class="selection-2 form-control" name="day" >
                 
                    <?php
                    
                    if($day != ""){
                        echo"<option value='$day'>$day</option>";
                     }else{
                      echo"<option value=''>DAY</option>"; 
                     }
                    for($i = 1; $i <= 31; $i++){
                        
                        echo"<option value='$i'>$i</option>";
                    }
                    ?>
                 	
                </select>
                <select class="selection-2 form-control" name="month">
                    <?php
                    if($month != ""){
                        $mon_desc = getMonthDesc($month);
                        echo"<option value='$month'>$mon_desc</option>";
                     }else{
                      echo"<option value=''>DAY</option>"; 
                     }
                     ?>
                	<option value="">Month</option>
                	<option value="1">Jan</option>
                	<option value="2">Feb</option>
                	<option value="3">Mar</option>
                	<option value="4">Apr</option>
                	<option value="5">May</option>
                	<option value="6">Jun</option>
                	<option value="7">Jul</option>
                	<option value="8">Aug</option>
                	<option value="9">Sep</option>
                	<option value="10">Oct</option>
                	<option value="11">Nov</option>
                	<option value="12">Dec</option>
                </select>
                
                <select class="selection-2 form-control" name="year">
                
                  <?php
                   if($year != ""){
                        echo"<option value='$year'>$year</option>";
                     }else{
                      echo"<option value=''>Year</option>"; 
                     }
                  for($i = date("Y"); $i >= 1900; $i--){
                        
                        echo"<option value='$i'>$i</option>";
                    }
                  ?>
                </select>
    </div> <!-- form-group// -->
     <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
		</div>
		<select class="selection-2 form-control" name="areacode" style="max-width: 120px;">
            <?php
            if($homenumber != ""){
                $areacode = "+234";
                echo "<option value='$areacode'>$areacode</option>";
            }
            
            ?>
		    <option value="">Area code</option>
		    <option value="+234">+234</option>
		    <option value="+198">"+198"</option>
		    <option value="+501">+501</option>
          </select>
    	<input name="phonenumber" class="form-control" value="<?=$homenumber?>" placeholder=" Home Phone number" type="text">
    </div> <!-- form-group// -->
    
        <!--class="custom-select"-->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="selection-2 form-control" name="areacode" style="max-width: 120px;">
         <?php
            if($mobilenumber != ""){
                $areacode = "+234";
                echo "<option value='$areacode'>$areacode</option>";
            }
            
            ?>
		    <option value="">Area Code</option>
		    <option value="+972">+972</option>
		    <option value="+198">+198</option>
		    <option value="+234">+234</option>
		</select>
    	<input name="mobilenumber" class="form-control" value="<?=$mobilenumber?>" placeholder="Mobile number" type="text">
    </div> <!-- form-group// -->
     <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
         <input name="email" value="<?=$email?>"class="form-control" placeholder="Email address" type="text">
    </div> <!-- form-group// -->
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
		</div>
        <input name="homeaddress" value="<?=$homeaddress?>" class="form-control" placeholder="Home Address" type="text">
    </div> <!-- form-group// -->
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select name="country" class="selection-2 form-control"  > 
        <?php
                    if($country != ""){
                        
                        echo"<option value='$country'>$country</option>";
                     }else{
                      echo"<option value=''>country</option>"; 
                     }?>
			<option  value=""> Select your Coutry</option>
			<option  value="South Africa">South Africa </option>
			<option  value="Nigeria">Nigeria</option>
			<option  value="Canada">Canada</option>
		</select>
	</div> <!-- form-group end.// class=""style="max-width: 120px;"-->
    
                                          
    <div class="form-group">
        <button type="submit" name="submit"  class="btn btn-primary btn-block"> SUMMIT  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have you Register? <a href="readme2.php">View all Registered Candidate</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<br><br>
<article class="bg-secondary mb-3">  

</article>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    
                
</body>
</html>
