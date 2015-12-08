Description: PHP extension for managing templates and performing variable interpolation
 
What is a template?
 
A template is a text file with variables in it. When a template is parsed, the variables are interpolated to text. (The text can be a few bytes or a few hundred kilobytes.) Here is a simple template with one variable ('{NAME}'):
 
Hello {NAME}.  How are you?
 
When are templates useful?
 
Templates are very useful for CGI programming, because adding HTML to your PHP code clutters your code and forces you to do any HTML modifications. By putting all of your HTML in seperate template files, you can let a graphic or interface designer change the look of your application without having to bug you, or let them muck around in your PHP code.
 
Why use FastTemplate?
 
Speed
 
FastTemplate parses with a single regular expression. It just does simple variable interpolation (i.e. there is no logic that you can add to templates - you keep the logic in the code). That's why it's has 'Fast' in it's name!
 
Flexibility
 
The API is robust and flexible, and allows you to build very complex HTML documents/interfaces. It is also completely written in PHP and (should) work on Unix or NT. Also, it isn't restricted to building HTML documents -- it could be used to build any ascii based document (postscript, XML, email - anything).
 
 What are the steps to use FastTemplate?
 
 The main steps are:
 1. define
 2. assign
 3. parse
 4. FastPrint
 
 
Variables
 
A variable is defined as:<br><kbd>{([A-Z0-9_]+)}</kbd><br>
This means, that a variable must begin with a curly brace '{'. The second and remaining characters must be uppercase letters or digits 'A-Z0-9'. Remaining characters can include an underscore. The variable is terminated by a closing curly brace '}'.<br>
For example, the following are valid variables:<br>{FOO}<br>{F123F}<br>{TOP_OF_PAGE}
 
Variable Interpolation (Template Parsing)
 
If a variable cannot be resolved to anything, a warning is printed to STDERR. See strict() and no_strict() for more info. <br>
 Some examples will make this clearer:
 
 Assume
 <code>
 $FOO = "foo";
 $BAR = "bar";
 $ONE = "1";
 $TWO = "2";
 $UND = "_";
 </code>
 
 
 Variable    Interpolated/Parsed<br>
 ------------------------------------
  - {FOO}            foo
  - {FOO}-{BAR}      foo-bar
  - {ONE_TWO}        {ONE_TWO} // {ONE_TWO} is undefined!
  - {ONE}{UND}{TWO}  1_2
  - ${FOO}           $foo
  - $25,000          $25,000
  - {foo}            {foo}     // Ignored, it's not valid, nor will it, generate any error messages.
 
 
FULL EXAMPLE
 
This example will build an HTML page that will consist of a table. The table will have 3 numbered rows. The first step is to decide what templates we need. In order to make it easy for the table to change to a different number of rows, we will have a template for the rows of the table, another for the table, and a third for the head/body part of the HTML page.
 
Below are the templates. (Pretend each one is in a separate file.)
 
 <code>
 <!-- NAME: main.html -->
 <html>
 <head><title>{TITLE}</title>
 </head>
 <body>
 {MAIN}
 </body>
 </html>
 <!-- END: main.html -->
 </code>
 <code>
 <!-- NAME: table.html -->
 <table>
 {ROWS}
 </table>
 <!-- END: table.html -->
 </code>
 <code>
 <!-- NAME: row.html -->
 <tr>
 <td>{NUMBER}</td>
 <td>{BIG_NUMBER}</td>
 </tr>
 <!-- END: row.html -->
 </code>
 
 Now we can start coding...
 
 <code>
 
 <?
 include("cls_fast_template.php");
 $tpl = new FastTemplate("/path/to/templates");
 $tpl->define( array( main   => "main.html",
 table  => "table.html",row    => "row.html"    ));
 
 $tpl->assign(TITLE,"FastTemplate Test");
 
 for ($n=1; $n <= 3; $n++)
 {
 $Number = $n;
 $BigNum = $n10;
 $tpl->assign( array(  NUMBER      =>  $Number,
 BIG_NUMBER  =>  $BigNum ));
 $tpl->parse(ROWS,".row");
 }
 $tpl->parse(MAIN, array("table","main"));
 Header("Content-type: text/plain");
 $tpl->FastPrint();
 exit;
 ?>
 </code>
 
 
  When run it returns:
 <code>
 <!-- NAME: main.html -->
 <html>
 <head><title>FastTemplate Test</title>
 </head>
 <body>
 <!-- NAME: table.html -->
 <table>
 <!-- NAME: row.html -->
 <tr>
 <td>1</td>
 <td>10</td>
 </tr>
 <!-- END: row.html -->
 <!-- NAME: row.html -->
 <tr>
 <td>2</td>
 <td>20</td>
 </tr>
 <!-- END: row.html -->
 <!-- NAME: row.html -->
 <tr>
 <td>3</td>
 <td>30</td>
 </tr>
 <!-- END: row.html -->
 
 </table>
 <!-- END: table.html -->
 </body>
 </html>
 <!-- END: main.html -->
 
 </code>
 
If you're thinking you could have done the same thing in a few lines of plain PHP, well yes you probably could. But, how would a graphic designer tweak the resulting HTML? How would you have a designer editing the HTML WHILE you're editing another part of the code? How would you save the output to a file, or pipe it to another application? How would you make your application multi-lingual? How would you build an application that has options for high graphics, or text-only? FastTemplate really starts to shine when you are building mid to large scale web applications, simply because it begins to seperate the application's generic logic from the specific implementation.
 