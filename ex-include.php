<?php
	/** $Id: ex-include.php,v 1.2 2005/06/15 19:37:15 vadim Exp $
	* INCLUDE statement example
	* start: Tue Mar 22 19:59:20 EET 2005 @791 /Internet Time/
	* @author Voituk Vadim <voituk###asg.kiev.ua>
	*/
	require_once('cls_fast_template.php');
	$Template = new FastTemplate('templates/');
	$Template->define('main', 'include1.html');
	$Template->assign(array(
		'TEMPLATES_DIR' => 'templates',
		'USER_IP' => $_SERVER['REMOTE_ADDR']
	));
	print $Template->parse_and_return('main');
?>
