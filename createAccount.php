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

<div data-role="page">
<?php

$tbl_name='users'; // Table name 
$newUser=$_POST['username'];
$newEmail=$_POST['email'];
$newPass=$_POST['password']; 
$confirmPass=$_POST['password2']; 

$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147lilithwu', 'ahpobeiw');
mysql_select_db('c_cs147_lilithwu');

if($newPass != $confirmPass){
	
	echo('<div data-role="header"><h1>Error</h1></div><div data-role="content">The passwords you entered do not match. Please enter a new password.<p>');
	//want to make it pause somehow before redirect
	//echo "<meta http-equiv='Refresh' content='0; URL=index.php'>";
	echo ('<p><a href="index.php#signup" data-role="button" data-rel="back">Back</a></div><!--/content-->');
} else {

$sql="SELECT * FROM $tbl_name WHERE username = '$newUser'";
$result = mysql_query($sql);
$count = mysql_num_rows($result);

if($count > 0) {
	echo('<div data-role="header"><h1>Error</h1></div><div data-role="content">The user name you have chosen is taken. Please choose another one.');
	echo ('<p><a href="index.php#signup" data-rel="back" data-role="button">Back</a></div>');
}
else {
	
	$addUser = "INSERT INTO $tbl_name (`username`, `email`, `password`) VALUES('$newUser', 	'$newEmail', '$newPass')";
	mysql_query($addUser);
	
	//autologin user
	$_SESSION['username'] = "$newUser";
	echo "<meta http-equiv='Refresh' content='0; URL=myProfile.php'>";
}
}

?>
</div><!--/content--> 
</div><!--/page--> 
</body>
</html>