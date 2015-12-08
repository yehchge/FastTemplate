<?php
// $Id: cache_ex.php,v 1.4 2004/12/27 22:34:10 lvalics Exp $
// Cache Example
include "cls_fast_template.php";

$ft = new FastTemplate('./templates');

// CACHE will be used
$ft->setCacheTime(3);
$ft->USE_CACHE();

$ft->define(array("main"=>"cache.html"));

$data = date("d/m/Y");
$ft->assign('DATA_ATUAL',$data);

$ft->assign("HORA",date("H:i:s"));

// Benchmarking
$start = $ft->utime();
$end = $ft->utime();
$runtime = ($end - $start) * 1000;
$ft->assign("DEBUGSEC",$runtime);
// end Benchmarking

$ft->parse("BODY", array("main"));
$ft->FastPrint();
?>