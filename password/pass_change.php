<?php 

include '../inform.php'; 
include '../dbopen.php' ;

if (isset($_POST['submit'])) { 

$password1 = $_POST['password1'];
$username = $_POST['username'];


// this makes sure both passwords entered match

if ($_POST['password1'] != $_POST['password2']) {

$message = "Your passwords did not match.";

header ("pass_change.php");
}



$db_password = md5($_POST['password1']);


$sql = mysql_query("UPDATE users SET password = '$db_password' WHERE username ='$username'");

$message = "Your password has been changed!";
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $sitename ;?></title>
<meta name="Keywords" CONTENT="Private" />
<meta name="Description" content="<?php echo $description ;?>" />
<meta name="copyright" content="<?php echo $sitename ;?>" />
<meta name="city" content="<?php echo $city ;?>"/>
<meta Name="state" content="TX"/>
<meta name="distribution" content="global"/>
<meta name="revisit-after" content ="10days" />
<meta name="robots" content="index,follow" />
<meta name="rating" content="general"/>
<meta name="abstract" content="<?php echo $sitename ;?>"/>
<meta Name="copyright" content="<?php echo $sitename ;?> <?php echo $year ;?>.  All rights reserved. Duplication of any content on this site is prohibited">
<link href="../../css/stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../scripts/jquery-1.4.1.js"></script>
<script type="text/javascript" src="../../scripts/jquery-ui.js"></script>
<script type="text/javascript" src="../../scripts/jquery.validate.min.js"></script>

</head>

<body><div class="main">
<div class="main-width"><div class="main-bg">
  <p align="center"><img src="../../images/header2.png" alt="Vista land Sales" width="920" height="219" /></p>
  <table width="921" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3"></td>
      </tr>
    <tr>
      <td width="12">&nbsp;</td>
      <td width="170" align="left" valign="top" bgcolor="#FBCE5B"><?php include '../nav2.php' ;?>      
        <br />
        <div id="google_translate_element"></div>
        <script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en'
  }, 'google_translate_element');
}
        </script>        <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>   </td>
      <td width="739" align="left" valign="top" class="title"><p>Password Change</p>
        <p><?php echo $message ;?></p>
        <form action="<?php echo $_SERVER['../../password/PHP_SELF']; ?>" method="post">

          <table width="278" height="61" border="0" align="left">

            <tr>
              <td width="113" valign="middle" bgcolor="#FBCE5B" class="style1"><div align="right" class="maintext">Username</div></td>
              <td width="136" valign="middle" bgcolor="#FBCE5B"><input name="username" type="text" id="username" maxlength="9" /></td>
            <tr>
              <td valign="middle" bgcolor="#FBCE5B" class="style1"><div align="right" class="maintext">New Password</div></td>
              <td valign="middle" bgcolor="#FBCE5B"><input type="text" name="password1" maxlength="9" /></td>
            <tr>
              <td valign="middle" bgcolor="#FBCE5B" class="style1"><div align="right" class="maintext">Confirm Password</div></td>
              <td valign="middle" bgcolor="#FBCE5B"><input type="text" name="password2" maxlength="9" /></td>
            <tr>

              <td colspan="2" valign="middle" bgcolor="#FBCE5B">
                  <div align="center">
                    <input type="submit" name="submit" value="Change Password" />
                  </div></td>
      </table>

   

          </form>
       
        <p class="maintext">&nbsp;</p></td>
    </tr>
    
    <tr>
      <td colspan="3" height="40" ><div align="center" class="footer">
        <?php include '../footer.php' ;?>
      </div></td>
      </tr>
  </table>
  </div>
</div>
</div>
</body>
</html>
