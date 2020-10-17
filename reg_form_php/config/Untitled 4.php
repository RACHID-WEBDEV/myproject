<?php
//ini_set("display_errors",0);
//error_reporting(0);
class Validate extends ValidateCore {
public static function isBirthDate($date)
{
if (empty($date) || $date == '0000-00-00')
return false;
if (preg_match('/^([0-9]{4})-((?:0?[1-9])|(?:1[0-2]))-((?:0?[1-9])|(?:[1-2][0-9])|(?:3[01]))([0-9]{2}:[0-9]{2}:[0-9]{2})?$/', $date, $birth_date))
{
if ((floor((time() - strtotime($date))/31556926))<18)
return false;
if ($birth_date[1] > date('Y') && $birth_date[2] > date('m') && $birth_date[3] > date('d'))
return false;
return true;
}
return false;
}
}
// ANOTHER CODE
ini_set("display_errors",0);
error_reporting(0);

// get the users Date of Birth
/*$BirthDay   = '28';
$BirthMonth = '08';
$BirthYear  = '2000';

//convert the users DoB into UNIX timestamp
$stampBirth = mktime(0, 0, 0, $BirthMonth, $BirthDay, $BirthYear);

// fetch the current date (minus 18 years)
$today['day']   = date('d');
$today['month'] = date('m');
$today['year']  = date('Y') - 18;

// generate todays timestamp
$stampToday = mktime(0, 0, 0, $today['month'], $today['day'], $today['year']);

if ($stampBirth <= $stampToday) {
	echo 'User is 18 years or older!';
} else {
	echo 'User is NOT 18 years old, sorry!';
}*/

$today['day']   = date('d');
$today['month'] = date('M');
$today['year']  = date('Y') ;
$test = date("d-M-Y");

// generate todays timestamp
//$stampToday = mktime(0, 0, 0, $today['day'],$today['month'], $today['year']);
//$stampToday = gmmktime(0, 0, 0, $test);
$stampToday = mktime(0, 0, 0, $today['month'], $today['day'], $today['year']);

//ANOTHER CODE
ini_set("display_errors",0);
error_reporting(0);
// PHP program to get the 
// current year 
$day=12;

$month=6;

$annual=1995;

 
$year = date("d-M-Y") - $annual; 

// Display the year 
echo"Current Year is :" .$year; 

echo $stampToday

/*
<!DOCTYPE html>
<html>
  <head>
    <title>Employee Availability Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      line-height: 40px;
      font-size: 40px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px  #cc7a00; 
      }
      .banner {
      position: relative;
      height: 300px;
      background-image: url("/uploads/media/default/0001/02/095995dadd0a1a9d5d83e6a467edf9ef7f35c114.jpeg");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.2); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #cc7a00;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0 #cc7a00;
      color: #cc7a00;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #cc7a00;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .question-answer label {
      display: block;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid #cc7a00;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid #cc7a00;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #cc7a00;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #ff9800;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
  </head>
  <body>
    <div class="testbox">
      <form action="/">
        <div class="banner">
          <h1>Candidate Profile</h1>
        </div>
        <div class="item">
          <label for="name">Name<span>*</span></label>
          <div class="name-item">
            <input id="name" type="text" name="name" placeholder="First" />
            <input type="text" name="name" placeholder="Last" />
          </div>
        </div>
    <div class="item">
          <label for="birthday">Birthday<span>*</span></label>
          <input id="birtday" type="birthday" name="birthdayl"/>
        </div>
<div class="item">
          <label for="name">Phone Numbers<span>*</span></label>
          <div class="name-item">
            <input id="name" type="text" name="phonenumber" placeholder="Home Numbers" />
            <input type="text" name="mobilenumber" placeholder="Mobile Number" />
          </div>
        </div>

        <div class="item">
          <label for="email">Email<span>*</span></label>
          <input id="email" type="email" name="email"/>
        </div>

         
        <div class="item">
          <label >Home Address</label>
          <textarea id="comment" rows="2"></textarea>
        </div>
<div class="item">
          <label l>Country<span>*</span></label>
          <input id="email" type="country" name="countryl"/>
        </div>
       
      </form>
    </div>
  </body>
</html>


*/


/*if(isset($_GET['id'])){
    
}*/

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['address'];
		}
	}


<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("company", $connection); // Selecting Database
//MySQL Query to read data
$query = mysql_query("select * from employee", $connection);
while ($row = mysql_fetch_array($query)) {
echo "<b><a href="readphp.php?id={$row['employee_id']}">{$row['employee_name']}</a></b>";
echo "<br />";
}
?>


/*
<?php
mysql_close($connection); // Closing Connection with Server
?>
*/

<span>Firstname:</span> <?php echo $row['firstname']; ?>
<span>Lastname:</span> <?php echo $row['lastname']; ?>
<span>Birthday:</span> <?php echo $row['birthday']; ?>
<span>Home Address Phone:</span> <?php echo$row['homenumber'] ?>; 
<span>Mobile Number:</span> <?php echo $row['mobilenumber'] ?>;
<span>E-mail:</span> <?php echo $row['email']; ?>
<span>Home Address:</span> <?php echo $row['homeaddress'] ; ?>
<span>Country:</span> <?php echo $row['country']; ?>
</div>
?>