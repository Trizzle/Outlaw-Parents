<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<!DOCTYPE html>
<?php include 'inform.php' ; ?>
<?php include 'sitesettings.php' ;?>
<?php
//Checks if there is an access cookie
if(isset($_COOKIE['39bcd1cd5b541e3782af201d5eed4c32']));

else{
header("Location: index.php");
}
?>
<?php
include '_class/a_functions.php'; 
$obj = new vampireADM();
$obj ->get_connection();
?>
<?php
if (isset($_POST['edit'])) { 

$uname = $_POST['user'];
$nname = $_POST['name'];
$mmail = $_POST['email'];
$nnum = $_POST['num'];

$update = mysql_query("UPDATE users SET username='$uname', name='$nname', email='$mmail' WHERE users.num='$nnum' ");
$go= mysql_query($update);

$message ="<font color='#ffff00'>User updated!</font>" ;
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
	<title><?php echo $vamptitle ; ?></title>
	<meta name="keywords" content="<?php echo $keywords ;?>" />
	<meta name="description" content="<?php echo $description ;?>">
	<?php include 'head-code.php'; ?>	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="../stylesheets/base.css">
    <link rel="stylesheet" href="<?php echo $stylez ;?>">
	<link rel="stylesheet" href="../stylesheets/skeleton.css">
	<link rel="stylesheet" href="../stylesheets/layout.css">
 

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon-114x114.png">

</head>
<body>


	<!-- JS
	================================================== -->
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="../javascripts/tabs.js"></script>
    
	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
      <div class="sixteen columns">
		<div class="eight columns alpha">
			<h1 class="remove-bottom"><a href="<?php echo $siteurl; ?>"><img src="images/vampire-logo.png" alt="Vampire CMS" title="Vampire CMS" border="0"></a></h1>
         </div> 
         <div class ="eight columns  omega">
             
            
		 </div>	
        </div>    
            <hr />
<div class="sixteen columns"><?php include 'topnav.php' ;?></div> 
	<div class="sixteen columns">	
		<div class="six columns alpha">
        <h2>Edit User</h2>
        <p class="msg"><?php echo $message ;?></p>
<?php

$tg=$_GET['uid'];		 
$ussers =  "SELECT * FROM users WHERE num='".$_GET['uid']."' ";
$result = mysql_query($ussers); 
$rows  = mysql_fetch_array($result);
?>
			<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" id="num" name="num" value="<?php echo $rows['num'] ;?>">
            <p><label id="user">Username</label><input type="text" name="user" id="user" value="<?php echo $rows['username'];?>"></p>
            <p><label id="pword">Name</label><input type="text" name="name" id="name"  value="<?php echo $rows['name'];?>"></p>
            <p><label id="email">E-mail</label><input type="text" name="email" id="email"  value="<?php echo $rows['email'];?>" ></p>
            
            <input name="edit" type="submit" value="Edit">
			</form>
		</div>
      <!-- image slider -->  
<div class="eight columns offset-by-two omega">
		<p>&nbsp;</p>
</div>
</div>
<?php include 'footer.php';?>
<?php $obj->get_closer() ;?>
</div>
</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>