<?php
$link = mysql_connect('mysql-user-master.stanford.edu', 'ccs147lilithwu', 'ahpobeiw');
mysql_select_db('c_cs147_lilithwu');
if(!isset($_SESSION['username'])){
	session_destroy();
	header("location:index.php");
}

?>