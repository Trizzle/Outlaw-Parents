<!DOCTYPE html>

<?php 
// Use session variable on this page. This function must put on the top of page.

session_start();

session_destroy();
setcookie('6dbbc740fb18732a206069b2741a2339',"", time() -3600);
setcookie('currentuser',"",  time()-3600);
setcookie('parentid',"", time()-3600); 

////// Login Section.

//This code runs if the form has been submitted

if (isset($_POST['submit'])){

// Connects to your Database 


include '_class/p_functions.php'; 
$obj = new vampirePARENTS();
$obj ->get_connection(); 

$uname=$_POST['p_email'];
$pssword= sha1($_POST['pword']);

// Check matching of username and password.
//Connect To Database


$result=mysql_query("SELECT * FROM parents WHERE p_email='$uname' and pword='$pssword' AND _register = '1' AND isactive='1'");
$log=mysql_query("INSERT INTO parentlog (parent_email) VALUES ('$uname')");


if(mysql_num_rows($result)!='0'){ // If match.

$one ="SELECT p_fname FROM parents WHERE p_email ='$uname' and pword='$pssword'";
$go2=mysql_query($one) or die (mysql_error()); 
$go3 = mysql_result($go2,0); 	

$parent = $go3;
	
$two ="SELECT parent_num FROM parents WHERE p_email ='$uname' and pword='$pssword'";
$go4=mysql_query($two) or die (mysql_error()); 
while($row = mysql_fetch_array($go4)){
$pid1010 = $row['parent_num'];

}
setcookie('6dbbc740fb18732a206069b2741a2339', time() + 9800);
session_register('username'); // Create session username.
setcookie( 'currentuser',$parent, time() + 9800 );  //Create Username Cookie
setcookie( 'parentid', $pid1010, time() + 9800 ); //set pid
header('location:main.php'); // Re-direct to control.php



}
else { // If not match.

$message="<p>--- Incorrect Username or Password ---</p><p>--- OR your account may not be activated ---</p>";
 

}
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


	<!-- Primary Page Layout
	================================================== -->

	<!-- -->

	<div class="container">
      <div class="sixteen columns">
		<div class="two columns alpha">
			<h1 class="remove-bottom"><a href="<?php echo $siteurl; ?>"><img src="images/ovc_logo2.png" alt="Outlaw Volleyball Club" border="0" title="Outlaw Volleyball Club" width="75" height="auto"></a></h1>
		  <p>&nbsp;</p>
               </div> 
         	<div class="twelve columns offset-by-two omega">
         	<h2 class="remove-bottom"><a href="<?php echo $siteurl; ?>"><img src="images/outlaw-header.png" alt="Outlaw Volleyball Club" border="0" title="Outlaw Volleyball Club"></a></h1>
         	</div>
        </div>    
            <hr />
	<div class="sixteen columns">	
		<div class="eight columns alpha">
        <h2>Parent Login</h2>
        <p><?php echo $message ; ?></p>
        <form id="login" name="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
		<p><label>email</label><input type="text" name="p_email" id="p_email" /></p>
        <p><label>password</label><input type="password" name="pword" id="pword" /></a></p>
        <p><input type="submit" name="submit" id="submit" value="Submit" /></p>
		</form>	
        <p>&nbsp;</p>
        <p>If you are having any issues contact <a href="mailto:admin@outlawvolleyball.org">admin@outlawvolleyball.org</a></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p style="font-color:#ffffff">The parent portal will be getting a new look soon! Passwords will remain the same.  Get Ready.</p>
        <p><a href="<?php echo $siteurlO ;?>">Outlaw Site</a> | <a href="<?php echo $siteurl2 ;?>"> Parent Login</a></p>
		</div>
      <!-- image slider -->  
<div class="six columns offset-by-two omega">
		<p>&nbsp;</p>
</div>
</div>
<div class="sixteen columns">
<?php include 'footer.php';?>

</div>
</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>