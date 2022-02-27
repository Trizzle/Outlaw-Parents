<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<!DOCTYPE html>
<?php
//Checks if there is an access cookie
if(isset($_COOKIE['39bcd1cd5b541e3782af201d5eed4c32']));

else{
header("Location: ../index.php");
}
?>
<?php include '../../inform.php' ; ?>
<?php 
include '../_class/a_functions.php'; 
$obj = new vampireADM();
$obj ->get_connection();
?>
<?php 
//This is to make sure the person logged in is the person seeing this screen.
session_start();

//Checks if there is an access cookie

$name = $_SESSION['username'];

if (isset($_POST['submit'])) { 
$new = $_POST['new1'];

$username = $_POST['username'];

//This code makes sure the person logged in is the username being changed

if 

($_COOKIE["currentuser"] != $_POST['username'])

 {

die('Sorry, the username  '.$_POST['username'].' is not the person signed in.<br>

<FORM><INPUT TYPE="BUTTON" VALUE="Try Again" 

ONCLICK="history.go(-1)"></FORM>');

}

// this makes sure both passwords entered match

if ($_POST['new1'] != $_POST['new2']) {

die('Your passwords did not match. <br>

<FORM><INPUT TYPE="BUTTON" VALUE="Go Back" 

ONCLICK="history.go(-1)"></FORM>');

}

$name = $_COOKIE['currentuser'];

$dbnew = md5($_POST['new1']);

$sql = mysql_query("UPDATE users SET pword = '$dbnew' WHERE username ='$name'");

$message = "Your password has been changed!";

include 'closer.php';
}


?>


<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Change Password</title>
	<meta name="keywords" content="<?php echo $keywords ;?>" />
	<meta name="description" content="<?php echo $description ;?>">
	<?php include '../head-code.php'; ?>	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="../../stylesheets/base.css">
    <link rel="stylesheet" href="<?php echo $stylez ;?>">
	<link rel="stylesheet" href="../../stylesheets/skeleton.css">
	<link rel="stylesheet" href="../../stylesheets/layout.css">
    <link rel="stylesheet" href="../../css/blueberry.css">

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="../../images/favicon.ico">
	<link rel="apple-touch-icon" href="../../images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../../images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../../images/apple-touch-icon-114x114.png">

</head>
<body>


	<!-- JS
	================================================== -->
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="../../javascripts/tabs.js"></script>
   
	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
      <div class="sixteen columns">
		<div class="six columns alpha">
			<h1 class="remove-bottom"><a href="<?php echo $siteurl; ?>"><img src="../images/vampire-logo.png" alt="Vampire CMS" title="Vampire CMS"></a></h1>
			
         </div> 
         <div class ="eight columns offset-by-two omega">
             
            
		 </div>	
        </div>    
            <hr />
 <div class="sixteen columns"><p align="left"><span class="person"><?php echo $_COOKIE['currentuser'] ?></span> is signed in | <a href="../control.php">Back to Admin Control</a></p></div>  
	<div class="sixteen columns">	
		<div class="six columns alpha">
        <h2>Change Password</h2>
			<p><?php echo $message; ?></p>
			<br>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p><label>Username</label><input type="text" name="username" maxlength="9" /></p>
            <p><label id="password">New Password</label><input type="password" name="new1" id="new1" maxlength="9" /></p>
			<p><label id="confirm">Confirm Password</label><input type="password" name="new2" id="new2" maxlength="9" /></p>
            <p><input type="submit" name="submit" value="Change" /></p>
            </form>
		</div>
      <!-- image slider -->  
<div class="eight columns offset-by-two omega">
		<p>&nbsp;</p>
</div>
</div>
<?php include '../../footer.php';?>
<?php $obj->get_closer(); ?>
</div>
</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>