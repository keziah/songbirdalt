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
<div data-role="page">

	<div data-role="header">
	<h1>Music</h1>
	<a data-role="button" href="myProfile.php" data-icon="home" data-iconpos="left" class="ui-btn-left" data-ajax="false">Home
        </a>
		
			
	<a href="#help" data-rel="popup" data-role="button" data-inline="true" data-transition="fade" class="ui-btn-right">Help</a>
	
<div data-role="popup" id="help">
		<p>This is your music page. From here, you can manage your project's audio clips. 
		<p> To add a new music file, click on the CHOOSE FILE button. This will prompt you to take a video. Take a video with the audio you would like to save. Don't forget to add a description to the clip! When you are finished, press UPLOAD. Your audio clip will appear on this page along with your previous uploads.
		<p> To return home, click the HOME button at the top left corner of the page.
</div>
	<a href="#" data-icon="check" id="logout" class="ui-btn-right">Logout</a>

	</div><!-- /header -->

	<div data-role="content">
	
<!--
	//insert music files here??
		<audio controls="controls" height="50px" width="100px">
  				<source src="resources/jeTaimePlus.mp3" type="audio/mpeg" />
  				<source src="song.ogg" type="audio/ogg" />
				<embed height="50px" width="100px" src="jeTaimePlus.mp3" />
	</audio>
	
	-->
	
	<?php

	$project = $_GET['projectname'];
	?>
	
	<p>Music Files:</p>
	
				<?php 
	
	
	$sql="SELECT * FROM musicfiles WHERE projectname = '$project'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	
	$songs = array();
	
	if ($count > 0) {
		while ($row = mysql_fetch_assoc($result)) {
			$song = $row["filename"];
			array_push($songs, $song);
			
			?>
			<!-- include("wave_form.php"); -->
			
			<video width="320" height="240" controls="controls">
  				<source src="uploads/<?php echo $song; ?>" type="video/mp4">
  				<source src="movie.ogg" type="video/ogg">
  				Your browser does not support the video tag.
				</video>
			
			<p>
			<?php
			
		}
	}
		
		?>
		
		<!--
								<embed autostart="false" src="uploads/<?php echo $song; ?>" />
											<a href="wave_form.php?songfilename=<?php echo "".$song."" ?>">My song</a>


-->
		
			<!-- <embed autostart="false" src="jetaimeplus.mp3" /> -->

	<!--	
	<script type="text/javascript">

	var arrayCount = "<? echo $count; ?>";
	var arrNum = parseInt(arrayCount);
	echo arrayCount;

	if(<?php $count > 0 ?>) {
		echo "test";
		<embed autostart="false" src="uploads/<?php echo $filenames[0]; ?>" />
		<p>	
	}
	</script>
	

		<div data-role="fieldcontain">
			
		</div>	
		-->
		
<!-- Begin Rio's Audio Code -->
		 <div class="container">
            
            <div class="upload_form_cont">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="uploadAudio.php" data-ajax = "false">
           
                		<input type="text" name="songfilename" placeholder="Description" maxlength="140"></p>
                		<input type="hidden" name="projectname" value="<?php echo "".$project."" ?>">

                    <div>
                        <div><label for="image_file">Upload a prerecorded video file or record your music file:</label></div>
                        <div><input type="file" accept="video/*" name="image_file" id="image_file" onchange="fileSelected();" /></div>
                       

                                            </div>
                    
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
		

	</div><!-- /content -->

    <div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>
				<li><a href="project.php?projectname=<?php echo "".$project."" ?>" id="info" data-icon="custom" >Info</a></li>
				<li><a href="music.php?projectname=<?php echo "".$project."" ?>" id="music" data-icon="custom" class="ui-btn-active">Music</a></li>
				<li><a href="lyrics.php?projectname=<?php echo "".$project."" ?>" id="lyrics" data-icon="custom">Lyrics</a></li>

				
				<!--<li><a href="submit.php" id="submit" data-icon="custom">Submit</a></li>-->
		</ul>
		</div>
	</div>
	<script type="text/javascript">
	$("#logout").hide();
	$("#info").hide();
	var retrievedObject = localStorage.getItem('username');
	if (retrievedObject == "test") {
		$("#form").hide();	
		$("#logout").show();
		$("#info").show();
	}
	$("#logout").click(function() {
		localStorage.removeItem('username');
		$("#form").show();
		$("#logout").hide();
		$("#info").hide();
	});
	</script>
</div><!-- /page -->

</body>
</html>