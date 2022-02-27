<?php 

class vampirePARENTS {

//Connection Function
function get_connection(){
$hostname='p3plcpnl1125.prod.phx3.secureserver.net';
$username='bvall92';
$password='Atkins2929!';
$dbname='bvall92';

mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname) or die(mysql_error()); 
} //end funtion 



///////////////////// Function to get parent name for cookie///////////////
function get_Pname(){
$one ="SELECT p_fname FROM parents WHERE p_email ='$uname' and pword='$pssword'";
$go2=mysql_query($one) or die (mysql_error()); 
$go3 = mysql_result($go2,0); 	

$parent = $go3;

}
///////////////////// End of function ///////////////////

/// Function to get parent id
function get_PID(){

$two ="SELECT parent_num FROM parents WHERE p_email ='$uname' and pword='$pssword'";
$go4=mysql_query($two) or die (mysql_error()); 
$go5 = mysql_result($go4,0); 	

$pid9= $go5;
}
//// End of Function



//All pages
function get_allpages() {
$pagesin =  "SELECT * FROM content WHERE editt=2 AND isactive=1 ORDER BY porder ASC";
	 
    $result9 = mysql_query($pagesin) or die(mysql_error());

    // Print out result
    $line_length = 25;

    while($row = mysql_fetch_array($result9)){
    echo "<p><a href=editor.php?editing=$row[pagetitle]>$row[pagetitle]</a></p>";	
	}
}
//end of function
function get_userlist() {
$ussers =  "SELECT * FROM users WHERE isactive = '1' ORDER BY username ASC";
	 
    $ussersres = mysql_query($ussers) or die(mysql_error());

    while($row = mysql_fetch_array($ussersres)){
    echo "<p>$row[name] - <a href=user-edit.php?uid=$row[num]>Edit</a> <br></p>";	
	}
}
function get_logs() {
$loggin =  "SELECT date_format(dated, '%m-%d-%Y')AS formatted_date, username FROM log ORDER BY log.dated DESC LIMIT 0,5";
	

    $logginres = mysql_query($loggin) or die(mysql_error());

    while($row = mysql_fetch_array($logginres)){
    echo "<span class=log>$row[username] - $row[formatted_date]<br></span>";	
	}

}
//end of function

//page editor

function get_edit() {
	$page= $_GET['editing'];
	
		
	 $content =  "SELECT * FROM content WHERE pagetitle='$page'";
	 $result = mysql_query($content) or die(mysql_error());
     while($row = mysql_fetch_array($result)){
	 echo "<h2>$row[pagetitle]</h2>";
	 echo "<p><strong>Page Text</strong></p>";
	 echo "<form method=POST action=updated.php>";
	 echo "<input type='hidden' id='pg' name='pg' value='$page' >";
  	 echo '<textarea id="elm1" name="elm1" rows="15" cols="80" style="width:80%" >';
	 echo "$row[area1]";
	 echo "</textarea>";
}

}
//end of function

//page editor2 

function get_edit2() {
$page2= $_GET['editing'];
		
	 $content =  "SELECT area2 FROM content WHERE pagetitle='$page2' ";
	 $result = mysql_query($content) or die(mysql_error());
     while($row = mysql_fetch_array($result)){
     echo "<p><strong>Area Two</strong></p>";
	 echo '<textarea id="elm2" name="elm2" rows="15" cols="80" style="width:80%" >';
	 echo "$row[area2]";
	 echo "</textarea>";
}

}
//end of function

//page editor 3

function get_edit3() {
   $page3= $_GET['editing'];
		
	 $content3 =  "SELECT area3 FROM content WHERE pagetitle='$page3' ";
	 $result3 = mysql_query($content3) or die(mysql_error());
     while($row = mysql_fetch_array($result3)){
	 echo "<p><strong>Area 3 (Bottom Area)</strong></p>";
	 echo '<textarea id="elm3" name="elm3" rows="15" cols="80" style="width:80%" >';
	 echo "$row[area3]";
	 echo "</textarea>";

			
            
		}
}
//end of function

//Keywords
function get_keyedit() {
$page4= $_GET['editing'];
$keys =  "SELECT keywords FROM content WHERE pagetitle='$page4' ";
$keyresult = mysql_query($keys) or die(mysql_error());
while($row = mysql_fetch_array($keyresult)){
    echo "<p><strong>Keywords </strong>(seperate keywords with commas)</p>";
    echo '<textarea id="keyss" name="keyss" cols="100" style="width:90%">';
	echo "$row[keywords]";
	echo '</textarea>';
		
	}

}
//end of function

//Description
function get_descedit() {
$page5= $_GET['editing'];
$decs =  "SELECT description FROM content WHERE pagetitle='$page5' ";
$descresult = mysql_query($decs) or die(mysql_error());
while($row = mysql_fetch_array($descresult)){
    echo "<p><strong>Page Description</strong> (Describe this page in 150 characters or less)</p>";
    echo '<textarea id="descr" name="descr" cols="100" style="width:90%">';
	echo "$row[description]";
	echo '</textarea>';
		
	}

}
//end of function

//Blog function
function get_listpostactive(){
   $postings =  "SELECT title,postid FROM bpost WHERE isactive ='1' ORDER BY postid DESC";
	 
    $result999 = mysql_query($postings) or die(mysql_error());

   while($row = mysql_fetch_array($result999)){
    echo "<p><a href=blog-edit.php?editing=$row[postid]>$row[title]</a></p>";	
	}

}
//end of function

//Blog function
function get_listpostnotactive(){
   $postings =  "SELECT title,postid FROM bpost  WHERE isactive ='0' ORDER BY postid ASC";
	 
    $result998 = mysql_query($postings) or die(mysql_error());

    // Print out result
    $line_length = 25;

    while($row = mysql_fetch_array($result998)){
    echo "<p><a href=blog-edit.php?editing=$row[postid]>$row[title]</a></p>";	
	}

}
//end of function

//Blog Function

function get_blogg() {
	$post= $_GET['editing'];
	
		
	 $content =  "SELECT * FROM bpost WHERE postid='$post' ";
	 $result = mysql_query($content) or die(mysql_error());
     while($row = mysql_fetch_array($result)){
	 echo "<h2>$row[title]</h2>";
	 echo "<form method=POST action=blogupdated.php>";
	 echo "<input type='hidden' id='pid' name='pid' value='$post' >";
	 echo "<p><strong>Post Title</strong></p>";
	 echo "<input type='text' id='title' name='title' value='$row[title]'>"; 
	 echo "<p><strong>Category</strong></p>";
	 echo "<input type='text' id='cate' name='cate' value='$row[category]'>";
  	 echo '<textarea id="elm1" name="elm1" rows="15" cols="80" style="width:80%" >';
	 echo "$row[postcontent]";
	 echo "</textarea>";
	 echo "<p><strong>Keywords/Tags</strong></p>";
	 echo "<input type='text' id='keywords' name='keywords' value='$row[keywords]'>";
	 echo "<p><strong>Description</strong></p>";
	 echo "<input type='text' id='descript' name='descript' value='$row[description]'>";
	 echo "Active <input name='isactive' type='radio' value='1' checked />  Deactivate <input name='isactive' type='radio' value='0' />";
}

}
//end of function

