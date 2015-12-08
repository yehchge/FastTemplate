<?
// $ID$
//  Example FastTemplate demo #2: Build a linear web page. (top down)
//  Check your error_log when this is done - this demo has unresolved
//  variables defined in footer.html. (On purpose of course :)

// Header("Content-type: text/plain");  // If you want to see the
                                        // raw html in your browser,
                                        // uncomment this.

include("cls_fast_template.php");
$ft = new FastTemplate("./templates");

$start = $ft->utime();     // Benchmarking

$ft->define(
    array(
        'header'  => "header.html",
        'body'    => "middle.html",
        'footer'  => "footer.html"
    )
);

$ft->assign( array(
                        'TITLE'       =>  "FastTemplate Demo2",
                        'HEAD1'       =>  "FastTemplate Page Demo",
                        'TD1'         =>  "Column 1",
                        'TD2'         =>  "Column 2",
                        'TD3'         =>  "Cool Stuff",
                        'TD4'         =>  '<BLINK>Cooler Stuff</BLINK>',
                        'MAILTO'      =>  'cdi@thewebmasters.net',
                        'LINK'        =>  'www.thewebmasters.net/php/',
                        'LINKNAME'    =>  'The WebMasters Net'
            ) );

$ft->parse('HEAD', "header");
$ft->parse('BODY', "body");
$ft->parse('FOOT', "footer");

// $ft->clear(array("HEAD","BODY"));   // Uncomment this to see how
                                        // the class handles errors

    $ft->showDebugInfo(2);
$ft->FastPrint("HEAD");
$ft->FastPrint("BODY");
$ft->FastPrint("FOOT");

$end = $ft->utime();
$runtime = ($end - $start) * 1000;
echo "Completed in $runtime seconds<BR>\n";

exit;

?>