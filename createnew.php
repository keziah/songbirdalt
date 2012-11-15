<?php session_start();
include("config.php");
?>
<html>

<head>
	<title>Songbird</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />

	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="resources/jquery-1.8.2.min.js"></script>
	<script src="resources/jquery.mobile-1.2.0.js"></script>
	<title>Songbird - Contribute</title>
	
	
	<form class="fileupload" action="server/php/" method="POST" enctype="multipart/form-data"
    data-upload-template-id="template-upload-1"
    data-download-template-id="template-download-1">
    <!-- ... -->
</form>
<form class="fileupload" action="server/php/" method="POST" enctype="multipart/form-data"
    data-upload-template-id="template-upload-2"
    data-download-template-id="template-download-2">
    <!-- ... -->
</form>
	
</head>
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script src="js/script.js"></script>

</head>  
<body> 

<div data-role="page">

	<div data-role="header">
	<h1>Create New Project</h1>
	<a data-role="button" href="myProfile.php" data-icon="home" data-iconpos="left" class="ui-btn-left" data-ajax="false">Home</a>
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


	</div><!-- /header -->

	<div data-role="content">
	

		<div data-role="fieldcontain">
			
		</div>	
	
		 
	</div><!-- /content -->
	
<div id="form">
	<form action="submission.php" method="post">
	<p><label for="message">Project Name</label>
		<input type="text" name="projectname" maxlength="140"></p>
	<input class="submit" type="submit" value="Create">
</form></div>	
	
	


        









	
<!--/end content -->
</div><!-- /page -->


</body>
</html>