//function list players
function get_players(){
$players = "SELECT num,fname,lname FROM players WHERE isactive ='1'  ORDER BY lname LIMIT 0 , 100";
$resultp = mysql_query($players) or die (mysql_error());
while($row = mysql_fetch_array($resultp)){
	
	echo "<a href=player-ind.php?player=$row[num]>$row[fname] $row[lname]</a> <br>";
}
}

//function list players
function get_parentList(){
$players = "SELECT parent_num,p_fname,p_lname FROM parents WHERE isactive ='1'  ORDER BY p_lname LIMIT 0 , 100";
$resultp = mysql_query($players) or die (mysql_error());
while($row = mysql_fetch_array($resultp)){
	
	echo "<a href=parent.php?parentid=$row[parent_num]>$row[p_fname] $row[p_lname]</a> <br>";
}
}

//end of funtion

//function list of teams
function get_teams(){
$teams = "SELECT * FROM team WHERE isactive ='1' ORDER BY 'teamage' DESC";
$resultt = mysql_query($teams) or die (mysql_error());
while($row = mysql_fetch_array($resultt)){

	echo "<p><a href=teampage.php?team=$row[teamnum]>$row[teamname]</a> <p>";
}
}

//end of funtion

//function team name
function get_teamname(){
$t1=$_GET['team'];

$t23 = "SELECT teamname FROM team WHERE teamnum ='$t1' ";
$result23 = mysql_query($t23) or die (mysql_error());
while($row = mysql_fetch_array($result23)){
echo "$row[teamname]";
}
}
//end function

//function get team roster
function get_teamroster(){
$t=$_GET['team'];

$players =  "SELECT * FROM players WHERE team='$t' AND isactive=1 ORDER BY uniform ASC";
$result9 = mysql_query($players) or die(mysql_error());
while($row = mysql_fetch_array($result9)){
	echo "<p><img src=http://www.outlawvolleyball.org/$row[profile] width='15%' height='auto' ><br>#$row[uniform] <a class=tips href=player-ind.php?player=$row[num]>$row[fname] $row[lname]</a></p>";	
}
}
//end function
//function get individual player
function get_indplayer() {
$p1=$_GET['player'];
$player =  "SELECT * FROM players,team WHERE players.num='$p1' AND team.teamnum=players.team";
$result = mysql_query($player) or die(mysql_error());
while($row = mysql_fetch_array($result)){
	
	echo "<p><img src=http://www.outlawvolleyball.org/$row[profile] width='45%' height='auto' ><br>#$row[uniform] <a class=tips href=player-ind.php?player=$row[num]>$row[fname] $row[lname]</a></p>";
        echo "<p><strong>Current Team:</strong> $row[teamname]</p>";	
       
   
}
}
//end function

//////////Get individual parent
function get_indParent() {
$parent2= $_COOKIE['parentid'] ;
$parenti=  "SELECT * FROM parents WHERE parents.parent_num='$parent2'  LIMIT 1 ";
$result = mysql_query($parenti) or die(mysql_error());
while($row = mysql_fetch_array($result)){
	
	echo "<h3>$row[p_fname] $row[p_lname]</h3>";
        echo "<strong>Address </strong> $row[p_address] $row[p_city],$row[p_state] $row[p_zip]<br> ";
	echo "<strong>Home </strong> $row[p_hphone]<br><strong>Cell:&nbsp;&nbsp;&nbsp; </strong> $row[p_cell]<br> <strong>Email: </strong>$row[p_email]";
        echo "<p>&nbsp;</p>";	
        echo "<p>&nbsp;</p>";
        echo "<p><i class='fa fa-edit'></i> <a href=parent-edit.php?parentid=$row[parent_num]>Edit your information</a></p>";
        
       
}
}
/////// END get individual parent

//////////////////// Retrieve Payment History for Player ///////
function get_payHistory(){
$playerH = $_GET['playerid'];

$query1 = "SELECT PayDate,PayAmount,p_fname,p_lname FROM PaymentRecord,parents WHERE PlayerNum ='$playerH' AND PaymentRecord.ParentNum=parents.parent_num ORDER BY PayDate DESC";
$result = mysql_query($query1) or die(mysql_error());
while($row = mysql_fetch_array($result)){
		echo "$row[PayDate] - $$row[PayAmount] - <span class=Lgray>$row[p_fname] $row[p_lname]</span><br>";
		
}
}
///////////////////
////////////////// Get Player Name
function get_playerNameG() {
$playerName = $_GET['playerid'];
$query2 = "SELECT fname, lname FROM players WHERE num ='$playerName' Limit 1";
$result2 = mysql_query($query2) or die(mysql_error());
while($row = mysql_fetch_array($result2)){
			echo "$row[fname] $row[lname]";
			
}

}

/////////////////End get player name

/////////////// Get all Payment history
function get_FullPaymentHistory(){
$playerH = $_GET['playerid'];

$query1 = "SELECT date_format(PayDate, '%m-%d-%Y')as p_date,PayAmount,PayDescript,p_fname,p_lname,BillPeriod,PeriodNote FROM PaymentRecord,PaymentType,parents,BillingPeriod WHERE PlayerNum ='$playerH' AND PaymentRecord.ParentNum=parents.parent_num  AND PaymentType.Ptype=PaymentRecord.PayType AND BillingPeriod.BillPeriod=PaymentRecord.PaySeason AND PaymentRecord.IsActive ='1' ORDER BY PayDate DESC";
$result = mysql_query($query1) or die(mysql_error());
while($row = mysql_fetch_array($result)){
		echo "<p><strong2>Amount:</strong2> $$row[PayAmount] <br><strong2>Payment Date:</strong2> $row[p_date] <br><strong2>Payment Period:</strong2> $row[PeriodNote] <br><strong2>Method:</strong2> $row[PayDescript]<br><strong2>Payer:</strong2> <span class=Lgray>$row[p_fname] $row[p_lname]</span></p><br>";
				
}
echo "<p>&nbsp;</p>";

////// Get amount billed
$queryZ = "SELECT AmountBilled FROM ParentBilled WHERE PlayerID = '$playerH' AND BilledPeriod='9' ";
$queryZ2 = mysql_query($queryZ);
while($row = mysql_fetch_array($queryZ2)){
$variable1 = $row['AmountBilled'];
echo "<strong>Amount Billed</strong> $$row[AmountBilled]<br><br>";
}

/////// Return amount paid
$query2 = "SELECT SUM(PayAmount) AS 'Total' FROM PaymentRecord,parents WHERE PlayerNum ='$playerH' AND PaymentRecord.ParentNum=parents.parent_num AND PaymentRecord.IsActive ='1' ORDER BY PayDate DESC";
$query3 = mysql_query($query2);
while($row = mysql_fetch_array($query3)){
$variable2=$row['Total'];
echo "<strong>Total Paid</strong> $$row[Total]<br><br>";
}
$variable3 = $variable1 - $variable2 ;
echo "<p><strong>Balance</strong> $$variable3</p> ";

echo "<p>&nbsp;</p><p>&nbsp;</p><br><p><a href='payment-history-print.php?view=player&playerid=$playerH' target='_blank'><img src='images/pi.png' border='0'></a></p>";

}

