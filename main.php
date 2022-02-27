<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<!DOCTYPE html>
<?php include 'inform.php' ; ?>
<?php include 'sitesettings.php' ;?>
<?php
//Checks if there is an access cookie
if(isset($_COOKIE['6dbbc740fb18732a206069b2741a2339']));

else{
header("Location: index.php");
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
       <?php
           include '_class/p_functions.php'; 
		   $obj = new vampirePARENTS();
		   $obj ->get_connection(); 
        ?>
	
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

	<!--  -->

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
    <div class="fourteen columns offset-by-one">
           <?php include 'topnav.php' ;?> 
            <p style="font-color:#ffffff">The parent portal will be getting a new look soon! Passwords will remain the same.  Get Ready.</p>
    </div>              
	<div class="sixteen columns">	
		<div class="seven columns offset-by-one alpha">
        <p class="admintitle">Parent Info</p>
           <?php $obj ->get_indParent() ;?>
        
        <p>&nbsp;</p>
        <br>
        <p>Click your child's name to edit their information.</p>
        <br>
	
      
        <p>&nbsp;</p>
        
        <br>
             <p>&nbsp; </p>
	  </div>
      <!-- image slider -->  
     <div class="eight columns  omega">
	<p class="admintitle">Your Players</p>
	<?php $obj ->get_associated() ;?>
        <p>&nbsp;</p>

       
</div>
</div>
<div class="sixteen columns">
<?php echo $vers ;?>
</div>
<div class="sixteen columns">
<hr>
<?php $obj ->get_closer() ;?>
<?php include 'footer.php';?>
</div>



</div>
</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>