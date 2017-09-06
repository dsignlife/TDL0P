<?php
function connect($user, $database) {
   global $dbhost;
   global $db_passwort;
   @mysql_close($conn_handle);
   $conn_handle = mysql_connect($dbhost,$user,$db_passwort);
   mysql_select_db($database, $conn_handle);
   return $conn_handle;
}
function pageheader () {
	
print "<html>\n";
print "<head><title>Rankings</title></head>\n";
print "<body>\n";

}
function anzahl() {
	
	$p_list_q = mysql_query("SELECT COUNT(*) FROM `char`");
	$p_list = mysql_fetch_array($p_list_q);
	$playerlist = $p_list[0];
	
	$a_list_q = mysql_query("SELECT COUNT(*)-1 FROM `login`");
	$a_list = mysql_fetch_array($a_list_q);
	$accountlist = $a_list[0];
	
	doboxsummary("$accountlist","$playerlist");
}
function auswertencrusader() {
	$result = mysql_query("SELECT * FROM `char` WHERE `class` IN ('14', '21') order by base_level desc limit 0,10");
	
	while($row = mysql_fetch_array($result))
        {
		$name=$row["name"];
                $blvl=$row["base_level"];
                $jlvl=$row["job_level"];
                $zeny=$row["zeny"];
		
               dobox("$name","$blvl / $jlvl","$zeny");

	}
		if(!$name)
       				 {
                doerror ("No Character Found!");
        	}
		unset($name);
}
function auswertenknight() {
	$result = mysql_query("SELECT * FROM `char` WHERE `class` IN ('7', '13') order by base_level desc limit 0,10");
	
	while($row = mysql_fetch_array($result))
        {
		$name=$row["name"];
                $blvl=$row["base_level"];
                $jlvl=$row["job_level"];
                $zeny=$row["zeny"];
		
               dobox("$name","$blvl / $jlvl","$zeny");

	}
		if(!$name)
       				 {
                doerror ("No Character Found!");
        	}
		unset($name);
}
function auswertenalle($sorttype) {
	$result = mysql_query("SELECT * FROM `char` order by '$sorttype' desc limit 0,10");
	
	while($row = mysql_fetch_array($result))
        {
		$name=$row["name"];
                $blvl=$row["base_level"];
                $jlvl=$row["job_level"];
                $zeny=$row["zeny"];
		
               dobox("$name","$blvl / $jlvl","$zeny");

	}
		if(!$name)
       				 {
                doerror ("No Character Found!");
        	}
		unset($name);
}
function auswerten($job) {
	$result = mysql_query("SELECT * FROM `char` WHERE `class` = '$job' order by base_level desc limit 0,10");
	
	while($row = mysql_fetch_array($result))
        {
		$name=$row["name"];
                $blvl=$row["base_level"];
                $jlvl=$row["job_level"];
                $zeny=$row["zeny"];
		
               dobox("$name","$blvl / $jlvl","$zeny");

	}
		if(!$name)
       				 {
                doerror ("No Character Found!");
        	}
		unset($name);
}	
function dotableheader () {

	print "<TABLE ALIGN=\"center\" cellPadding=\"2\" width=\"40%\" BORDER=\"0\">\n";

}
function dotablecontet () {
	
	print "<tr font bgcolor=\"#9599CF\">\n";
	print "<td><center><font color=\"#FFFFFF\"><b>Name</b></font></center></td>\n";
	print "<td><center><font color=\"#FFFFFF\"><b>Level</b></font></center></td>\n";
	print "<td><center><font color=\"#FFFFFF\"><b>Zeny</b></font></center></td>\n";
	print "</tr>\n";
	
}
function dotablecontetsummary () {
	
	print "<tr font bgcolor=\"#9599CF\">\n";
	print "<td><center><font color=\"#FFFFFF\"><b>Accounts</b></font></center></td>\n";
	print "<td><center><font color=\"#FFFFFF\"><b>Chars</b></font></center></td>\n";
	print "</tr>\n";
	
}
function dotablefooter () {

 	 print "</TABLE>\n";
 	 print "<p></p>\n";
}

function selectjobname($jobname) {

	print "<tr bgcolor=\"#e5effd\"><td ALIGN=\"center\" colspan=\"3\"><font color=#3E75C1 size=\"+2\"><b>$jobname</b></font></td></tr>\n";
	
}
	
function dobox($info,$info2,$info3) {
	print "<center><tr>\n";
	print "<td bgcolor=\"#eeeeee\"><font color=\"#000000\"><center>$info</center></font></td>\n";
	print "<td bgcolor=\"#eeeeee\"><font color=\"#000000\"><center>$info2</center></font></td>\n";
	print "<td bgcolor=\"#eeeeee\"><font color=\"#000000\"><center>$info3</center></font></td>\n";
	print "</tr>\n";

}
function doboxsummary($info,$info2) {
	print "<center><tr>\n";
	print "<td bgcolor=\"#eeeeee\"><font color=\"#000000\"><center>$info</center></font></td>\n";
	print "<td bgcolor=\"#eeeeee\"><font color=\"#000000\"><center>$info2</center></font></td>\n";
	print "</tr>\n";

}
function pagefooter () {
	
	print "</body>\n";
	print "</html>\n";

}
function doerror ($error) {

	echo "<td colspan=\"3\" bgcolor=\"#eeeeee\"><font color=\"#000000\"><center>Fehler: <b>$error</b></font></center></TD>\n";

}
?>