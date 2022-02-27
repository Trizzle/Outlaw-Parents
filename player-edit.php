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
    
<!--  Tiny MCE -->
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">

	tinyMCE.init({
		// General options
	
		mode : "exact",
		elements : "bio,academic_achievement,athletic_achievement,experience,hobbies,video_links",
		theme : "advanced",
		relative_urls : "false",
        document_base_url : "http://www.vampirecms.com",
	    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,safari,imagemanager,advlink",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen,spellchecker",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		file_browser_callback : "kfm_for_tiny_mce",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
			
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

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
       
     <p class="admintitle">Edit Player <strong><?php $obj ->get_parentName() ;?></strong></p>
        </div>
      <div class="sixteen columns">  
      
      <?php $obj ->get_EditPlayer() ;?>
	
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