<?php

//	Example FastTemplate demo #2: Build a linear web page. (top down)
//	Check your error_log when this is done - this demo has unresolved
//	variables defined in footer.tpl. (On purpose of course :)

// Header("Content-type: text/plain");	// If you want to see the
										// raw html in your browser, 
										// uncomment this.

include("class.FastTemplate.php");
$tpl = new FastTemplate("./templates");

$start = $tpl->utime();		// Benchmarking

$tpl->define(
	array(
		'header'	=> "header.tpl",
		'body'	=> "middle.tpl",
		'footer'	=> "footer.tpl"
	)
);

$tpl->assign( array(
						'TITLE'		=>	"FastTemplate Demo2",
						'HEAD1'		=>	"FastTemplate Page Demo",
						'TD1'			=>	"Column 1",
						'TD2'			=>	"Column 2",
						'TD3'			=>	"Cool Stuff",
						'TD4'			=>	'<BLINK>Cooler Stuff</BLINK>',
						'MAILTO'		=>	'cdi@thewebmasters.net',
						'LINK'		=>	'www.thewebmasters.net/php/',
						'LINKNAME'	=>	'The WebMasters Net'
			) );

$tpl->parse('HEAD', "header");
$tpl->parse('BODY', "body");
$tpl->parse('FOOT', "footer");

// $tpl->clear(array("HEAD","BODY"));	// Uncomment this to see how
										// the class handles errors

$tpl->FastPrint("HEAD");
$tpl->FastPrint("BODY");
$tpl->FastPrint("FOOT");

$end = $tpl->utime();
$runtime = $end - $start;
echo "Completed in $runtime seconds<BR>\n";

exit;

?>