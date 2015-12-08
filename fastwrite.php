<?php
// $Id: fastwrite.php,v 1.10 2004/12/29 23:27:53 lvalics Exp $
// Example of FastWrite command.
	include_once("en.inc.php");
	include_once("cls_fast_template.php");

	$ft = new FastTemplate('./templates');
	$ft->define(array("main"=>"language_fastwrite.html"));

	$outputfile = "tmp/" .date("H_i_s").".html";
	$ft->assign("URL",$outputfile);
	$ft->multiple_assign("c_");
  	$ft->showDebugInfo(1);
	$ft->parse("mainContent", "main");
	$ft->FastWrite("mainContent",$outputfile);
	$ft->FastPrint();
?>