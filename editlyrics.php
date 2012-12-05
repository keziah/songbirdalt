<?php session_start();
include("config.php");
$new=$_POST['lyrics'];
$project=$_POST['projectname'];
$update = "UPDATE projectinfo SET lyrics='$new' WHERE projectname='$project'";
mysql_query($update);
header("location:lyrics.php?projectname=$project");
?>