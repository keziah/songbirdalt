<?php
session_start();
include("config.php");

$project = $_POST['projectname'];
$song = $_POST['filename'];
$user = $_SESSION['username'];

$removefiles = "DELETE FROM musicfiles WHERE projectname = '$project' AND username = '$user' AND ";

mysql_query($removefiles);
?>

<meta http-equiv="REFRESH" content="0; URL=music.php?projectname=<?php echo "".project."" ?>">
