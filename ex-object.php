<?php
	/** $Id: ex-object.php,v 1.2 2005/06/15 19:37:15 vadim Exp $
	* Demo of using Objects in FastTemplate templates
	* start: Tue Feb 08 21:23:48 EET 2005 @849 /Internet Time/
	* @author Voituk Vadim <voituk##asg.kiev.ua>
	*/
	require_once('cls_fast_template.php');
	require_once('user.class.php');
	$Template = new FastTemplate('templates/');
	
	//NEW: New FastTemplate::define() - now supports array and name and value as parameter
	$Template->define('main', 'ex-object.html'); 
	
	$NewUser = new User('Vadim', 'Voituk', 'vadim@user.com');
	$Template->assign('User', $NewUser);
	
	//NEW: New FT method - Parse template and return it as string
	print $Template->parse_and_return('main');
?>
<br><br><br>
<b>This script source:</b>  <I>See templates/ex-object.tpl for more info</I><br>
<?php highlight_file($_SERVER["PATH_TRANSLATED"]); ?>