//////////////
/////////////// Get all Payment history
function get_FullPaymentHistory2(){
$playerH = $_GET['playerid'];

$query1 = "SELECT date_format(PayDate, '%m-%d-%Y')as p_date,PayAmount,PayDescript,p_fname,p_lname,BillPeriod,PeriodNote FROM PaymentRecord,PaymentType,parents,BillingPeriod WHERE PlayerNum ='$playerH' AND PaymentRecord.ParentNum=parents.parent_num  AND PaymentType.Ptype=PaymentRecord.PayType AND BillingPeriod.BillPeriod=PaymentRecord.PaySeason AND PaymentRecord.IsActive ='1'  ORDER BY PayDate DESC";
$result = mysql_query($query1) or die(mysql_error());
while($row = mysql_fetch_array($result)){
		echo "<p><strong>Amount:</strong> $$row[PayAmount] <br><strong>Payment Date:</strong> $row[p_date] <br><strong>Payment Period:</strong> $row[PeriodNote] <br><strong>Method:</strong> $row[PayDescript]<br><strong>Payer:</strong> <span class=Lgray>$row[p_fname] $row[p_lname]</span></p><br>";
				
}
echo "<p>&nbsp;</p>";

////// Get amount billed
$queryZ = "SELECT AmountBilled FROM ParentBilled WHERE PlayerID = '$playerH' AND BilledPeriod='9' ";
$queryZ2 = mysql_query($queryZ);
while($row = mysql_fetch_array($queryZ2)){
$variable1 = $row['AmountBilled'];
echo "<strong>Amount Billed</strong> $$row[AmountBilled]<br><br>";
}

/////// Return amount paid
$query2 = "SELECT SUM(PayAmount) AS 'Total' FROM PaymentRecord,parents WHERE PlayerNum ='$playerH' AND PaymentRecord.ParentNum=parents.parent_num AND PaymentRecord.IsActive ='1' ORDER BY PayDate DESC";
$query3 = mysql_query($query2);
while($row = mysql_fetch_array($query3)){
$variable2=$row['Total'];
echo "<strong>Total Paid</strong> $$row[Total]";
}
$variable3 = $variable1 - $variable2 ;
echo "<p><strong>Balance</strong> $$variable3</p> ";


}

//////////////
/////////////// Get all Payment history
function get_FullPaymentHistory3(){
$parentY = $_GET['parent'];

$query1 = "SELECT date_format(PayDate, '%m-%d-%Y')as p_date,PayAmount,PayDescript,p_fname,p_lname,BillPeriod,PeriodNote FROM PaymentRecord,PaymentType,parents,BillingPeriod WHERE ParentNum ='$parentY' AND PaymentRecord.ParentNum=parents.parent_num  AND PaymentType.Ptype=PaymentRecord.PayType AND BillingPeriod.BillPeriod=PaymentRecord.PaySeason AND PaymentRecord.IsActive ='1'  ORDER BY PayDate DESC";
$result = mysql_query($query1) or die(mysql_error());
while($row = mysql_fetch_array($result)){
		echo "<p><strong>Amount:</strong> $$row[PayAmount] <br><strong>Payment Date:</strong> $row[p_date] <br><strong>Payment Period:</strong> $row[PeriodNote] <br><strong>Method:</strong> $row[PayDescript]<br><strong>Payer:</strong> <span class=Lgray>$row[p_fname] $row[p_lname]</span></p><br>";
				
}
echo "<p>&nbsp;</p>";

////// Get amount billed
// $queryZ = "SELECT AmountBilled FROM ParentBilled WHERE ParentNum = '$parentY' AND BilledPeriod='1' ";
// $queryZ2 = mysql_query($queryZ);
// while($row = mysql_fetch_array($queryZ2)){
// $variable1 = $row['AmountBilled'];
// echo "<strong>Amount Billed</strong> $$row[AmountBilled]<br><br>";
// } 

/////// Return amount paid
$query2 = "SELECT SUM(PayAmount) AS 'Total' FROM PaymentRecord,parents WHERE ParentNum ='$parentY' AND PaymentRecord.ParentNum=parents.parent_num AND PaymentRecord.IsActive ='1' ORDER BY PayDate DESC";
$query3 = mysql_query($query2);
while($row = mysql_fetch_array($query3)){
$variable2=$row['Total'];
echo "<strong>Total Paid</strong> $$row[Total]";
}
// $variable3 = $variable1 - $variable2 ;
// echo "<p><strong>Balance</strong> $$variable3</p> ";


}

//////////////

