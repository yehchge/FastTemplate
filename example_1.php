<?
// Example FastTemplate Demo #1 - The example from the man page
// $Id: example_1.php,v 1.5 2006/02/14 12:27:33 paul Exp $
Header("Content-type: text/html");


include("cls_fast_template.php");
$ft = new FastTemplate("./templates");
$ft->php_in_html(true);
$ft->REWRITE_SRC_PATH="www.google.com/";
$time1=$ft->utime();
$ft->define(
    array(
        'main'    => "main.html",
        'table'   => "table.html",
        'row'     => "row.html"
    )
);
$ft->assign( array("TITLE"=> "FastTemplate Test") );
for ($n=1; $n <= 3; $n++)
{
    $Number = $n;
    $BigNum = $n*10;
    $ft->assign(
        array(
            'NUMBER'      =>  $Number,
            'BIG_NUMBER'  =>  $BigNum
        )
    );
    $ft->parse("ROWS",".row");
}
$ft->showDebugInfo(1);
$ft->parse("MAIN", array("table","main"));
print ($ft->utime()-$time1."\n");
$ft->FastPrint();
exit;
?>