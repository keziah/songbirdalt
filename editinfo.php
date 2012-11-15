<?php session_start();
include("config.php");
$info=$_POST['newInfo'];
$project=$_POST['projectname'];
$update = "UPDATE projectinfo SET info='$info' WHERE projectname='$project'";
mysql_query($update);


?>
<meta http-equiv="REFRESH" content="0; URL=project.php?projectname=<?php echo "".$project."" ?>">