/////// associated players for each parent
function get_associated(){
	
       $parent3=$_COOKIE['parentid'];
       $parenti2=  "SELECT players.num, players.profile, players.fname, players.lname FROM parents, players, pp_look WHERE parents.parent_num='$parent3'  AND pp_look.parentid=parents.parent_num AND pp_look.playerid = players.num";
       $result = mysql_query($parenti2) or die(mysql_error());
       	while($row = mysql_fetch_array($result)){
  	$piddd = $row['num'];	
       	echo "<p><img src=http://www.outlawvolleyball.org/$row[profile] width='25%' height='auto'><br>";	
	     echo "<i class='fa fa-edit'></i> <a href=player-ind.php?player=$piddd>$row[fname] $row[lname]</a><br>";
	     echo "<i class='fa fa-dollar'></i> <a href=payment-history.php?playerid=$piddd>Player Payment History</a></p>";
	   
        	
}

	
}
// Get Associated
/////// associated players for each parent
function get_associatedForPayment(){
	
$parent3=$_COOKIE['parentid'];
$parenti2=  "SELECT players.num, players.team, players.profile, players.fname, players.lname, team.teamnum, team.teamname FROM parents, players,team, pp_look WHERE parents.parent_num='$parent3' AND pp_look.parentid=parents.parent_num AND pp_look.playerid = players.num AND team.teamnum = players.team";
$result = mysql_query($parenti2) or die(mysql_error());

$j = 0;
while($row = mysql_fetch_array($result)){
$piddd = $row['num'];
  if($j == 0){$onn ='on0';$j++;}
  elseif($j == 1){$onn ='on1';$j++;}
  elseif($j == 2){$onn ='on2';$j++;}
  elseif($j == 3){$onn ='on3';$j++;}
  elseif($j == 4){
   $j = 0; // reset counter
   $onn ='on0';
   $j++;
   }	
echo "<input type='checkbox' name='$onn' id='$onn' value='$row[fname] $row[lname]'> $row[fname] $row[lname] <br>";	

        	
}
if($j >1){echo "<p class='yellow'>Click each childs name that you are paying for.</p>";}
	
}
// Get Associated
//function get individual parent
function get_playerparent() {
$p2=$_GET['player'];
$parent =  "SELECT * FROM parents, players, pp_look WHERE players.num='$p2' AND pp_look.playerid=players.num AND parents.parent_num = pp_look.parentid AND pp_look.isactive='1' ";
$result = mysql_query($parent) or die(mysql_error());
while($row = mysql_fetch_array($result)){
	
	echo "<h3>$row[p_fname] $row[p_lname] </h3>";
       
}
}
//end function  
///// Function Player Name
function get_playerName(){
$p9 = $_GET['playerid1'] ;	
$players = "SELECT fname,lname FROM players WHERE num ='$p9' ";
$resultp = mysql_query($players) or die (mysql_error());
while($row = mysql_fetch_array($resultp)){
	
	echo "$row[fname] $row[lname]";
}
}	

//// End function

///// Function Parent Name
function get_parentName(){
$p99 = $_GET['parentrid'] ;	
$parentname = "SELECT p_fname,p_lname FROM parents WHERE parent_num ='$p99' ";
$resultp = mysql_query($parentname) or die (mysql_error());
while($row = mysql_fetch_array($resultp)){
	
	echo "$row[fname] $row[lname]";
}
}	

//// End function

//Function to add parent
function get_parentadd(){
$pl2add = $_GET['playerid1'] ;	
echo "<form name='parentform' id='parentform' method='post' action='parent-added.php'>";
echo "<div class='six columns alpha offset-by-one'>";
echo "<label>First Name</label><input type='text' id='p_fname' name='p_fname' tabindex='1'>";
echo "<label>Address</label><input type='text' id='p_address' name='p_address' tabindex='3'> ";
echo "<label>State</label><input type='text' id='p_state' name='p_state' tabindex='5'>";
echo "<label>Home Phone</label><input type='text' id='p_hphone' name='p_hphone'  tabindex='7'>";
echo "<label>Cell Phone</label><input type='text' id='p_cell' name='p_cell' tabindex='9' >";
echo "<p>&nbsp;</p> ";
echo "<input type='submit' id='addparent' name='addparent' value='Add Parent'>";
echo "</div>";

echo "<div class='eight columns omega'>";
echo "<label>Last Name</label><input type='text' id='p_lname' name='p_lname' tabindex='2'>";
echo "<label>City</label><input type='text' id='p_city' name='p_city' tabindex='4'>";
echo "<label>Zip</label><input type='text' id='p_zip' name='p_zip' tabindex='6'>";
echo "<label>Work Phone</label><input type='text' id='p_wphone' name='p_wphone' tabindex='8'>";
echo "<label>Email</label><input type='text' id='p_email' name='p_email'  tabindex='10'>";
echo "<input type='hidden' id='playerid' name='playerid' value='$pl2add'> ";
echo "<p>&nbsp;</p> ";
echo "</div>";
echo "</form>";


}

//////// End of Function

// Function to process parent
function get_ProcessParent(){
if (isset($_POST['addparent'])){


$newparent = mysql_query("INSERT into bvall92.parents (p_fname,p_lname, p_address,p_city, p_state,p_zip,p_hphone,
	p_wphone, p_cell, p_email,playerid) VALUES ('".$_POST['p_fname']."','".$_POST['p_lname']."','".$_POST['p_address']."','".$_POST['p_city']."',
	'".$_POST['p_state']."','".$_POST['p_zip']."','".$_POST['p_hphone']."','".$_POST['p_wphone']."','".$_POST['p_cell']."',
	'".$_POST['p_email']."','".$_POST['playerid']."')");
	
$go= mysql_query($newparent); 

$parentfirst=$_POST['p_fname'];
$parentlast=$_POST['p_lname'];
$ppid = $_POST['playerid'];

$message =" $parentfirst $parentlast has been added as a parent" ;

$one ="SELECT MAX(parent_num)from parents";
$go2=mysql_query($one) or die (mysql_error()); 
$go3 = mysql_result($go2,0); 	

$parentid = $go3;

$p2p=mysql_query("INSERT INTO pp_look (playerid, parentid) VALUES ('".$_POST['playerid']."', '$parentid')");	

echo "<p><strong>$parentfirst $parentlast </strong>has been added as a parent</p>" ;
echo "<p><a href=player-ind.php?player=$ppid>View players page</a></p>";
}
}
// end of function

//Function create form to EDIT PARENT
function get_parentEdit(){
$parent = $_GET['parentid'] ;	

$parenti=  "SELECT * FROM parents WHERE parents.parent_num='$parent'  LIMIT 1 ";
$result = mysql_query($parenti) or die(mysql_error());
while($row = mysql_fetch_array($result)){

echo "<form name='parentedit' id='parentedit' method='post' action='parent-edited.php'>";
echo "<div class='six columns alpha offset-by-one'>";
echo "<input type='hidden' id='parentid' name='parentid' value='$parent'> ";
echo "<label>First Name</label><input type='text' id='p_fname' name='p_fname' value='$row[p_fname]' tabindex='1' >";
echo "<label>Address</label><input type='text' id='p_address' name='p_address' value='$row[p_address]'  tabindex='3' > ";
echo "<label>State</label><input type='text' id='p_state' name='p_state' value='$row[p_state]'  tabindex='5'>";
echo "<label>Home Phone</label><input type='tel' id='p_hphone' name='p_hphone'  value='$row[p_hphone]' tabindex='7'>";
echo "<label>Cell Phone</label><input type='tel' id='p_cell' name='p_cell' value='$row[p_cell]' tabindex='9' >";
echo "<p>&nbsp;</p> ";

echo "</div>";

echo "<div class='eight columns omega'>";
echo "<label>Last Name</label><input type='text' id='p_lname' name='p_lname' value='$row[p_lname]' tabindex='2'>";
echo "<label>City</label><input type='text' id='p_city' name='p_city' value='$row[p_city]' tabindex='4'>";
echo "<label>Zip</label><input type='text' id='p_zip' name='p_zip' value='$row[p_zip]' tabindex='6'>";
echo "<label>Work Phone</label><input type='tel' id='p_wphone' name='p_wphone' value='$row[p_wphone]' tabindex='8'>";
echo "<label>Email</label><input type='email' id='p_email' name='p_email'  value='$row[p_email]' tabindex='10'>";

echo "<p>&nbsp;</p> ";
echo "<input type='submit' id='editparent' name='editparent' value='Edit Parent'>";
echo "</div>";
echo "</form>";

}
}

