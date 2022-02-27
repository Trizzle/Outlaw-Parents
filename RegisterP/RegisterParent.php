<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<!DOCTYPE html>
<?php include '../inform.php' ; ?>
<?php include '../sitesettings.php' ;?>
<?php 
// Use session variable on this page. This function must put on the top of page.

session_start();
setcookie('TheParent',"",time() -3600);
// Connects to your Database 

include '../_class/p_functions.php'; 
$obj = new vampirePARENTS();
$obj ->get_connection(); 

?>

<?php  
if (isset($_POST['ParentAct'])){

if ($_POST['password1'] === $_POST['pword']) {

$ParentNum = $_POST['parent_num'];
$NewP =sha1($_POST['pword']);

$getIT = "UPDATE parents SET pword='$NewP',_register='1' WHERE parent_num='$ParentNum' LIMIT 1";
$GoGetIT =mysql_query($getIT) or die ("error 112");

$message102 = "<br><h4>You have succesfully created your password.</h4><p><strong>Your account has been activated.</strong>  To view your account <a href='http://parents.outlawvolleyball.org'>Click here to log in</a>.</p>";
}
else {$message101="Your passwords did not match, <a href='javascript:history.go(-2)'>try again</a>";}
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
	<title><?php echo $vamptitleP ; ?></title>
		<?php include '../head-code.php'; ?>	
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
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://parents.outlawvolleyball.org/javascripts/tabs.js"></script>
     <scripts src="https://parents.outlawvolleyball.org/javascripts/jquery-validate.min.js"</scripts>
     <scripts src="https://parents.outlawvolleyball.org/javascripts/jquery-validate.js"</scripts>
     <scripts src="https://parents.outlawvolleyball.org/javascripts/jPassTest.js"></scripts>
	<!-- Primary Page Layout
	================================================== -->

	<!-- -->

	<div class="container">
      <div class="sixteen columns">
		<div class="two columns alpha">
			<h1 class="remove-bottom"><a href="<?php echo $siteurl; ?>"><img src="../images/ovc_logo2.png" alt="Outlaw Volleyball Club" border="0" title="Outlaw Volleyball Club" width="75" height="auto"></a></h1>
		  <p>&nbsp;</p>
               </div> 
         	<div class="twelve columns offset-by-two omega">
         	<h2 class="remove-bottom"><a href="<?php echo $siteurl; ?>"><img src="../images/outlaw-header.png" alt="Outlaw Volleyball Club" border="0" title="Outlaw Volleyball Club"></a></h1>
         	</div>
        </div>    
            <hr />
	<div class="sixteen columns">	
		<div class="ten columns alpha">
        <h2>Parent Account Registration</h2>
        <p>&nbsp;</p>
        <p>You need to <strong>CREATE A PASSWORD</strong> to activate your account.</p>
        <p><?php echo $message102 ; ?></p>
        <p><?php echo $message101 ;?></p>
        
        <form id="ActivateParent" name="ActivateParent" method="post" action="<?php $_SERVER['PHP_SELF'];?>" >
		<?php $obj ->get_GoParentAccount() ;?>
		</form>	
        <p>&nbsp;</p>
        </div>
      <!-- image slider -->  
<div class="eight columns omega">
		<p>&nbsp;</p>
</div>
</div>
<div class="sixteen columns">
<?php include '../footer.php';?>

</div>
</div><!-- container -->
<!-- <script type="text/javascript">
window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("pword").onblur = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("password1").value;
var pass1=document.getElementById("pword").value;
if(pass1!=pass2)
    document.getElementById("pword").setCustomValidity("Passwords Don't Match");
else
    document.getElementById("pword").setCustomValidity('Passwords are good');  
//empty string means no validation error
}
</script> -->

<!-- End Document
================================================== -->
</body>
</html>