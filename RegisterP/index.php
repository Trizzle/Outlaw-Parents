<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<!DOCTYPE html>
<?php include '../inform.php' ; ?>
<?php include '../sitesettings.php' ;?>
<?php 
// Use session variable on this page. This function must put on the top of page.

session_start();

session_destroy();
setcookie('6dbbc740fb18732a206069b2741a2339',"", time() -3600);
setcookie('currentuser',"",  time()-3600);
setcookie('parentid',"", time()-3600); 
setcookie('LogInError',"", time() -3600); 
setcookie('TheParent',"",time() -3600);
////// Login Section.

//This code runs if the form has been submitted

if (isset($_POST['CheckReg'])){

// Connects to your Database 


include '../_class/p_functions.php'; 
$obj = new vampirePARENTS();
$obj ->get_connection(); 

$uname=$_POST['p_email'];

$obj ->get_RegisterParent();

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
    <link rel="stylesheet" href="../css/blueberry.css">

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
  

    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
      <script>
        $(document).ready(function(){
        $.validator.addMethod("NumbersOnly", function(value, element) {
        return this.optional(element) || /^[0-9\-\+]+$/i.test(value);
        }, "Phone must contain only numbers, + and -.");

    $("#RegP").validate();
  });
  </script>

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
        <h2>Parent Account Activation</h2>
        <p>&nbsp;</p>
        <p>Enter your email address to activate your account. You may have to enter your password twice.</p>
        <p><?php echo $_COOKIE['LogInError']; ?></p>
        <p>&nbsp;</p>
        <form id="RegP" name="RegP" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
		<p><label>email</label><input type="email" name="p_email" id="p_email" required placeholder="Enter a valid email address"/></p>
       
        <p><input type="submit" name="CheckReg" id="CheckReg" value="Submit" /></p>
		</form>	
        <p>&nbsp;</p>
        <p><a href="http://www.outlawvolleyball.org">Outlaw Main Site</a> </p>
        <p><a href="http://parents.outlawvolleyball.org">Parent Portal</a></p>
        </div>
      <!-- image slider -->  
<div class="eight columns omega">
		<p>&nbsp;</p>
</div>
</div>
<div class="sixteen columns">
<p> If your email address is not in the system you will not be able to proceed.  Contact the site administrator <a href="mailto:admin@outlawvolleyball.org">admin@outlawvolleyball.org</a></p>
<p>&nbsp;</p>
</div>
<div class="sixteen columns">
<?php include '../footer.php';?>

</div>
</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>