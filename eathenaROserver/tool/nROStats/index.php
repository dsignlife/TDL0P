<?php
if (!eregi("modules.php", $PHP_SELF)) {
   die ("You can't access this file directly...");

}
require_once("mainfile.php");
$module_name = basename(dirname(__FILE__));
include("header.php");
$index = 1;
OpenTable();


include 'nroconfig.php';
include 'func.php';


print "<center>nRO Rank's</center>\n";
print "<p></p>\n";

	// Connect to the database
        $chardb = connect($dbuser,$dbname);
        
dotableheader ();
selectjobname("Summary");
dotablecontetsummary();
anzahl();
dotablefooter();
print "<hr>\n";
// For All (EXP)
dotableheader();
selectjobname("All (EXP)");
dotablecontet();
auswertenalle("base_level");
dotablefooter();
// For All (Zeny)
dotableheader();
selectjobname("All (Zeny)");
dotablecontet();
auswertenalle("zeny");
dotablefooter();
print "<hr>\n";
// For Novice
dotableheader();
selectjobname("Novice");
dotablecontet();
auswerten("0");
dotablefooter();
// For Swordman
dotableheader();
selectjobname("Swordman");
dotablecontet();
auswerten("1");
dotablefooter();
// For Mage
dotableheader();
selectjobname("Mage");
dotablecontet();
auswerten("2");
dotablefooter();
// For Archer
dotableheader();
selectjobname("Archer");
dotablecontet();
auswerten("3");
dotablefooter();
// For Acolyth
dotableheader();
selectjobname("Acolyte");
dotablecontet();
auswerten("4");
dotablefooter();
// For Merchant
dotableheader();
selectjobname("Merchant");
dotablecontet();
auswerten("5");
dotablefooter();
// For Thief
dotableheader();
selectjobname("Thief");
dotablecontet();
auswerten("6");
dotablefooter();
print "<hr>\n";
dotableheader();
selectjobname("Knight");
dotablecontet();
auswertenknight();
dotablefooter();
// For Priest
dotableheader();
selectjobname("Priest");
dotablecontet();
auswerten("8");
dotablefooter();
// For Wizard
dotableheader();
selectjobname("Wizard");
dotablecontet();
auswerten("9");
dotablefooter();
// For Blacksmith
dotableheader();
selectjobname("Blacksmith");
dotablecontet();
auswerten("10");
dotablefooter();
// For Hunter
dotableheader();
selectjobname("Hunter");
dotablecontet();
auswerten("11");
dotablefooter();
// For Assassin
dotableheader();
selectjobname("Assassin");
dotablecontet();
auswerten("12");
dotablefooter();
print "<hr>\n";
// For Crusader
dotableheader();
selectjobname("Crusader");
dotablecontet();
auswertencrusader();
dotablefooter();
// For Monk
dotableheader();
selectjobname("Monk");
dotablecontet();
auswerten("15");
dotablefooter();
// For Sage
dotableheader();
selectjobname("Sage");
dotablecontet();
auswerten("16");
dotablefooter();
// For Rogue
dotableheader();
selectjobname("Rogue");
dotablecontet();
auswerten("17");
dotablefooter();
// For Alchemist
dotableheader();
selectjobname("Alchemist");
dotablecontet();
auswerten("18");
dotablefooter();
// For Bard
dotableheader();
selectjobname("Bard");
dotablecontet();
auswerten("19");
dotablefooter();
// For Dancer
dotableheader();
selectjobname("Dancer");
dotablecontet();
auswerten("20");
dotablefooter();


CloseTable();
include("footer.php");
?>