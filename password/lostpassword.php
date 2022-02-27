<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php 
include '../_class/p_functions.php'; 
$obj = new vampirePARENTS();
$obj ->get_connection();
?><?php

// Convert to simple variables  

$email = $_POST['p_email'];
if (!isset($_POST['p_email'])) {
 
}elseif (empty($email)) {    
        $error = '2';
}else {
        $email = mysql_real_escape_string($email);
        $status = "OK";
 
        //error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
        if (!stristr($email,"@") OR !stristr($email,".")) {
                $error = '3'; 
                $status = "NOTOK";
        }
 
        if($status == "OK"){  
                $query1 = "SELECT p_email FROM parents WHERE p_email = '$email'";
                $pass = mysql_query($query1) or die(mysql_error());
                $row = mysql_fetch_object($pass);
                $count = mysql_num_rows($pass);
                // email is stored to a variable 
                if ($count == 0) { 
                        $error = '1';
                }
                
                function makeRandomPassword() {           
                        $word = "abcdefghijklmnopqrstuvwxyz1234567890";           
                        srand((double)microtime()*1000000);            
                        $i = 0;           
                                while ($i <= 7) {                 
                                        $num = rand() % 33;                 
                                        $tmp = substr($word, $num, 1);                 
                                        $pass = $pass . $tmp;                 
                                        $i++;           
                                }           
                                return $pass;     
                }
                 
                $random_password = makeRandomPassword();     
                $db_password = sha1($random_password);          
                $sql = mysql_query("UPDATE parents SET pword = '$db_password' WHERE p_email = '$email' ");
                $go = mysql_query($sql);
                $from = "Outlaw Volleyball Administrator DO NOT REPLY";  
                $reply = "admin@outlawvolleyball.org";                
                $subject = "System Login Information";     
                $message = "<p>Your Password has been changed.</p>          
                
				<p>New Password: $random_password</p>          
                
				<p>Once logged in you can change your password</p>          
                
				<p>Thank you!</p>
                
                         
                <br>
				<p>This is an automated response, please do not reply!</p>";
                $headers = "From: " . $from . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Reply-To: ". $reply . "\r\n";
				$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                  
                mail($email, $subject, $message, $headers);
                mysql_free_result($pass);
                header("http://www.outlawvolleyball.org"); 
                }  else {
                $error = '4';   
        }
$returnmessage = "<font color=#0000ff><strong>A temporary password will be sent to you.</strong></font>";
}



?>
<!DOCTYPE html>
<?php include '../inform.php' ; ?>
<?php include '../sitesettings.php' ;?>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Lost Password</title>
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
		<div class="two columns alpha">
			<h1 class="remove-bottom"><a href="<?php echo $siteurl; ?>"><img src="../images/ovc_logo2.png" alt="Outlaw Volleyball Club" border="0" title="Outlaw Volleyball Club" width="75" height="auto"></a></h1>
			
         </div> 
         <div class="twelve columns offset-by-two omega">
         	<h2 class="remove-bottom"><a href="<?php echo $siteurl; ?>"><img src="../images/outlaw-header.png" alt="Outlaw Volleyball Club" border="0" title="Outlaw Volleyball Club"></a></h1>
         	</div>	
        </div>    
            <hr />
	<div class="sixteen columns">	
		<div class="six columns alpha">
        <h2>Lost Password</h2>
        <p>Please enter your email and a new password will be emailed to you </p>
        <br>
      
			<form id="formPP" name="formPP" method="POST" action="<?php echo($PHP_SELF); ?>">
            <p><label id="email">Email</label> <input name="p_email" type="text" id="p_email" size="125"/></p>
           
            <input type="submit" name="NeedPass" id="NeedPass" value="Submit" />
            </form>
            <p><?php echo $returnmessage ; ?></p>
            <p><a href="<?php echo $siteurl ;?>">Back to Main Site</a> | <a href="http://parents.outlawvolleyball.org">Parent Login</a></p>
			
	  </div>
      <!-- image slider -->  
<div class="eight columns offset-by-two omega">
		<p>&nbsp;</p>
</div>
</div>
<?php include '../footer.php';?>

</div>
</div><!-- container -->
<?php $obj->get_closer() ;?>

<!-- End Document
================================================== -->
</body>
</html>