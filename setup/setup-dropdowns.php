<?php
/*
 
 ----------------------------------------------------------------------
GLPI - Gestionnaire libre de parc informatique
 Copyright (C) 2002 by the INDEPNET Development Team.
 http://indepnet.net/   http://glpi.indepnet.org
 ----------------------------------------------------------------------
 Based on:
IRMA, Information Resource-Management and Administration
Christian Bauer, turin@incubus.de 

 ----------------------------------------------------------------------
 LICENSE

This file is part of GLPI.

    GLPI is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    GLPI is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with GLPI; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 ----------------------------------------------------------------------
 Original Author of file:
 Purpose of file:
 ----------------------------------------------------------------------


*/


include ("_relpos.php");
include ($phproot . "/glpi/includes.php");
include ($phproot . "/glpi/includes_setup.php");

if ($_POST["add"]) {
	checkAuthentication("admin");
	addDropdown($_POST);
	logEvent(0, "dropdowns", 5, "setup", $_SESSION["glpiname"]." added a value to a dropdown.");
	header("Location: $_SERVER[HTTP_REFERER]?done");
} else if ($_POST["delete"]) {
	checkAuthentication("admin");
	deleteDropdown($_POST);
	logEvent($_POST["ID"], "templates", 4, "inventory", $_SESSION["glpiname"]." deleted a dropdown value.");
	header("Location: $_SERVER[HTTP_REFERER]?done");
} else {
	checkAuthentication("normal");
	commonHeader("Setup",$_SERVER["PHP_SELF"]);
	echo "<center><table cellpadding=4><tr><th>".$lang["setup"][0].":</th></tr></table></center>";
	showFormDropDown($_SERVER["PHP_SELF"],"locations",$lang["setup"][3]);
	showFormTypeDown($_SERVER["PHP_SELF"],"computers",$lang["setup"][4]);
	showFormTypeDown($_SERVER["PHP_SELF"],"networking",$lang["setup"][42]);
	showFormTypeDown($_SERVER["PHP_SELF"],"printers",$lang["setup"][43]);
	showFormTypeDown($_SERVER["PHP_SELF"],"monitors",$lang["setup"][44]);
	showFormDropDown($_SERVER["PHP_SELF"],"os",$lang["setup"][5]);
	showFormDropDown($_SERVER["PHP_SELF"],"ram",$lang["setup"][6]);
	showFormDropDown($_SERVER["PHP_SELF"],"processor",$lang["setup"][7]);
	showFormDropDown($_SERVER["PHP_SELF"],"moboard",$lang["setup"][45]);
	showFormDropDown($_SERVER["PHP_SELF"],"gfxcard",$lang["setup"][46]);
	showFormDropDown($_SERVER["PHP_SELF"],"sndcard",$lang["setup"][47]);
	showFormDropDown($_SERVER["PHP_SELF"],"hdtype",$lang["setup"][48]);
	showFormDropDown($_SERVER["PHP_SELF"],"network",$lang["setup"][8]);
	showFormDropDown($_SERVER["PHP_SELF"],"iface",$lang["setup"][9]);
	commonFooter();
}


?>