// Function to process parent
function get_EditParent(){
if (isset($_POST['editparent'])){

$parentfirst=$_POST['p_fname'];
$parentlast=$_POST['p_lname'];
$parentid2 = $_POST['parentid'];

$editparent = mysql_query("UPDATE parents SET p_fname='".$_POST['p_fname']."', p_lname='".$_POST['p_lname']."', p_address='".$_POST['p_address']."',
 p_city='".$_POST['p_city']."', p_state='".$_POST['p_state']."', p_zip='".$_POST['p_zip']."', p_hphone='".$_POST['p_hphone']."',
 p_wphone='".$_POST['p_wphone']."',  p_cell='".$_POST['p_cell']."',  p_email='".$_POST['p_email']."' WHERE parent_num='$parentid2'");
	
$go= mysql_query($editparent); 

echo "<strong>$parentfirst $parentlast </strong> your information has been edited.</p><p>Back to parents <a href=main.php>home</a> page." ;

}
}
// end of function
/////////Password Change
function get_ParentPassChange(){

$ParentPass1 = $_COOKIE['parentid'];

$getParent = "SELECT parent_num,p_fname,p_lname FROM parents WHERE parent_num = '$ParentPass1' LIMIT 1";
$GoGetParent = mysql_query($getParent) or die (mysql_error()); 
while($row = mysql_fetch_array($GoGetParent)){
echo "<p><strong>$row[p_fname] $row[p_lname]</strong></p>";
echo "<form id='p1p' name='p1p' action='parentXXYZ.php' method='POST'>";
echo "<input type='hidden' id='parentNum' name='parentNum' value='$ParentPass1'> ";
echo "<label>Enter Password</label>";
echo "<input type='password' id='pass1' name='pass1'>";
echo "<label>Re-enter Password</label>";
echo "<input type='password' id='pass2' name='pass2'>";
echo "<input type='submit' id='gosubmit' name='gosubmit' value='Submit'> ";
	

echo "</form>";
}
}
/////////// End of function
/////////// Change Parent Password
function get_ChangePass() {

$NewPass=sha1($_POST['pass1']);
$PID = $_POST['parentNum'];

$changeIt = "UPDATE parents SET pword ='$NewPass' WHERE parent_num = '$PID'";
$DoIt = mysql_query($changeIt) or die (mysql_error());


}

////////// End Function
//////////Remove  Parent Question
function get_parentRemoveQuestion(){
$f1 = $_GET['firstname']; //parents first name
$l1= $_GET['lastname']; //parents last name
$playerf = $_GET['pf'];
$playerl = $_GET['pl'];
$pidd = $_GET['playerid'];
$prtid = $_GET['parent_num'];
echo "Are you sure you want to remove <strong>$f1 $l1</strong> as a parent of <strong>$playerf $playerl </strong> ?";

echo "<p>&nbsp;</p>";
echo "<p><a href=parent-removed.php?playerid=$pidd&parentid=$prtid&parentf=$f1&parentl=$l1&firstname=$playerf&lastname=$playerl><img src=images/minus.png border=0></a>&nbsp; Yes, I want to <a href=parent-removed.php?playerid=$pidd&parentid=$prtid&parentf=$f1&parentl=$l1&firstname=$playerf&lastname=$playerl>REMOVE</a> this parent. <br> THIS TOTALLY REMOVES PARENT
          FROM SYSEM.  <br>DO NOT do this if payments are pending or there are other players associated with this parent.</p>";
echo "<p><a href=parent-deactivated.php?playerid=$pidd&parentid=$prtid&parentf=$f1&parentl=$l1&firstname=$playerf&lastname=$playerl><img src=images/deactivate.png border=0></a>&nbsp; I want to <a href=parent-deactivated.php?playerid=$pidd&parentid=$prtid&parentf=$f1&parentl=$l1&firstname=$playerf&lastname=$playerl>DEACTIVATE</a> parent relationship to player</p> 
</p>";
echo "<p>&nbsp;</p>";
echo "<p>Do nothing. <a href=player-ind.php?player=$pidd>send me back</a> to the players page.</p>";
	
}

///End add parent function

///// DEACTIVATE PARENT AND RELATIONSHIP
function get_ParentDeactivated(){
$playerid = $_GET['playerid'];
$parentid = $_GET['parentid'];
$parentf = $_GET['parentf'];
$parentl = $_GET['parentl'];
$playerf = $_GET['firstname'];
$playerl= $_GET['lastname'];

$gone = "UPDATE pp_look SET isactive ='0' WHERE playerid=$playerid AND parentid=$parentid" ;
$makegone =mysql_query($gone);

$parentd ="UPDATE parents SET isactive='0' WHERE parent_num='$parentid' ";
$parentdeactive = mysql_query($parentd);

echo "<p><strong>$parentf $parentl</strong> has been deactivated as the parent of <strong>$playerf $playerl</strong>.</p><br>";
echo "<br><p>Return to <a href=player-ind.php?player=$playerid>$playerf $playerl's</a> profile page.</p>";


}
/// End of function

/////ACTUALLY REMOVE PARENT AND REMOVE RELATIONSHIP
function get_ParentRemoved(){
$playerid = $_GET['playerid'];
$parentid = $_GET['parentid'];
$parentf = $_GET['parentf'];
$parentl = $_GET['parentl'];
$playerf = $_GET['firstname'];
$playerl= $_GET['lastname'];

$gone = "DELETE FROM pp_look WHERE playerid=$playerid AND parentid=$parentid" ;
$makegone =mysql_query($gone);

$gone2 = "DELETE FROM parents WHERE parent_num = '$parentid'";
$makegone2 = mysql_query($gone2);

echo "<p><strong>$parentf $parentl</strong> has been removed as the parent of <strong>$playerf $playerl</strong>.</p><br>";
echo "<br><p>Return to <a href=player-ind.php?player=$playerid>$playerf $playerl's</a> profile page.</p>";


}
/// End of function

//////////Remove Player make inactive or make historical
function get_playerRemoveQuestion(){
$f1 = $_GET['firstname']; //players first name
$l1= $_GET['lastname']; //players last name
$pidd = $_GET['playerid'];

echo "<p>Are you sure you want to remove <strong>$f1 $l1</strong> as a player ?</p>";

echo "<p>&nbsp;</p>";
echo "<p><a href=player-removed.php?playerid=$pidd&firstname=$f1&lastname=$l1><img src=images/minus.png border=0></a>&nbsp;I would like to <a href=player-removed.php?playerid=$pidd&firstname=$f1&lastname=$l1>REMOVE</a> this player. (THIS IS PERMANENT)</p>";
echo "<p><a href=player-deactivated.php?playerid=$pidd&firstname=$f1&lastname=$l1><img src=images/deactivate.png></a>&nbsp;I would like to <a href=player-deactivated.php?playerid=$pidd&firstname=$f1&lastname=$l1>DEACTIVATE</a> this player</p>";
echo "<p><a href=player-historical.php?playerid=$pidd&firstname=$f1&lastname=$l1><img src=images/historical.png></a>&nbsp;I would like to make this player a <a href=player-historical.php?playerid=$pidd&firstname=$f1&lastname=$l1>HISTORICAL</a> player</p> ";
echo "<p>&nbsp;</p>";
echo "<p><a href=player-ind.php?player=$pidd>Do Nothing.</a> Send me back to the players page.</p>";
	
}

///End remove player question function

/////Actually REMOVE PLAYER
function get_PlayerRemoved(){
$playerid = $_GET['playerid'];
$playerf = $_GET['firstname'];
$playerl= $_GET['lastname'];

$gone = "DELETE FROM players WHERE num ='$playerid' " ;
$makegone =mysql_query($gone);

$pgone = "DELETE FROM pp_look WHERE playerid ='$playerid' ";
$pmadegone = mysql_query($pgone);

echo "<p><strong>$playerf $playerl</strong> has been removed.</p><br>";
echo "<br><p>Return to list of <a href=players.php>players profiles</a>.</p>";


}
/// End of function

/////DEACTIVATE PLAYER
function get_PlayerDeactivated(){
$playerid = $_GET['playerid'];
$playerf = $_GET['firstname'];
$playerl = $_GET['lastname'];

$gone = "UPDATE players SET isactive ='0'  WHERE num ='$playerid' " ;
$makegone =mysql_query($gone);

echo "<p><strong>$playerf $playerl</strong> has been deactivated.</p><br>";
echo "<br><p>Return to list of <a href=players.php>players profiles</a>.</p>";


}
/// End of function

///// MAKE PLAYER A HISTORICAL PLAYER
function get_PlayerHistorical(){
$playerid = $_GET['playerid'];
$playerf = $_GET['firstname'];
$playerl= $_GET['lastname'];

$gone = "UPDATE players SET isactive ='2'  WHERE num ='$playerid' " ;
$makegone =mysql_query($gone);

echo "<p><strong>$playerf $playerl</strong> has been set to historical team.</p><br>";
echo "<br><p>Return to list of <a href=players.php>players profiles</a>.</p>";


}
/// End of function

///// Add player 
function get_playerAdd(){
	
echo "<form name='playerform' id='playerform' method='post' action='player-added.php'>";
echo "<div class='six columns alpha offset-by-one'>";
echo "<label>First Name</label><input type='text' id='fname' name='fname' tabindex='1'>";
echo "<label>Address</label><input type='text' id='address' name='address' tabindex='3'> ";
echo "<label>State</label><input type='text' id='p_state' name='state' tabindex='5'>";
echo "<label>Home Phone</label><input type='text' id='hphone' name='hphone'  tabindex='7'>";
echo "<label>Email</label><input type='text' id='pemail' name='pemail'  tabindex='9'>";
echo "<label>Position</label><input type='text' id='position' name='position' tabindex='11'>";
echo "<label>Height (ex. 5ft 3in)</label><input type='text' id='height' name='height' tabindex='13' >";
echo "<p>&nbsp;</p> ";
echo "<input type='submit' id='addplayer' name='addplayer' value='Add Player'>";
echo "</div>";

echo "<div class='eight columns omega'>";
echo "<label>Last Name</label><input type='text' id='lname' name='lname' tabindex='2'>";
echo "<label>City</label><input type='text' id='city' name='city' tabindex='4'>";
echo "<label>Zip</label><input type='text' id='zip' name='zip' tabindex='6'>";
echo "<label>Cell Phone</label><input type='text' id='pcell' name='pcell' tabindex='8' >";
echo "<label>School</label><input type='text' id='school' name='school' tabindex='10' >";
echo "<label>Hits</label><input type='text' id='hits' name='hits' tabindex='12' >";
echo "<label>Birthday (ex. mm/dd/yyyy)</label><input type='text' id='bday' name='bday' tabindex='14' >";
echo "<p>&nbsp;</p> ";
echo "</div>";
echo "</form>";

}

/// End add player

// Function to process player
function get_ProcessPlayer(){
if (isset($_POST['addplayer'])){


$newplayer = mysql_query("INSERT into bvall92.players (fname,lname,address,city,state,zip,hphone,pcell,
	pemail,school,position,hits,height,bday) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['address']."','".$_POST['city']."',
	'".$_POST['state']."','".$_POST['zip']."', '".$_POST['hphone']."','".$_POST['pcell']."','".$_POST['pemail']."','".$_POST['school']."','".$_POST['position']."',
	'".$_POST['hits']."','".$_POST['height']."','".$_POST['bday']."')");
	
$gop= mysql_query($newplayer); 

$playerfirst=$_POST['fname'];
$playerlast=$_POST['lname'];


$pone ="SELECT MAX(num)from players";
$go4 = mysql_query($pone) or die (mysql_error()); 
$go5 = mysql_result($go4,0); 	

$pid = $go5;

$message =" $playerfirst $playerlast has been added." ;	

echo "<p><strong>$playerfirst $playerlast </strong>has been added as a player.</p>" ;
echo "<p>You can edit the player to add more information<p>";
echo "<p><a href=player-ind.php?player=$pid>View players page</a></p>";
}
}
// end of function

