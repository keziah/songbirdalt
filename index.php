<?php session_start();
//REMEMBER NOT TO INCLUDE CONFIG HERE! OTHERWISE WE WILL GET AN INFINITE REFRESH LOOP
?>	

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="images/appicon.png" />
	<link rel="apple-touch-startup-image" href="images/startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

	<title>Songbird - Welcome!</title>

</head>
<body class="ui-mobile-viewport">
<?php
if (isset($_SESSION['username'])){
	?>
	<meta http-equiv="REFRESH" content="0; url='myProfile.php'">
	<?php
}
?>

<!--Begin first page-->
<div id="login" data-role="page"class="ui-page ui-body-c ui-page-active" data-url="login" data-add-back-btn="false"> 
<div data-role="header">
<h1>Songbird</h1>
</div><!-- /header-->

<div class="ui-content" data-role="content" role="main">

<h2>Log In</h2>
<div data-role="fieldcontain">
        <fieldset data-role="controlgroup">
			<form id="login" action="checklogin.php" method="POST" accept-charset="UTF-8" data-ajax="false">
			<input type="text" name="username" id="username" maxlength="16" placeholder="Username"/>
			<p>
			<input type="password" name="password" id="password" maxlength="20" placeholder="Password" /><p>
            <!--NEED TO ADD OPTION TO REMEMBER USER- WHY ARE CHECKBOXES NOT WORKING?-->
			<input type="submit" value="Log In"/>	
			</form>
		</fieldset>
</div>
<p>
<a href="#signup" class="ui-link" data-rel="dialog" data-transition="pop">
Create Account</a>
<p>

</div> <!--/content-->
</div> <!--/first page-->

<!--Begin third page-->
<div id="signup" data-role="dialog" class="ui-dialog ui-page ui-body-c" data-url="signup" role="dialog">
<div data-role="header">
<h1>Create Account</h1>
</div><!-- /header-->
<div data-role="content" role="main" class="ui-content ui-body-c">
	<div data-role="fieldcontain">
	<fieldset data-rolg = "controlgroup">
	<form id="register" action="createAccount.php" method="POST" data-ajax="false">
		Choose a username:<br>
		<br><input type="text" name="username" id="username" maxlength="16"/><p>
		Choose a Password:<br>
		<input type="password" name="password" id="password" maxlength="20"/><p>
		Confirm Password:<br>
		<input type="password" name="password2" id="password2" maxlength="20"/><p>
		<input type="submit" name = "submitNewUser" value="Submit"/>
	</form>
	</fieldset>
	</div>
</div><!--/content-->
</div> <!--/page-->

</body>
</html>