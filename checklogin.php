<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="images/appicon.png" />
	<link rel="apple-touch-startup-image" href="images/startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	
</head>
<body class="ui-mobile-viewport">

<?php

$host="localhost"; // Host name 
$db_name=""; // Database name 
$tbl_name="users"; // Table name 

$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147lilithwu', 'ahpobeiw');
mysql_select_db('c_cs147_lilithwu');

//get username and password sent from form
$username=$_POST['username']; 
$password=$_POST['password']; 

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched, table row must be 1 row
if($count==1){

// Register and redirect to file "loggedin.php"
$_SESSION['username'] = "$username";
$_SESSION['password'] = "$password";
	/*if(isset($_POST['remember'])){
	      setcookie("cookname", $_SESSION['username'], time()+60*60*24*100, "/");
	      setcookie("cookpass", $_SESSION['password'], time()+60*60*24*100, "/");
	   }*/
	?>
	<meta http-equiv="REFRESH" content="0; URL='myProfile.php'">

<?php
}
else {
?>
<div data-role="page">
<div data-role="header">
<h1>Failed</h1>
</div>
<div data-role="content">
Wrong Username or Password.
<p><a href="index.php" data-role="button" data-ajax="false" data-rel="back">Back</a>
</div>
</div>
<?php
}
?>
</body>
</html>