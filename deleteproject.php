<?php
session_start();
include("config.php");

$project = $_POST['projectname'];

$removefiles = "DELETE FROM musicfiles WHERE projectname = '$project'";
$removeinfo = "DELETE FROM projectinfo WHERE projectname = '$project'";
$removefromuser = "DELETE FROM projects WHERE projectname = '$project'";

mysql_query($removefiles);
mysql_query($removeinfo);
mysql_query($removefromuser);

?>
<meta http-equiv="REFRESH" content="0; URL=myProfile.php">
