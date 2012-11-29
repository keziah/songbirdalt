<?php session_start();
include("config.php");
?>
<html>

<head>
<title>Adding songs</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script src="js/script.js"></script>
</head>
<body>


<?php
$name = $_POST["projectname"];
$user = $_SESSION['username'];

if (empty($name)) {
	?>
	<meta http-equiv="REFRESH" content="0; URL='createnew.php'">
	<?php
} else {

//Check to see if a project already exists for user with this name
$checkfordouble = "SELECT * FROM projects WHERE username='$user' and projectname='$name'";
$exists = mysql_query($checkfordouble);
$count = mysql_num_rows($exists);
if ($count > 0) { //if there already is one, tack an indicator that this is another one
	$fullname = "".$name."-2";
} else {
	$fullname=$name;
}

$query2 = "INSERT INTO projects (`username`, `projectname`) VALUES ('$user', '$fullname')";
$result2 = mysql_query($query2);

?>

<meta http-equiv="REFRESH" content="0; URL=lyrics.php?projectname=<?php echo "".$fullname."" ?>">

<?php
}

?>
</body>

</html>