<?php
	/** $Id: ex-parse_and_return.php,v 1.2 2005/06/15 19:37:15 vadim Exp $
	* Demo of using FastTemplate::parse_and_return($template_name) method
	* start: Tue Feb 08 21:03:30 EET 2005 @835 /Internet Time/
	* @author Voituk Vadim <voituk###asg.kiev.ua>
	*/
	require_once('cls_fast_template.php');
	$Template = new FastTemplate('templates/');
	
	//NEW: New FastTemplate::define() - now supports array and name and value as parameter
	$Template->define('main', 'ex-parse_and_return.html'); 
	
	$Template->assign('ADMIN',$_SERVER["SERVER_ADMIN"]);
	$Template->assign(array(
		'TEMPLATE_ROOT' => $Template->get_root() //NEW: Added FastTemplate::get_root() function - is a wrapper to FastTemplate::ROOT variable
	));
	
	//NEW: New FT method - Parse template and return it as string
	print $Template->parse_and_return('main');
?>
<br><br><br>
<B>This script source:</B>  <I>See templates/ex-parse_and_return.html for more info</I><br>
<?php highlight_file($_SERVER["PATH_TRANSLATED"]); ?>