/////  View Player
function get_ViewPlayer(){
$viewplayer = $_GET['player'] ;	

$view1=  "SELECT * FROM players, team, gradyear WHERE players.num='$viewplayer' AND players.team= team.teamnum AND players.class=gradyear.yearnum  LIMIT 1 ";
$result = mysql_query($view1) or die(mysql_error());
while($row = mysql_fetch_array($result)){

echo "<div class='seven columns alpha offset-by-one'>";
echo "<p><span class='admintitle'>Information</span>  <i class='fa fa-edit'></i>  <a href=player-edit.php?playerid=$row[num]><span class='small'>Edit Player</span></a></p>";
echo "<p><strong>Team:</strong> $row[teamname]</p>";
echo "<p><strong>Address:</strong> $row[address] </p>";
echo "<p><strong>State:</strong> $row[state]</p>";
echo "<p><strong>Home Phone:</strong> $row[hphone]";
echo "<p><strong>Email:</strong> $row[pemail]</p>";
echo "<p><strong>School:</strong> $row[school]</p>";
echo "<p><strong>SAT</strong>: $row[SAT] |Reading: $row[SAT_R] | Math: $row[SAT_M] | Writing: $row[SAT_W]</p>";
echo "<p><strong>Major:</strong></p> $row[int_major]";
echo "<p><strong>Academic Achievement:</strong> $row[academic_achievement] </p>";
echo "<p><strong>Hobbies:</strong> $row[hobbies]</p>";
echo "<p><strong>High School Coach:</strong> $row[high_school_coach]  </p>";
echo "<p><strong>Video Links:</strong> $row[video_links]  </p>";
echo "<p><strong>Position:</strong> $row[position]</p>";
echo "<p><strong>Height:</strong> $row[height]</p>";
echo "<p><strong>BIO</strong><br>$row[bio]</p>";
echo "<p>&nbsp;</p> ";
echo "<i class='fa fa-edit'></i> <a href=player-edit.php?playerid=$row[num]><span class='small'>Edit Player</span></a>";
echo "</div>";

echo "<div class='eight columns omega'>";
echo "<p>&nbsp;</p>";
echo "<p><strong>Jersey No</strong> $row[uniform]</p>";
echo "<p><strong>City:</strong> $row[city]</p>";
echo "<p><strong>Zip:</strong> $row[zip]</p>";
echo "<p><strong>Cell Phone:</strong> $row[pcell]</p>";
echo "<p><strong>Class:</strong> $row[year]</p>";
echo "<p><strong>ACT:</strong> $row[ACT]  </p>";
echo "<p><strong>GPA:</strong> $row[gpa]</p>";
echo "<p><strong>Athletic Achievement:</strong> $row[athletic_achievement] </p>";
echo "<p><strong>Volleyball Experience:</strong> $row[experience]";
echo "<p><strong>Other Sports:</strong> $row[other_sports]</p>";
echo "<p><strong>HS Coach Email:</strong> $row[hsc_email]</p>";
echo "<p><strong>Hits:</strong> $row[hits]</p>";
echo "<p><strong>Birthday:</strong> $row[bday]</p>";
echo "<p>&nbsp;</p> ";
echo "</div>";

}
}
///end View Player

