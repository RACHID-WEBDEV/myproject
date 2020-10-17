<?php
require_once("./class/facebookoop_process.php");



$id = isset($_GET['id']) && $_GET['id'] != ""? $_GET['id'] : "";

if(isset($_POST['update'])){
           // echo "id is here id = ".$id;die;
    $insertObj = new facebookcrud();
    $insertObj->update($_POST['id'],$_POST);
}



$surname = $firstname =$email = $password = $cpassword = $birthday = $gender = "";
if($id != ""){
   
    $getStatData = new facebookcrud();
    $obj_result = $getStatData->view_one_rec($id);
  //  if($obj_result != ""){
         if(!empty( $obj_result)){
         //
          //print_r($obj_result);
             $id         =  $obj_result['id'];
             $surname    =  $obj_result['surname'];
             $firstname  =  $obj_result['firstname'];
             $email      = $obj_result['email'];
             $password   = $obj_result['password'] ;
             $cpassword  = $obj_result['cpassword'];
             $birthday   = $obj_result['birthday'];
             $gender     = $obj_result['gender'] ;
             $bdate_arr   = explode("/",$birthday);
             $day         = $bdate_arr[0];
             $month       = $bdate_arr[1];
             $year        = $bdate_arr[2];
                    
       }
  //}
    
}
else{
    echo "No valid data to edit";die();
}

?>

<?php





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
	<title>facebook</title>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            
        <!------ Include the above in your HEAD tag ---------->
        
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    
<style>
            body{
            font-family: 'Open Sans', sans-serif;
        }
        .logo i {
        	font-size: 31px;
        	margin-right: 4px;
        	word-spacing: 14px;
        }
        .logo{
        	color: white;
        	margin: 0;
        	font-size: 20px;
        	padding: 4px 0;
        	padding-bottom: 15px;
        
        }
        .login-bottom-text{
        	margin-top: 0px;
        	margin-bottom: 0px;
        	font-size: 12px;
        	color: white;
        	line-height: 19px;
        }
        
        header{
        	background: #3b5998;
        	padding-top: 20px;
        }
        header .form-group{
        	margin-bottom: 0px;
        }
        header .btn-header-login{
        	margin-bottom: 15px;	
        }
        .login-main{
        	margin-top: 30px;
        }
        .multibox{
        	padding-left: 0px;
        	padding-bottom: 10px;
        }
        .login-main span{
        	font-size: 12px;
        } 
        
        
        
        footer hr{
        	margin-top: 0px;
        	padding-top: 0px;
        }
        .footer-options ul{
        	clear: both;
        	padding: 0px;
        	margin: 0px;
        }
        .footer-options ul li{
        	float:left;
        	list-style: none;
        	padding: 5px;
        	font-size: 12px;
        }
        .footer-options ul li a{
        	text-decoration: none;
        	color: #000;
        }
        .copyrights{
        	margin-top: 25px;
        }
    #wrap{
