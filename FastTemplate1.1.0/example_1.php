<?php

// Example FastTemplate Demo #1 - The example from the man page

Header("Content-type: text/plain");

include("class.FastTemplate.php");
$tpl = new FastTemplate("./templates");

$tpl->define(
	array(
		'main'    => "main.tpl",
		'table'   => "table.tpl",
		'row'     => "row.tpl"
	)
);

$tpl->assign( array( 'TITLE' => "FastTemplate Test") );

for ($n=1; $n <= 3; $n++)
{
	$Number = $n;
	$BigNum = $n*10;

	$tpl->assign(
		array(
			'NUMBER'		=>	$Number,
			'BIG_NUMBER'	=>	$BigNum
		)
	);

	$tpl->parse('ROWS',".row");
}

$tpl->parse('MAIN', array("table","main"));

$tpl->FastPrint();

exit;

?>