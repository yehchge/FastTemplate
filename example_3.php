<?php
//  Example FastTemplate Demo #3 - build something other than a web page?
include("cls_fast_template.php");
$ft = new FastTemplate("./templates");

$start = $ft->utime();     // Benchmarking

// Note: test.html will generate (deliberate) errors so check your error_log

$ft->define(
            array(
                    'main'    =>  'htaccess.html',
                    'test'    =>  'test.html'
                )
        );

$ft->assign(

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

//  $ft->no_strict();      // Uncomment this to remove the warnings.

$ft->parse('HTACCESS',array("main","test"));
$ft->showDebugInfo(1);
$ft->FastPrint("HTACCESS");

$end = $ft->utime();
$runtime = ($end - $start) * 1000;
echo "\nCompleted in $runtime seconds \n";
exit;
?>