///// Add player 
function get_EditPlayer(){
$player2 = $_GET['playerid'] ;	

$playeri=  "SELECT * FROM players, team, gradyear WHERE players.num='$player2' AND players.team= team.teamnum AND players.class=gradyear.yearnum  LIMIT 1 ";
$result = mysql_query($playeri) or die(mysql_error());
while($row = mysql_fetch_array($result)){

	
echo "<form name='playereditform' id='playereditform' method='post' action='player-edited.php'>";
echo "<div class='fifeteen columns alpha offset-by-one'>";
echo "<input type='hidden' id=''playerid' name='playerid' value='$row[num]' >";

echo "<label><strong>First Name</strong></label><input type='text' id='fname' name='fname' value='$row[fname]' tabindex='3'>";
echo "<label><strong>Last Name</strong></label><input type='text' id='lname' name='lname' value='$row[lname]' tabindex='4'>";
echo "<label><strong>Address</strong></label><input type='text' id='address' name='address' value='$row[address]' tabindex='5'> ";
echo "<label><strong>City</strong></label><input type='text' id='city' name='city' value='$row[city]' tabindex='6'>";
echo "<label><strong>State</strong></label><input type='text' id='state' name='state' value='$row[state]' tabindex='7'>";
echo "<label><strong>Zip</strong></label><input type='text' id='zip' name='zip' value='$row[zip]' tabindex='8'>";
echo "<label><strong>Home Phone</strong></label><input type='text' id='hphone' name='hphone' value='$row[hphone]'  tabindex='9'>";
echo "<label><strong>Cell Phone</strong></label><input type='text' id='pcell' name='pcell' value='$row[pcell]' tabindex='10' >";
echo "<label><strong>Email</strong></label><input type='text' id='pemail' name='pemail' value='$row[pemail]'  tabindex='11'>";
echo "<label><strong>Class</strong></label><select id='classs' name='classs' tabindex='12'>
<option value='$row[class]'>$row[_year]</option>
<option value='1'>2013</option>
<option value='2'>2014</option>
<option value='3'>2015</option>
<option value='4'>2016</option>
<option value='6'>2017</option>
<option value='7'>2018</option>
<option value='8'>2019</option>
<option value='9'>2020</option>
<option value='10'>2021</option>
<option value='11'>2022</option>
<option value='12'>2023</option>
<option value='13'>2024</option>
<option value='14'>2025</option>
<option value='15'>2026</option>
</select>";
echo "<label><strong>School<strong></label><input type='text' id='school' name='school' value='$row[school]' tabindex='13' >";
echo "<label><strong>SAT</strong></label><input type='text' id='SAT' name='SAT' value='$row[SAT]' tabindex='14'>";
echo "<label><strong>SAT Critical Reading</strong></label><input type='text' id='SATR' name='SATR' value='$row[SAT_R]' tabindex='14'>";
echo "<label><strong>SAT Math</strong></label><input type='text' id='SATM' name='SATM' value='$row[SAT_M]' tabindex='14'>";
echo "<label><strong>SAT Writing</strong></label><input type='text' id='SATW' name='SATW' value='$row[SAT_W]' tabindex='14'>";
echo "<label><strong>ACT Composite</strong></label><input type='text' id='ACT' name='ACT' value='$row[ACT]' tabindex='15'>";
echo "<label><strong>GPA</strong></label><input type='text' id='gpa' name='gpa' value='$row[gpa]' tabindex='16'>";
echo "<label><strong>Class Rank</strong></label><input type='text' id='classRank' name='classRank' value='$row[classRank]' tabindex='17'>";
echo "<p><label><strong>Major<//strong></label><input type='text' id='int_major' name='int_major' value='$row[int_major]' tabindex='18'>";
echo "<p><label>Academic Achievement</label><input type='text' id='academic_achievement' name='academic_achievement' value='$row[academic_achievement]' tabindex='19'></p>";
echo "<p><label>Athletic Achievement</label><input type='text' id='athletic_achievement' name='athletic_achievement' value='$row[athletic_achievement]' tabindex='20'></p>";
echo "<p><label>Volleyball Experience</label><input type='text' id='experience' name='experience' value='$row[experience]' tabindex='21'></p>";
echo "<p><label>Hobbies</label><input type='text' id='hobbies' name='hobbies' value='$row[hobbies]' tabindex='22'></p>";
echo "<p><label>Other Sports</label><input type='text' id='other_sports' name='other_sports' value='$row[other_sports]' tabindex='23'></p>";
echo "<label>High School Coach</label><input type='text' id='high_school_coach' name='high_school_coach' value='$row[high_school_coach]' tabindex='24'>";
echo "<label>HS Coach Email</label><input type='text' id='hsc_email' name='hsc_email' value='$row[hsc_email]' tabindex='25'>";
echo "<p><label>Video Links</label><input type='text' id='video_links' name='video_links' value='$row[video_links]' tabindex='26'></p>";
echo "<label>Position</label><input type='text' id='position' name='position' value='$row[position]'  tabindex='27'>";
echo "<label>Hits</label><input type='text' id='hits' name='hits' value='$row[hits]' tabindex='28' >";
echo "<label>Birthday (ex. mm/dd/yyyy)</label><input type='text' id='bday' name='bday' value='$row[bday]' tabindex='29' >";
echo "<p><label>BIO</label><textarea id='bio' name='bio' tabindex='30' rows='10'>$row[bio]</textarea></p>";
echo "<p>&nbsp;</p>";
echo "<p>&nbsp;</p>";
echo "<p><input type='submit' id='editplayer' name='editplayer' value='Edit Player'></p>";
echo "<p>&nbsp;</p> ";
echo "</div>";
echo "</form>";

}
}
//  ============================================= End edit player

