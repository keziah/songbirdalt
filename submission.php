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


<div data-role="header">
		<h1>Project Page</h1>
		<a data-role="button" href="myProfile.php" data-icon="home" data-iconpos="left" class="ui-btn-left" data-ajax="false">Home
        </a>
		
		<a href="#popupMenu" data-rel="popup" data-role="button" data-icon="arrow-d" data-iconpos="right" data-inline="true" data-transition="fade" class="ui-btn-right">Options</a>

	<div data-role="popup" id="popupMenu" data-overlay-theme="c">
    <ul data-role="listview" data-inset="true" style="width:180px;" data-theme="c">
    	<li>Logged in as <?php 
    		echo($_SESSION['username']);?></li> 
       <!-- <li><a data-rel="popup" href="myProfile.php" data-ajax="false">Profile</a></li>-->
       <li><a data-rel="popup" href="createnew.php" data-ajax="false">New Project</a></li>
       <li><a data-rel="popup" href="logout.php" data-ajax="false">Logout</a></li>
         
    </ul>
	</div>
		
	</div>


<?php
$message = $_POST["projectname"];
$user = $_SESSION['username'];

echo "<p>New project name: ".$message."</p>";

$query2 = "insert into projects values ('$user', '$message')";
$result2 = mysql_query($query2);

?>

<meta http-equiv="REFRESH" content="0; URL=project.php?projectname=<?php echo "".$message."" ?>">

<form method="get" action="project.php" data-ajax="false">
    <input type="hidden" name="projectname" value="<?php echo "".$message."" ?>">
    <input type="submit" value="Go to new project">
</form>



</body>

</html>