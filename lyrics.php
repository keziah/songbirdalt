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
	<link rel="stylesheet" href="themes/custom.min.css" />
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script src="js/script.js"></script>

</head>
<body>
<style type="text/css">
  .ui-page {
    background: url('images/projectPageBackground.png');
    background-repeat:repeat-y;
    background-position:center center;
    background-attachment:fixed;
    background-size:100% 100%;
}
  .ui-content:not(#editlyrics.ui-content){
    background: transparent;
}

</style>

<?php
$project = $_GET['projectname'];
?>
<div data-role="page">

	<div data-role="header">
		<h1>
		<?php
		echo $project;
		?>
		
		</h1>
		<a data-role="button" href="myProfile.php" data-icon="home" data-iconpos="left" class="ui-btn-left">Home
        </a>
		

	
	<a href="#help" data-rel="popup" data-role="button" data-inline="true" data-transition="fade" class="ui-btn-right">Help</a>
	
<div data-role="popup" id="help" class="helpPopup">
<a href="#" data-rel="back" data-role="button" data-theme="c" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
		<p>This is your lyrics page. From here, you can manage your project's lyrics. 
		<p> To edit lyrics, click on the EDIT LYRICS button. Make any changes to the lyrics you want, then hit the SUBMIT button to save them.
		<p> To return home, click the HOME button at the top left corner of the page.
</div>		
	</div><!-- /header -->
	
	<div data-role="content">
	
	<?php 	
	$sql="SELECT * FROM projectinfo WHERE projectname = '$project'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	if($count < 1) {
		$stdlyrics = "Add lyrics here.";
		$addProject = "INSERT INTO projectinfo (`projectname`, `lyrics`) VALUES('$project', '$stdlyrics')";
		mysql_query($addProject);
		$result = mysql_query($sql);
	}
	?>

	
	<h3>Lyrics:</h3>
	<?php
	$sql="SELECT * FROM projectinfo WHERE projectname = '$project'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	
	$row = mysql_fetch_assoc($result);
	echo "<pre>".$row["lyrics"]."</pre>"; //give pre a class or id so you can change font in css
	?>	
		
	<a href="#editlyrics" data-role="button" data-rel="popup">Edit Lyrics</a>

<p>
<HR WIDTH="98%" SIZE="3">
<p>
<center><a href="#delproj" data-role="button" data-rel="popup" data-inline="true" data-mini="true"><font style="color:#BB0000;">Delete Project</font></a></center>
	
	</div><!-- /content -->


	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example">
			<ul>
				
				<li><a href="lyrics.php?projectname=<?php echo "".$project."" ?>" id="lyrics" data-icon="custom" class="ui-btn-active">Lyrics</a></li>
				<li><a href="music.php?projectname=<?php echo "".$project."" ?>" id="music" data-icon="custom">Media</a></li>
			</ul>
		</div>
	</div>
	
<div id="editlyrics" data-role="popup" data-backbtn=”false”>
		<div data-role="header">
		<h1>Edit Lyrics</h1>
		</div>
		<div data-role="content">
		<form action="editlyrics.php" method="POST" data-ajax="false">
			
				<textarea cols="40" rows="8" name="lyrics" id="lyrics"><?php echo "".$row['lyrics'].""?> </textarea>
				<input type="hidden" name="projectname" value="<?php echo "$project" ?>"/><p>
				<a href="#" data-rel="back" data-role="button" data-inline="true">Cancel</a>
				<input type="submit" data-role="button" value="Save" data-inline="true"/>
		</form>
	</div>
</div>

<div data-role="popup" id="delproj" data-backbtn=”false”>
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
	
	
</div><!-- /page -->





</body>
</html>