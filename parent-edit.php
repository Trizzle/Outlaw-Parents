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
	<title><?php echo $vamptitle ; ?></title>
     <?php
           include '_class/p_functions.php'; 
		   $obj = new vampirePARENTS();
		   $obj ->get_connection(); 
        ?>
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
	<script src="http://www.outlawvolleyball.org/javascripts/jquery-1.9.0.min.js"></script>
	<script src="http://www.outlawvolleyball.org/javascripts/tabs.js"></script>
	<script src="http://www.outlawvolleyball.org/javascripts/jquery-validate.min.js"></script>
	<script src="http://www.outlawvolleyball.org/javascripts/jquery-validate.js"></script>

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
    <div class="fourteen columns offset-by-one"><?php include 'topnav.php' ;?></div>         
	 
     <div class="fifeteen columns offset-by-one">	
       
     <p class="admintitle">Edit <strong><?php $obj ->get_parentName() ;?></strong></p>
        </div>
      <div class="sixteen columns">  
      <p style="font-size:10px;color:#808080;" align="center">NONE of your info is available to the public.</p>
      <?php $obj ->get_parentEdit() ;?>
	
      </div>
 <div class="sixteen columns">     
<?php include 'footer.php';?>
</div>

<?php $obj ->get_closer() ;?>
</div><!-- container -->


<!-- End Document
================================================== -->

</body>
</html>