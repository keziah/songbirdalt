<?php session_start();
include("config.php");

$project = $_POST['projectname'];
$user = $_SESSION['username'];

$removefiles = "DELETE FROM musicfiles WHERE projectname = '$project' AND username = '$user'";
//$removeinfo = "DELETE FROM projectinfo WHERE projectname = '$project'";
$removefromuser = "DELETE FROM projects WHERE projectname = '$project' AND username = '$user'";

mysql_query($removefiles);
//mysql_query($removeinfo);
mysql_query($removefromuser);

?>
<meta http-equiv="REFRESH" content="0; URL=myProfile.php">
