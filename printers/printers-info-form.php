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
include ($phproot . "/glpi/includes_printers.php");
include ($phproot . "/glpi/includes_networking.php");
if($_GET) $tab = $_GET;
elseif($_POST) $tab = $_POST;

if ($tab["add"]) {
	checkAuthentication("admin");
	addPrinter($tab);
	logEvent(0, "Printers", 4, "inventory", $_SESSION["glpiname"]." added ".$tab["name"].".");
	header("Location: $_SERVER[HTTP_REFERER]");
} else if ($tab["delete"]) {
	checkAuthentication("admin");
	deletePrinter($tab);
	logEvent($tab["ID"], "printers", 4, "inventory", $_SESSION["glpiname"]." deleted item.");
	header("Location: ".$cfg_install["root"]."/printers/");
} else if ($tab["update"]) {
	checkAuthentication("admin");
	updatePrinter($tab);
	logEvent($tab["ID"], "printers", 4, "inventory", $_SESSION["glpiname"]." updated item.");
	commonHeader("Printers",$_SERVER["PHP_SELF"]);
	showPrintersForm($_SERVER["PHP_SELF"],$tab["ID"]);
	commonFooter();

} else if ($tab["disconnect"]) {
	checkAuthentication("admin");
	Disconnect($tab["ID"],3);
	logEvent($tab["ID"], "printers", 5, "inventory", $_SESSION["glpiname"]." disconnected item.");
	commonHeader("Printers",$_SERVER["PHP_SELF"]);
	showPrintersForm($_SERVER["PHP_SELF"],$tab["ID"]);
	commonFooter();
} else if ($tab["connect"]==1) {
	checkAuthentication("admin");
	commonHeader("Printers",$_SERVER["PHP_SELF"]);
	showConnectSearch($_SERVER["PHP_SELF"],$tab["ID"]);
	commonFooter();
} else if ($tab["connect"]==2) {
	checkAuthentication("admin");
	commonHeader("Printers",$_SERVER["PHP_SELF"]);
	listConnectComputers($_SERVER["PHP_SELF"],$tab);
	commonFooter();
} else if ($tab["connect"]==3) {
	checkAuthentication("admin");
	commonHeader("Printers",$_SERVER["PHP_SELF"]);
	Connect($_SERVER["PHP_SELF"],$tab["sID"],$tab["cID"],3);
	logEvent($sID, "printers", 5, "inventory", $_SESSION["glpiname"] ." connected item.");
	showPrintersForm($_SERVER["PHP_SELF"],$tab["sID"]);
	commonFooter();

} else {

	checkAuthentication("normal");
	commonHeader("Printers",$_SERVER["PHP_SELF"]);
	showPrintersForm($_SERVER["PHP_SELF"],$tab["ID"]);
	commonFooter();
}


?>
