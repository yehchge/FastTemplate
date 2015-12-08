<?php

//	Example FastTemplate Demo #3 - build something other than a web page?

Header("Content-type: text/plain");

include("class.FastTemplate.php");
$tpl = new FastTemplate("./templates");

$start = $tpl->utime();		// Benchmarking

// Note: test.tpl will generate (deliberate) errors so check your error_log

$tpl->define(
			array(
					'main'    =>  'htaccess.tpl',
					'test'	=>	'test.tpl'
				)
		);

$tpl->assign(

		array(

			'AUTH_USER_FILE'  =>  "/home/users/cdi/.htpasswd",
			'AUTH_GROUP_FILE' =>  "/dev/null",
			'AUTH_NAME'       =>  '"CDI Was Here"',
			'AUTH_TYPE'       =>  "Basic",
			'OPTIONS'         =>  "All",
			'METHODS'         =>  "GET POST PUT",
			'USER_LIMITS'     =>  "require valid-user",
			'ERROR_401'       =>  "/cgi-bin/guardian.cgi?401",
			'ERROR_402'       =>  "/cgi-bin/guardian.cgi?402",
			'ERROR_403'       =>  "/cgi-bin/guardian.cgi?403",
			'ERROR_404'       =>  "/cgi-bin/guardian.cgi?404",
			'ERROR_500'       =>  "/cgi-bin/guardian.cgi?500"
		)
	);

//	$tpl->no_strict();		// Uncomment this to remove the warnings.

$tpl->parse('HTACCESS',array("main","test"));
$tpl->FastPrint("HTACCESS");

$end = $tpl->utime();
$runtime = $end - $start;

echo "\nCompleted in $runtime seconds \n";

exit;

?>