//  ============================================ Function to process player edit
function get_PlayerEdited(){
if (isset($_POST['editplayer'])){

$playerfirst=$_POST['fname'];
$playerlast=$_POST['lname'];
$playerid = $_POST['playerid'];

$editplayer = "UPDATE players SET fname='".$_POST['fname']."', 
lname='".$_POST['lname']."', 
address='".$_POST['address']."',
city='".$_POST['city']."', 
state='".$_POST['state']."', 
zip='".$_POST['zip']."', 
hphone='".$_POST['hphone']."',
pcell='".$_POST['pcell']."',  
pemail='".$_POST['pemail']."',
class='".$_POST['classs']."', 
school='".$_POST['school']."',
ACT='".$_POST['ACT']."', 
SAT='".$_POST['SAT']."',
SAT_R='".$_POST['SATR']."',
SAT_M='".$_POST['SATM']."',
SAT_W='".$_POST['SATW']."',   
gpa='".$_POST['gpa']."',
classRank='".$_POST['classRank']."',
int_major='".$_POST['int_major']."',
academic_achievement='".$_POST['academic_achievement']."', 
athletic_achievement='".$_POST['athletic_achievement']."', 
experience='".$_POST['experience']."', 
hobbies='".$_POST['hobbies']."', 
other_sports='".$_POST['other_sports']."', 
high_school_coach='".$_POST['high_school_coach']."',  
hsc_email='".$_POST['hsc_email']."',  
video_links='".$_POST['video_links']."', 
position='".$_POST['position']."', 
hits='".$_POST['hits']."', 
bday='".$_POST['bday']."', 
bio='".$_POST['bio']."' 
WHERE players.num='$playerid' " ;
	
$go= mysql_query($editplayer) or die(mysql_error()); 

echo "$playerfirst $playerlast has been edited.</p><p>Back to parent's <a href=main.php>home page</a>" ;

}
}
//  ======================================= end of function
//  ======================================= Register account
function get_RegisterParent(){

if (isset($_POST['CheckReg'])) {
			$parentemail = mysql_real_escape_string($_POST['p_email']) ;

			$FindParent = "SELECT * FROM parents WHERE p_email='$parentemail' AND _register ='0'";
			$ParentResult = mysql_query($FindParent);
             $DaPa = $row['parent_num'];
			if ($ParentResult)
	  		
	  		{$count1 = mysql_num_rows($ParentResult);
              
 			if ($count1>0) 
 			{
 			 $FindParent = "SELECT * FROM parents WHERE p_email='$parentemail' AND _register ='0'";
			 $ParentResult = mysql_query($FindParent);
			 while($row = mysql_fetch_array($ParentResult)){
			  setcookie("TheParent",$row['parent_num'],time() + 9800 );
             
             }
 			
 			 header('location:RegisterParent.php'); 
 			 }
 			
  		  			else {$FindParent2 = "SELECT * FROM parents WHERE p_email='$parentemail' AND _register ='1'";
 						  $ParentResult2 = mysql_query($FindParent2);

							if ($ParentResult2)
							{$count2 = mysql_num_rows($ParentResult2);
							 if ($count2>0) {setcookie("LogInError",'<strong>This user account is currently registered<br><br>Please contact the site administrator.</strong>',time() + 1800);}
 						  }
 						  }
 						  }
 			else {$message112 = "Contact Administrator";}



}

}
//////////////
////////////// Activate account
function get_GoParentAccount() {
$ACCT = $_COOKIE['TheParent'];

$Populate = "SELECT parent_num,p_fname,p_lname,p_email FROM parents WHERE parent_num ='$ACCT' Limit 1";
$GoPop = mysql_query($Populate)  or die(mysql_error());
while($row = mysql_fetch_array($GoPop)){
echo "<strong2>Name:</strong2> $row[p_fname] $row[p_lname]<br>";
echo "<strong2>Email:</strong2> $row[p_email]  ";
echo "<p>&nbsp;</>";
echo "<input type='hidden' name='parent_num' id='parent_num' value='$row[parent_num]' />";
echo "<p><label for 'password1'>Password</label><input type='password' name='password1' id='password1' required='required' pattern='.{6,}' title='Minimum 6 letters or numbers.' placeholder='Minimum 6 characters'  /></p>";
echo "<p><label for 'pword'>Re-type Password</label><input type='password' name='pword' id='pword' required='required pattern='.{6,}' title='Minimum 6 letters or numbers.' placeholder='Minimum 6 characters'  /></p>";
      
echo"<p><input type='submit' name='ParentAct' id='ParentAct' value='Activate' /></p>";

}
}
/////////////////
////////////// Activate account
function get_ParentActivate(){


}

//////////////
/////////////////Close database
function get_closer() {
                   mysql_close();
}
//end function
}// END CLASS
?>