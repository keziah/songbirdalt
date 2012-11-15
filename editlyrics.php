<?php session_start();
include("config.php");
$new=$_POST['lyrics'];
$project=$_POST['projectname'];
$update = "UPDATE projectinfo SET lyrics='$new' WHERE projectname='$project'";
mysql_query($update);
header("location:lyrics.php?projectname=$project");
?>
<!--<meta http-equiv="REFRESH" content="0; URL=lyrics.php?projectname=<?php echo "".$project."" ?>">-->

