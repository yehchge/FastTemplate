<?php
   /**************************************************************************
    * Project:     Fasttemplate for PHP 4.x
    * File:        flex_table.php
    * Author:      Artyem V. Shkondin http://clubpro.spb.ru
    * Version:     0.0.2
    * Requires:    flex_table.html
    *************************************************************************/
    include_once("cls_fast_template.php");    
    /**
     * Fills template with headers and cells array
     * @param $headers - array of column headers
     * @param $cells - array of cell values
     * @param $caption - caption of table
     * @param $rows - number of rows
     * @param $cols - caption of columns
     */
    function fillTable($headers, $cells,$caption, $rows,$cols){
        // initializing of fasttemplate 
        $ft = new FastTemplate("./templates/");
        $ft->define( array( 'table'    => "flextable.html"));

        $ft->define_dynamic ( "header", "table" );
        $ft->define_dynamic ( "rows", "table" );
        $ft->define_dynamic ( "cols", "table" );

        //handling headers (column names)

        foreach ($headers as $head){
            $ft->assign(
                    array('header'      =>  $head ));
            $ft->parse('HEADERS',".header");
        }
        // handling cells

        foreach ($cells as $row){
            foreach ($row as $cell){
                $ft->assign(
                            array('cellvalue'      =>  $cell ));
                            $ft->parse('COLS',".cols");
            }
            
            $ft->parse('ROWS',".rows");
            $ft->clear("COLS");
        
        }

        $ft->assign("caption", $caption);
        $ft->assign("rows", $rows);
        $ft->assign("cols", $cols);
        $ft->parse('MAIN', "table");
        $ft->FastPrint('MAIN');

    }

   //MAIN

    $caption = "Fasttemplate: Flexible table example";

    /*
     *  Get  number of rows and cols and fills headers and cells
     */
     if(isset($HTTP_POST_VARS['rows'])&&isset($HTTP_POST_VARS['cols'])){
            $rows = $HTTP_POST_VARS['rows'];
            $cols = $HTTP_POST_VARS['cols'];
     }else{
            $rows = 3;
            $cols = 4;
     }

     if ($rows*$cols > 2000){
        echo "Too many cells. Should be less then 2000";
        $rows = 10;
        $cols = 5;
     }

     $headers = array();
     $cells = array();

     for ($i = 1; $i <= $rows; $i++ ){
        $row = array();
        for ($j = 1; $j <= $cols; $j++ ){
            array_push ($row, "cell[$i,$j]"); 
        }        
        array_push($cells,$row);
     }

        for ($j = 1; $j <= $cols; $j++ ){
            array_push ($headers, "header$j"); 
        }        
   fillTable($headers, $cells, $caption, $rows, $cols);
?>