<?php
session_start();
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
	<title>Songbird</title>
</head>

<body class="ui-mobile-viewport">

<div data-role="page">
<div data-role="header">
	<!--THIS LOGOUT MUST BE ADDED AND EDITED IN ALL PAGES-->
	<h1>Home</h1>
		
	<!--<a href="#popupMenu" data-rel="popup" data-role="button" data-icon="arrow-d" data-iconpos="right" data-inline="true" data-transition="fade" class="ui-btn-right">Options</a>-->

<div data-role="popup" id="popupMenu" data-overlay-theme="c">
    <ul data-role="listview" data-inset="true" style="width:180px;" data-theme="c">
    	<li>Logged in as <?php 
    		echo($_SESSION['username']);?></li> 
        <li><a data-rel="popup" href="myProfile.php" data-ajax="false">Profile</a></li>
        <li><a data-rel="popup" href="#help" data-ajax="false">Help</a></li>
        <li><a data-rel="popup" href="logout.php" data-ajax="false">Logout</a></li>
    </ul>
</div>
</div>


<div data-role="content">
	<div data-role="fieldcontain">
            <fieldset data-role="controlgroup">
            <form id="search" action="search.php" method="post" data-ajax="false">
                <input name="query" id="query" placeholder="Search query" value="" type="search"> 
                <input type="submit" name="submitsearch" value="Search" data-mini="true">
            </form>
            </fieldset>
    </div>

<a href="" style="font-size:8pt;">Advanced Search</a> (not yet implemented)
<p>
<a href="myProfile.php" data-role="button" data-theme="c" data-icon="arrow-r"data-iconpos="right" data-ajax="false">
            My Profile
        </a>
        
<a href="favs.php" data-role="button" data-theme="c" data-icon="arrow-r"data-iconpos="right" data-ajax="false">
            My Favorites
        </a>
<a href="browse.php" data-role="button" data-theme="c" data-icon="arrow-r"data-iconpos="right" data-ajax="false">
            Browse Projects
        </a>
        <a href="createnew.php" data-role="button" data-theme="c" data-icon="arrow-r"data-iconpos="right" data-ajax="false">
            Create New Project
        </a>

<h2>My Projects</h2><br>
Load project list here.
<br><a href="project.php">Example Project</a>

<form method="get" action="project.php">
    <input type="hidden" name="projectname" value="song1">
    <input type="submit" value="Go to new project">
</form>

</div>
</div>
</body>
</html>