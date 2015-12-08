<?php
// $Id: phpcode_with_debug.php,v 1.4 2004/12/26 20:37:05 lvalics Exp $
// Debug Example
    include_once("cls_fast_template.php");
    $ft = new FastTemplate("./templates");
    $ft->no_strict();
	$cjwordforsearch = '';
	$action = '';
	$ft->assign("NOVALUE", $cjwordforsearch);
	$ft->assign("NOVALUE2", $action);
	$ft->assign("IP", $_SERVER['REMOTE_ADDR']);
    $ft->define(array("main"=> "phpcode.html"));
    $ft->parse("MAIN", "main");
    $ft->showDebugInfo(1);
    $ft->FastPrint();
?>