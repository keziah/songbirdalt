<?php session_start();
include("config.php");
?>

<?php

	$project = $_GET['projectname'];
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
	<script src="//cdn.optimizely.com/js/141856090.js"></script>
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script src="js/script.js"></script>
</head> 

 
<body> 
<div data-role="page">

	<div data-role="header">
	
	<h1><?php
	echo $project;
	?>
	
	</h1>
	<a data-role="button" href="myProfile.php" data-icon="home" data-iconpos="left" class="ui-btn-left" data-ajax="false">Home
        </a>
		
			
	<a href="#help" data-rel="popup" data-role="button" data-inline="true" data-transition="fade" class="ui-btn-right">Help</a>
	
<div data-role="popup" id="help">
		<p>This is your music page. From here, you can manage your project's audio clips. 
		<p> To add a new music file, click on the CHOOSE FILE button. This will prompt you to take a video. Take a video with the audio you would like to save. Don't forget to add a description to the clip! When you are finished, press UPLOAD. Your audio clip will appear on this page along with your previous uploads.
		<p> To return home, click the HOME button at the top left corner of the page.
</div>

	</div><!-- /header -->

	<div data-role="content">
	
	<?php 
	
	$sql="SELECT * FROM musicfiles WHERE projectname = '$project'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	//$songs = array();
	?>
	
	<h3>Music Files</h3>
	
	
	<?php
	
		if ($count > 0) {
		?><div data-role="collapsible-set"><?php
		while ($row = mysql_fetch_assoc($result)) {
			$song = $row["filename"];
			//array_push($songs, $song);
			
			?>
			<div data-role="collapsible">
			<h3><?php echo "$song" ?></h3>
			<p>
			<video width="320" height="240" controls="controls">
  				<source src="uploads/<?php echo $song; ?>" type="video/mp4">
  				<source src="movie.ogg" type="video/ogg">
  				Your browser does not support the video tag.
				</video>
			</p>
			</div>
	
			<?php
		}?>
		</div>
		<?php
	} else {
		echo "No music files uploaded.<p>";
	}

		
		?>
				
		
		<h3>Upload</h3>
<!-- Begin Rio's Audio Code -->
		 <div class="container">
            
            <div class="upload_form_cont">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="uploadAudio.php" data-ajax = "false">
                
            <div>
                        <div><label for="image_file">Clicking "Choose File" below will let you choose to upload a prerecorded video file or record a new file:</label></div>
                        <div><input type="file" accept="video/*" name="image_file" id="image_file" onchange="fileSelected();" /></div>
            </div>
                    
                		<input type="text" name="songfilename" placeholder="Name your file! (exclude extension)" maxlength="140"></p>
                		<input type="hidden" name="projectname" value="<?php echo "".$project."" ?>">
                   
                    <div>
                        <input class="button green bigrounded" type="submit" value="Upload" />
                    </div>
                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                    <div id="error"></div>
                    <div id="error2"></div>
                    <div id="abort"></div>
                    <div id="warnsize"></div>

                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent">&nbsp;</div>
                        <div class="clear_both"></div>
                        <div>
                            <div id="speed">&nbsp;</div>
                            <div id="remaining">&nbsp;</div>
                            <div id="b_transfered">&nbsp;</div>
                            <div class="clear_both"></div>
                        </div>
                        <div id="upload_response"></div>
                    </div>
                </form>

                <img id="preview" />
            </div>
        </div>
        
<!-- /End Rio's Audio Code -->
		
		
		
	
		
	<div id="info">

		<!--<embed src="uploads/Starlight.mp3" autostart="false" loop="false">-->

	</div>	
	</div><!-- /content -->

    <div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example">
		<ul>
				
				<li><a href="lyrics.php?projectname=<?php echo "".$project."" ?>" id="lyrics" data-icon="custom">Lyrics</a></li>
				<li><a href="music.php?projectname=<?php echo "".$project."" ?>" id="music" data-icon="custom" class="ui-btn-active">Music</a></li>
				
				<!--<li><a href="submit.php" id="submit" data-icon="custom">Submit</a></li>-->
		</ul>
		</div>
	</div>
</div><!-- /page -->

</body>
</html>