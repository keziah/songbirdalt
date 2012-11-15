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
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script src="js/script.js"></script>
</head>	
<body>

<div data-role="page" id="one">

	<div data-role="header">
		<h1>Project Page</h1>
		<a data-role="button" href="myProfile.php" data-icon="home" data-iconpos="left" class="ui-btn-left" data-ajax="false">Home
        </a>
		
		<!--
		<a href="#popupMenu" data-rel="popup" data-role="button" data-icon="arrow-d" data-iconpos="right" data-inline="true" data-transition="fade" class="ui-btn-right">Options</a>

	<div data-role="popup" id="popupMenu" data-overlay-theme="c">
    <ul data-role="listview" data-inset="true" style="width:180px;" data-theme="c">
    	<li>Logged in as <?php 
    		echo($_SESSION['username']);?></li> 
       <!-- <li><a data-rel="popup" href="myProfile.php" data-ajax="false">Profile</a></li>-->
    <!--   <li><a data-rel="popup" href="createnew.php" data-ajax="false">New Project</a></li>
       <li><a data-rel="popup" href="logout.php" data-ajax="false">Logout</a></li>
    </ul>
	</div>-->
	
	<a href="#help" data-rel="popup" data-role="button" data-inline="true" data-transition="fade" class="ui-btn-right">Help</a>
	
<div data-role="popup" id="help">
<!--<a href="#" data-role="button" class="ui-btn-left" data-iconpos="notext" data-icon="delete" data-rel="back"> </a>-->
		<p>This is your project page. From here, you can manage your project's information, music, and lyrics. Just use the tabs at the bottom to navigate!
		<p> To return home, click the HOME button at the top left corner of the page.
</div>

		
	</div><!-- /header -->
	<?php
	$project = $_GET['projectname'];
	?>
	
	<div data-role="content">	
		<h2><?php echo "$project" ?> <span id="username"></span></h2>	
		<p>Project Notes:</p>

	<?php 	
	$sql="SELECT * FROM projectinfo WHERE projectname = '$project'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	if($count < 1) {
		$stdinfo = "This is my project.";
		$stdlyrics = "Add lyrics here.";
		$addProject = "INSERT INTO projectinfo (`projectname`, `info`, `lyrics`) VALUES('$project','$stdinfo', '$stdlyrics')";
		mysql_query($addProject);
		$result = mysql_query($sql);
	}
	
		$row = mysql_fetch_assoc($result);
		echo "".$row["info"]."";
	
		?>

	<a href="#editinfo" data-role="button" data-rel="dialog" data-transition="pop">Edit Project Notes</a>
	<a href="#delproj" data-role="button" data-rel="dialog" data-transition="pop">Delete Project</a>
	</div><!-- /content -->
	
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
			<ul>

				<li><a href="project.php?projectname=<?php echo "".$project."" ?>" id="info" data-icon="custom" class="ui-btn-active">Info</a></li>
				<li><a href="music.php?projectname=<?php echo "".$project."" ?>" id="music" data-icon="custom">Music</a></li>
				<li><a href="lyrics.php?projectname=<?php echo "".$project."" ?>" id="lyrics" data-icon="custom">Lyrics</a></li>
			</ul>
		</div>
	</div>

	
</div><!-- /page one -->



<div data-role="page" class="ui-dialog ui-page ui-body-c" id="editinfo" data-url="editinfo" role="dialog">
<div data-role="header">
<h1>Edit Notes</h1>
</div>
<div data-role="content">
<?php
$oldInfo =$row['info'];
?>
<form action="editinfo.php" id="edit1" method="POST" data-ajax="false">
<div data-role="fieldcontain">
	<textarea cols="40" rows="8" name="newInfo" id="textarea"><?php echo "$oldInfo" ?> </textarea>
	<input type="hidden" name="projectname" value="<?php echo "$project" ?>"/><p>
	<input type="submit" value="Submit"/>
</div>
</form>

</div><!-- /content -->
</div><!-- /page two -->

<div data-role="page" class="ui-dialog ui-page ui-body-c" id="editlyrics" data-url="editlyrics" role="dialog">
<div data-role="header">
<h1>Edit Lyrics</h1>
</div>
<div data-role="content">

<form action="editlyrics.php" id="edit2" method="POST" data-ajax="false">
<div data-role="fieldcontain">
	<textarea cols="40" rows="8" name="lyrics" id="lyrics"><?php echo "".$row['lyrics']."" ?> </textarea>
	<input type="hidden" name="projectname" value="<?php echo "$project" ?>"/><p>
	<input type="submit" value="Submit"/>
</div>
</form>

</div><!-- /content -->
</div><!-- /page three -->


<div data-role="page" class="ui-dialog ui-page ui-body-c" id="delproj" data-url="delproj" role="dialog">
<div data-role="header">
<h1>Delete Project?</h1>
</div>
<div data-role="content">
Are you sure you want to delete "<?php echo "$project"?>"?<p>

<form action="deleteproject.php" method="POST" data-ajax="false">
	<input type="hidden" name="projectname" value="<?php echo "$project" ?>"/><p>
	<a href="#" data-rel="back" data-role="button" data-inline="true">Cancel</a>
	<input type="submit" data-role="button" value="Delete" data-inline="true"/>
</form>
	
</div><!-- /content -->
</div><!-- /page four -->


</body>	
</html>