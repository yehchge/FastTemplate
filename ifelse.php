<?php
	/** $Id: ifelse.php,v 1.2 2005/06/15 19:37:15 vadim Exp $
	* Example of using new features in FastTemplate
	* start: Mon Jan 17 23:21:10 EET 2005 @931 /Internet Time/
	* @author Voituk Vadim <voituk###asg.kiev.ua>
	*/
	require_once('cls_fast_template.php');
	$Template = new FastTemplate('./templates');

	// You can use array or 2 strings as this function parameters
	//$Template->define(array('main', 'ifelse.html'));
	$Template->define('main', 'ifelse.html');  
	$Template->define_dynamic('dn_test', 'main');
	
	$Template->assign(array(
		'USER_NAME' => $_REQUEST['name'],
		'USER_SURNAME' => $_REQUEST['surname']
	));
	
	for ($i=1; $i<6; ++$i) {
		$Template->assign(array(
			'NUMBER' => $i,
			'is_li_selected' => $_REQUEST['number']==$i ? 'true': ''
		));
		$Template->parse('TMP', '.dn_test');
	}
	$Template->showDebugInfo(1);
	print $Template->parse_and_return('main'); //<---- New method too
?>
