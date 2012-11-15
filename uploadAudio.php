<?php
include("config.php");
function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

$songfile = $_POST['songfilename'];
$project = $_POST['projectname'];

$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);
//echo $_FILES['image_file']['tmp_name'];
if (move_uploaded_file($_FILES['image_file']['tmp_name'], "uploads/".$songfile.".MOV")) {
	$cmd = "ffmpeg/ffmpeg -y -i uploads/capturedvideo.MOV test.wav";
	exec($cmd);
}

$songfilefull = "".$songfile.".MOV";
echo $songfileful;


$query2 = "INSERT INTO musicfiles (`projectname`, `filename`) VALUES('$project', '$songfilefull')";
$result2 = mysql_query($query2);

echo <<<EOF
<p>Your file: {$songfile} has been successsfully received.</p>
<p>Type: {$sFileType}</p>
<p>Size: {$sFileSize}</p>
<p>You will be redirected back to the music page.</p>
EOF;
?>

//<meta http-equiv="REFRESH" content="3; URL='music.php?projectname=<?php echo "".$project."" ?>'">
