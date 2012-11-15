<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="resources/jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="resources/style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="resources/jquery-1.8.2.min.js"></script>
	<script src="resources/jquery.mobile-1.2.0.js"></script>
</head>


<?php
$user = isset($_SESSION['user'])? $_SESSION['user'] : "Songbird";
echo ("<title>".$user."'s Profile"."</title>");
echo ('<a href="">Edit Account Details</a><p>Personal blurb here. Edit blurb should be implemented in-page with Ajax if possible.');
echo('<p>Projects:');
echo('<br>Public projects would show here. Private projects would also show if the user has permission');
echo('<br><a href="project.php">Example Project</a>');

?>
</html>