background-image: -ms-linear-gradient(top, #FFFFFF 0%, #D3D8E8 100%);
/* Mozilla Firefox */ 
background-image: -moz-linear-gradient(top, #FFFFFF 0%, #D3D8E8 100%);
/* Opera */ 
background-image: -o-linear-gradient(top, #FFFFFF 0%, #D3D8E8 100%);
/* Webkit (Safari/Chrome 10) */ 
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #FFFFFF), color-stop(1, #D3D8E8));
/* Webkit (Chrome 11+) */ 
background-image: -webkit-linear-gradient(top, #FFFFFF 0%, #D3D8E8 100%);
/* W3C Markup, IE10 Release Preview */ 
background-image: linear-gradient(to bottom, #FFFFFF 0%, #D3D8E8 100%);
background-repeat: no-repeat;
background-attachment: fixed;
}
legend{
	color:#141823;
	font-size:25px;
	font-weight:bold;
}
.signup-btn {
  background: #79bc64;
  background-image: -webkit-linear-gradient(top, #79bc64, #578843);
  background-image: -moz-linear-gradient(top, #79bc64, #578843);
  background-image: -ms-linear-gradient(top, #79bc64, #578843);
  background-image: -o-linear-gradient(top, #79bc64, #578843);
  background-image: linear-gradient(to bottom, #79bc64, #578843);
  -webkit-border-radius: 4;
  -moz-border-radius: 4;
  border-radius: 4px;
  text-shadow: 0px 1px 0px #898a88;
  -webkit-box-shadow: 0px 0px 0px #a4e388;
  -moz-box-shadow: 0px 0px 0px #a4e388;
  box-shadow: 0px 0px 0px #a4e388;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  border: solid #3b6e22  1px;
  text-decoration: none;
}

.signup-btn:hover {
  background: #79bc64;
  background-image: -webkit-linear-gradient(top, #79bc64, #5e7056);
  background-image: -moz-linear-gradient(top, #79bc64, #5e7056);
  background-image: -ms-linear-gradient(top, #79bc64, #5e7056);
  background-image: -o-linear-gradient(top, #79bc64, #5e7056);
  background-image: linear-gradient(to bottom, #79bc64, #5e7056);
  text-decoration: none;
}
.navbar-default .navbar-brand{
		color:#fff;
		font-size:30px;
		font-weight:bold;
	}
.form .form-control { margin-bottom: 10px; }
@media (min-width:768px) {
	#home{
		margin-top:50px;
	}
	#home .slogan{
		color: #0e385f;
		line-height: 29px;
		font-weight:bold;
	}
}
      #text{
                color: #0e385f;
                font-size: 18px;
                font-weight: bold;
                line-height: 20px;
                
                width: 450px;
                
            }
             #logo2{
                width: 500px;
                height: 400px;
                align-self: center;
                
            }  

</style>
</head>
<body>
<header>
    <div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="logo"><img src="img/fb_logo.jpg" alt="fb_logo" id="logo"></div>
		</div>
		<div class="col-sm-6 hidden-xs">
			<div class="row">
				<div class="col-sm-5">
					  <div class="form-group">
					    <input type="text" class="form-control" placeholder="Email Address">
					    <div class="login-bottom-text checkbox hidden-sm">
						    <label>
						      <input type="checkbox" id="">
						      Keep me sign in
						    </label>
						  </div>
					  </div>
				</div>	
				<div class="col-sm-5">
					 <div class="form-group">
					    <input type="text" class="form-control" placeholder="Password">

					    <div class="login-bottom-text hidden-sm"> Forgot your password?  </div>
					  </div>
				</div>
				<div class="col-sm-2">
					 <div class="form-group">
					    <input type="button" value="login" class="form-control">
					  </div>
				</div>
			</div>	
		</div>
	</div>
	</div>
</header>
<article style="background-color: #ECEEF5;"class="container">
 <form action="edit_rec.php" method="post">
		<div class="row">
			<div class="col-sm-5">
				<div class="login-main">
				<div id="text"><h3>Facebook helps you connect and share with the people in your life.</h4></div> 
                   <img src="img/fb.png" alt="fb" id="logo2">
                    
				</div>
			</div>
           
			<div class="col-sm-6">
				<div class="">
				<br />
				<h3><i class="fa fa-shield"></i>Create an account </h3>
                <h5><i class="fa fa-shield"></i>It's quick and easy.</h5>
			  	<hr>
                <div class="form-group input-group">
                <span></span>
                  <input type="hidden" value="<?=$id?>" name="id"/>
				  <input required="" autofocus="" autocomplete="" value="<?=$surname?>" name="surname" type="text" class="form-control" placeholder="Surname"> 
                  <input required="" name="firstname" value="<?=$firstname?>" autocomplete="" type="text" class="form-control" placeholder="Firstname">
                  
				</div>
                <div class="form-group">
				   
				</div>
                
				<div class="form-group">
				   <input required autocomplete="username" autofocus="" value="<?=$email?>" name="email" type="text" class="form-control" placeholder="Mobile Number or Email Address">
				</div>

				<div class="form-group">
				   <input required  name="password" type="text" value="<?=$password?>"class="form-control" placeholder=" Password"/>
				</div>

				<div class="form-group">
				   <input name="cpassword" type="text" value="<?=$cpassword?>" onmouseout="passconfirm_verify()" class="form-control" placeholder="Repeat Password">
				</div>

			<label>BirthDate </label>  
                    <div class="row">
                        <div class="col-xs-4 col-md-4">
                            <select name="day" value="day" class = "form-control input-lg" >
                                 <?php
                    
                                    if($day != ""){  
                                        echo "so n wine mi ni";
                                        echo"<option value='$day'>$day</option>";
                                     }else{
                                      echo"<option value=''>Day</option>";
                                     }
                                    for($i = 1; $i <= 31; $i++){
                                      
                                        echo"<option value='$i'>$i</option>";
                                    }
                                   ?>

                                </select>
                             </div>
                        <div class="col-xs-4 col-md-4">
                            <select name="month"  value="$month" class = "form-control input-lg">
                                <?php
                                 if($month != ""){
                                     $mon_desc = getMonthDesc($month);
                                     echo"<option value='$month'>$mon_desc</option>";
                                  }else{
                                    echo"<option value=''>MONTH</option>";
                                 }
                                 
                                 for($i = 1 ; $i <= 12; $i++){
                                      echo"<option value='$i'>".getMonthDesc($i)."</option>";
                                 }
                                  ?>
                                  
                                  
                                <!--<option value="">Month</option>
                                <option value="1">January</option>
                                <option value="2">Febuary</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>-->
                            </select>   
                        </div>
                        
                        <div class="col-xs-4 col-md-4">
                            <select name="year"  value="$year" class = "form-control input-lg">
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
                        </div>
                    </div>
                    <br />
                    
                     <label>Gender : </label>   
                     <?php
                      $male_flag      = "";
                      $female_flag    = "";
                      $custom_flag    = "";
                    if($gender != ""){
                        
                        if($gender == "Male"){
                            $male_flag = "checked";
                        }
                        
                        if($gender == "Female"){
                            $female_flag = "checked";
                        }
                        
                          if($gender == "Custom"){
                            $custom_flag = "checked";
                        }
                        
                    }
                    
                    
                   ?> 
                        <input type="radio" name="gender" value="Male" <?=$male_flag?>  id=male />                        Male
   
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="Female" <?=$female_flag?> id=female />                        Female
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="Custom" <?=$custom_flag?> id=others />                        Custom
                    </label>
                    <br />
                    
                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="update">
                        Update my account</button>
                        <br />
                    
                <span class="help-block">By clicking Create my account, you agree to our  <span style="color: #0000ff;">Terms. Data policy</span>  and<br> <span style="color: #0000ff;">Cookies policy</span> . You may receive SMS Notivications from us and<br> can opt out at any time.</p>
                        </span>
                    
                                 <p style="font-size: 14px;">create a page for a celebrity, band or business</p>
	 
				<div style="height:10px;"></div>
				<div class="form-group">
				  <label class="control-label" for="">
                    <button class="btn btn-lg btn-primary btn-block signup-btn" >SignUp</button>
                     
                  </label>
				  
				</div>	 
                      
          </div>
    </div> 
         
</div>
</div>
				

				  </div>
			</div>
			</div>
		</div>
       </form> 
</article>
<footer class="container">
<hr>
<div class="footer-options">
  <footer>
            <center><p style="font-size: 12px; line-height: 30px; " > <a href="#" ><ins>English (UK) Hausa Français (France) Português (Brasil) Español ??????? Bahasa Indonesia Deutsch ??? Italiano ?????? </ins><br>
            Sign Up Log In Messenger FacebookLite Watch People Pages Page categories Places Games Locations Marketplace Groups Instagram <br>Local Fundraisers Services About Create adCreate Page Developers Careers Privacy Cookies AdChoices Terms Help Settings Activity log<br><br>
            <small class="copyrights"> © RACHID Copyrights reserved  2020</small></a></p></center>
        </footer>
</div>
<div style="clear:both"></div>

</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
