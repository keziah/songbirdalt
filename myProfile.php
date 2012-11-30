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
	
</head>
<body>
<style type="text/css">
  .ui-page {
    background: url('images/songbirdBackground.png');
    background-repeat:repeat-y;
    background-position:center center;
    background-attachment:scroll;
    background-size:100% 100%;
}
  .ui-content{
    background: transparent;
}
</style>

	<div data-role="header">
		<h1>Home</h1>
				<a href="#popupMenu" data-rel="popup" data-role="button" data-icon="arrow-d" data-iconpos="right" data-inline="true" data-transition="fade" class="ui-btn-left">Options</a>
		
	<div data-role="popup" id="popupMenu" data-overlay-theme="c">
    <ul data-role="listview" data-inset="true" style="width:180px;" data-theme="c">
        <li><a data-rel="popup" href="createnew.php" data-ajax="false">New Project</a></li>
      	<li><a data-rel="popup" href="logout.php" data-ajax="false">Logout <?php 
    		echo($_SESSION['username']);?></a></li>
    </ul>
	</div>
	<!--help div-->
	
	<a href="#help" data-rel="popup" data-role="button" data-inline="true" data-transition="fade" class="ui-btn-right">Help</a>
	
<div data-role="popup" id="help" class="helpPopup">
<a href="#" data-rel="back" data-role="button" data-theme="c" data-icon="delete" data-iconpos="notext" class="ui-btn-left">Close</a>
		<p>This is your home page. From here, you can create a new project or manage the projects you have already created. 	
		<p> To create a new project or log out, use the options menu on the top left corner of this page. 	
		<p>You can always return to this page by clicking HOME on the top left corner of any other page.
</div>
	
	</div><!-- /header -->



<div id="content" class="clearfix" style="padding:20px">
<!--help popup code below-->
<!--help button-->
<!--<a class="ui-btn-right" style="float:right" href="#help" data-rel="popup" data-role="button" data-mini="true" data-icon="info" data-iconpos="notext" data-inline="true" data-position-to="window"> </a>-->




<section id="center">
<center><p><i>Organize your music inspirations using Songbird!</i></p></center>
<h1><?php 
		echo($_SESSION['username']);
		?></h1>

        <section id="left">


              <!--  <div class="pic">
                    <a href="#"><img src="images/PartyCat.jpg" width="150" height="150" /></a>


                </div> -->
                

                 

                <div class="data">

                 


<!--Right now the new project button is just linking to project.php. This might need to change later -->

<a href="createnew.php" data-role="button" data-theme="c" data-icon="arrow-r"data-iconpos="right" data-ajax="false">
            Create a new project
        </a>
<h2>My Current Projects</h2>

<?php
	$user = $_SESSION['username'];
	$sql="SELECT * FROM projects WHERE username = '$user'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	if ($count > 0) {
		while ($row = mysql_fetch_assoc($result)) {
			$project = $row["projectname"];
			?>
			
			
			<a href="lyrics.php?projectname=<?php echo "".$project."" ?>" data-ajax="false"><?php echo $project ?> </a>
			<p>
			<?php
			
		}
	} else {
		echo "No projects yet.<p>";
	}
	
	?>

    </div><!--/data-->
</div><!--/content-->
</div><!--/page-->
	
	
	
</body> 
</html>