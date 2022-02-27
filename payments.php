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
    <title>Payment :: <?php echo $sitetitle ;?></title>
    <?php
    include '_class/p_functions.php'; 
	$obj = new vampirePARENTS();
	$obj ->get_connection(); 
    ?>	
	<?php include("head-code.php"); ?>	
	<meta charset="utf-8">
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

<!--- Additional
   ==================================================== -->
   <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
   <script src="javascripts/tabs.js"></script>
   <script src="javascripts/jquery.hoverIntent.js" type="text/javascript"></script> <!-- optional -->
   <script type="text/javascript" src="javascripts/mob.js"></script>
   <link rel="stylesheet" href="css/responsive-tables.css">
   <script src="javascripts/responsive-tables.js"></script> 
    	   
</head>
<body>



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
    <div class="fourteen columns offset-by-one"><?php include 'topnav.php' ;?> </div>   

 <div class="sixteen columns">
  <div class="eight columns offset-by-one">
  <!-- <p style="float:right;"><a href="clinic-payments.php"><img src="images/clinic-button.png" border="0" width="150" height="150"></a><br><br><a href="tryout-payments.php"><img src="images/tryout-button.png" border="0" width="150" height="150"></a></p> -->
  <h3>Payment</h3>
  <p>&nbsp;</p>
  <p>There is a $7.00 processing fee per transaction.</p>
  <p>
  <form name="ovp" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <p><?php $obj->get_associatedForPayment() ;?>
 
  <p>Enter the full dollar amount of your payment.<br>
    <p><div style="width:auto;"><div style="float:left;"><strong>$ &nbsp;</strong></div> <div style="float:left;"><input name="amount" type="text" placeholder="ex 100.00" style="width:100px;" ></div></div></p>
    <div style="clear:both;">&nbsp;</div>
    <input type="hidden" name="add" value="1">
    <input type="hidden" name="cmd" value="_cart"> 
    <input type="hidden" name="business" value="payment@outlawvolleyball.org"> 
    <input type="hidden" name="item_name" value="Payment For">
    <input type="hidden" name="handling" value="7.00">
    <input type="hidden" name="currency_code" value="USD"> 
    <input type="hidden" name="lc" value="US"> 
    <input type="hidden" name="bn" value="PP-ShopCartBF">
  </p>  
<input name="submit" type="submit" id="submit" value="Make A Payment"> <input type="reset" value="Reset">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form> 
</div>

<div class="six columns omega">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><strong>You may also pay by mail</strong></p>
<p>Outlaw Volleyball Club<br>
   7403 Grover Ave<br>
   Austin. TX. 78757</p>
<p>&nbsp;</p> 
  
   <p>Payments are processed securely through PayPal.  You may pay with Visa, Master Card, <br>American Express or Discover.</p>
   <p><img src="http://www.outlawvolleyball.org/images/credit-card.png" border="0"></p>
   <p>&nbsp;</p>
  </div>     
   
 </div> 
  <div class="sixteen columns">
 <p>&nbsp;</p>
 </div>
 <div class="sixteen columns">
 <div class="fourteen columns offset-by-one">
 <table class="responsive">
    				
					
					<tr style="background-color:#222222;">
					     <th>Team</th>
						<th>July 30</th>
						<th>Sep 5</th>
						<th>Oct 5</th>
						<th>Nov 5</th>
						<th>Dec 5</th>
						<th>Jan 5</th>
						<th>Feb 5</th>
						<th>Mar 5</th>
						<th>Total</th>
					</tr>
					<tr>
						<td>Wild Bunch</td>
						<td>$400.00</td>
						<td>$400.00</td>
						<td>$400.00</td>
						<td>$400.00</td>
						<td>$350.00</td>
						<td>$350.00</td>
						<td>$350.00</td>
						<td>$350.00</td>
						<td>$3000.00</td>
					</tr>
					 <tr style="background-color:#222222;">
						<td>Dalton Gang</td>
						<td>$400.00</td>
						<td>$400.00</td>
						<td>$400.00</td>
						<td>$300.00</td>
						<td>$300.00</td>
						<td>$300.00</td>
						<td>$250.00</td>
						<td>$250.00</td>
						<td>$2600.00</td>
					</tr>
					<!-- <tr>
						<td>Dalton Gang</td>
						<td>$200.00</td>
						<td>$200.00</td>
						<td>$200.00</td>
						<td>$200.00</td>
						<td>$200.00</td>
						<td>$200.00</td>
						<td>$100.00</td>
						<td>$100.00</td>
						<td>$2600.00</td>
					</tr> -->
    					
					
        </table> 
        <p>&nbsp;</p>
        <p>July 30 - Non-refundable deposit to reserve an offered position</p>
        <p>September 5 - This payment goes towards registration/tournament fees</p>
        <p>October 5 - This payment goes towards uniforms/tournament fees.  </p>
        <p>November 5 - This payment goes toward gym rental.  </p>
        </div>
        
 </div>
   <div class="sixteen columns">
 <p>&nbsp;</p>
  <p>&nbsp;</p>
   <p>&nbsp;</p>
 </div>
<!-- End of content section -->       
 <div class="sixteen columns">      
<?php include 'footer.php' ;?>
</div>

</div><!-- container -->

<?php  $obj ->get_closer(); ?>


    
 <!-- End Document
 
================================================== -->
</body>
</html>