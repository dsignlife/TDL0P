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

	// Connect to the database
$connect = connect($dbuser,$dbname);

$checknum = RandomString(16);
// MySQL QUERYS
$query = "INSERT INTO login (userid,user_pass,sex,email) VALUES('".$_POST['sender_name']."','".$_POST['sender_pass1']."','".$_POST['sender_sex']."','".$_POST['sender_mail']."')";
$nickabfrage = "SELECT userid FROM login WHERE userid = '".$_POST["sender_name"]."'";
$nickergebnis = mysql_query($nickabfrage);
$emailabfrage = "SELECT email FROM login WHERE email = '".$_POST["sender_mail"]."'";
$emailergebnis = mysql_query($emailabfrage);

if($_POST["submit"])

if(mysql_num_rows($nickergebnis) > 0)
{
  $error = "Error!  Account already exists!";
}
elseif(empty($_POST['sender_name']))
{
	$error = "Error!  No account name entered!";
}
elseif(empty($_POST['sender_mail']))
{
	$error = "Error!  No E-Mail entered!";
}
elseif(mysql_num_rows($emailergebnis) > 0)
{
	$error = "Error!  E-Mail already used!";
}
elseif (!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+\.([a-zA-Z0-9-]{2,4})$",$_POST['sender_mail'])) 
{
     $error = "Error!  E-Mail is not valid!"; 
}
elseif(empty($_POST['sender_pass1']))
{
  $error = "Error!  No password entered!";
}
elseif(strlen($_POST['sender_pass1']) < 4)
{
	$error = "Error!  Password must be at least 4 letters long!"; 
}
elseif($_POST['sender_pass1'] <> $_POST['sender_pass2'])
	{    
		$error = "Error!  The two passwords do not agree!";
	}
else
{
$result = mysql_query($query);
$result2 = mysql_query($nrochecknum);
mysql_close( $connect ); 
$deinaccoutname = $_POST['sender_name'];
$deineemail = $_POST['sender_mail'];
$deinpasswort = $_POST['sender_pass1'];
sendactivationmail($_POST['sender_mail'],"nRO Server Account", "Hello ! \n
Someone used your mail... \n
$deineemail \n 
to create a Account for our RO Server! \n
Here is your account data: \n
Login Name: $deinaccoutname \n
Password:  $deinpasswort \n
Much Fun which your RO Team! \n
", "webmaster");
$error = "Congratulations!  Account successfully created!\n the Mail with your account data was sent!";
}

echo"<h3 align=\"center\"><strong>nRO Registration Page </strong></h3>"
  . "<form action=\"modules.php?name=nROReg\" method=\"post\">"
  . "  <table width=\"100%\"  border=\"0\">"
  . "    <tr>"
  . "      <th width=\"45%\" scope=\"row\"><div align=\"right\">Account Name:</div></th>"
  . "      <td width=\"55%\"><input name=\"sender_name\" type=\"text\" id=\"sender_name\"></td>"
  . "    </tr>"
  . "    <tr>"
  . "      <th scope=\"row\"><div align=\"right\">E-Mail:</div></th>"
  . "      <td><input name=\"sender_mail\" type=\"text\" id=\"sender_mail\"></td>"
  . "    </tr>"
  . "    <tr>"
  . "      <th scope=\"row\"><div align=\"right\">Sex:</div></th>"
  . "      <td><select name=\"sender_sex\" id=\"ssender_ex\">"
  . "        <option value=\"M\">M&auml;nnlich</option>"
  . "        <option value=\"F\">Weiblich</option>"
  . "      </select></td>"
  . "    </tr>"
  . "    <tr>"
  . "      <th scope=\"row\"><div align=\"right\">Password:</div></th>"
  . "      <td><input name=\"sender_pass1\" type=\"password\" id=\"sender_pass1\"></td>"
  . "    </tr>"
  . "    <tr>"
  . "      <th scope=\"row\"><div align=\"right\">Confirm Password:</div></th>"
  . "      <td><input name=\"sender_pass2\" type=\"password\" id=\"sender_pass2\"></td>"
  . "    </tr>"
  . "    <tr>"
  . "      <th scope=\"row\"><div align=\"right\">"
  . "        <input name=\"submit\" type=\"submit\" id=\"submit\" value=\"Account erstellen\">"
  . "      </div></th>"
  . "      <td><input name=\"reset\" type=\"reset\" id=\"reset2\" value=\"Zur&uuml;cksetzen\"></td>"
  . "    </tr>"
  . "  </table>"
  . "<p></p>"
  . "<center><font size=\\\"+1\\\" color=\\\"#FF0000\\\">$error</center>"
  . "</form>"
 ."";
CloseTable();
include("footer.php");

?>