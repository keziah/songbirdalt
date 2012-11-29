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
<style type="text/css">
  .ui-page {
    background: url('images/projectPageBackground.png');
    background-repeat:repeat-y;
    background-position:center center;
    background-attachment:scroll;
    background-size:100% 100%;
}
  .ui-content{
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
	
<div data-role="popup" id="help">
		<p>This is your lyrics page. From here, you can manage your project's lyrics. 
		<p> To edit lyrics, click on the EDIT LYRICS button. Make any changes to the lyrics you want, then hit the SUBMIT button to see them in your project page.
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

	
	<p>Lyrics:</p>
	<?php
	$sql="SELECT * FROM projectinfo WHERE projectname = '$project'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	
	$row = mysql_fetch_assoc($result);
	echo "<pre>".$row["lyrics"]."</pre>"; //give pre a class or id so you can change font in css
	?>	
		
	<a href="#editlyrics" data-role="button" data-rel="dialog" data-transition="pop">Edit Lyrics</a>


	
	</div><!-- /content -->


	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example">
			<ul>
				
				<li><a href="lyrics.php?projectname=<?php echo "".$project."" ?>" id="lyrics" data-icon="custom" class="ui-btn-active">Lyrics</a></li>
				<li><a href="music.php?projectname=<?php echo "".$project."" ?>" id="music" data-icon="custom">Music</a></li>
				
			</ul>
		</div>
	</div>

</div><!-- /page -->

<div id="editlyrics" data-role="dialog" class="ui-dialog ui-page ui-body-c"  data-url="editlyrics">
	<div role="dialog">
		<div data-role="header">
		<h1>Edit Lyrics</h1>
		</div>
		<div data-role="content">
		<form action="editlyrics.php" method="POST" data-ajax="false">
			<div data-role="fieldcontain">
				<textarea cols="40" rows="8" name="lyrics" id="lyrics"><?php echo "".$row['lyrics']."" ?> </textarea>
				<input type="hidden" name="projectname" value="<?php echo "$project" ?>"/><p>
				<input type="submit" value="Submit"/>
			</div>
		</form>
		</div>
	</div>
</div>




</body>
</html>