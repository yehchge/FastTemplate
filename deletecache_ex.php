<?php
// $Id: deletecache_ex.php,v 1.1 2005/03/22 20:40:34 lvalics Exp $
// Cache Example
include "cls_fast_template.php";

$ft = new FastTemplate('./templates');

// DELETE_CACHE will be used
// $ft->setCacheTime(3);
$ft->DELETE_CACHE();

$ft->define(array("main"=>"delcache.html"));

$ft->parse("BODY", array("main"));
$ft->FastPrint();

?>