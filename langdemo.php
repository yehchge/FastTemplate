<?php
// $Id: langdemo.php,v 1.5 2005/02/08 22:18:35 lvalics Exp $
// Language Demo File
	include_once("en.inc.php");
	include_once("cls_fast_template.php"); 

	$ft = new FastTemplate('./templates'); 
	$ft->define(array("main"=>"language.html"));

// this will replace any TAG from language file from en.in.php
// as you see here is not made as in oldversions $ft->assign("MENULEFT",$menuleft);
// now you only add to template file, {C_TEXT1} and from language file
// will be replaced $c_text1 value.
  $ft->multiple_assign("c_"); 
  $ft->showDebugInfo(1);
	$ft->parse("BODY", array("main"));
	$ft->FastPrint();
?>