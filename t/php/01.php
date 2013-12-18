<h1>Declaring variables in php</h1><br><br>
A variable in PHP is defined with a $ (Dollar sign) in front of it. PHP uses a lose method of variable 
declaration. This is important to remember for scope reasons. If you want to use a variable outside of
a scope it was created for, you will need to use it once, in some way, before the change of scope. A 
change of scope can be anything such as a while loop, for loop, internal function, etc. PHP now also
supports classes, so some variables can be protected within a class and be used by creating an instance
of the class. As any other language a variable is useless, unless it's given some data to use. Here is
an example of creating a variable, modifying with a while loop, and printing it's value.

<?
$sf = new simpleframe( true );
$sf -> top(); 

$source = file_get_contents("t/php/01-1.txt");
$geshi = new GeSHi($source,"php");
echo $geshi->parse_code();

$sf -> bottom();
?>
